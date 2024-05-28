<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use App\Models\order;
use App\Models\Order as ModelsOrder;

class ConsoleController extends Controller{

    public $user, $cart, $status, $order, $statusOrderList;

    public function __construct(){
        $this->user =(object) [
            'id' => null,
            'name' => null,
            'role' => null,
        ];
        $this->cart = null;
        $this->status = null;
        $this->statusOrderList = ['Silahkan di Order','Sedang Dikirim','Sudah Dikirim','Siap di Pick-Up','Selesai'];
        $this->order = (object)[
            'id' => null,
            'status' => $this->statusOrderList[0],
            'duration' => 1
        ];
    }
    public function addToCart($id){
        // if(!session()->exists('user'))
        //     session()->flash('status','Login first to Add to Cart');
        if(session()->exists('user') && session()->get('user')->role=='admin')
            session()->flash('status','Admin Cannot Order');
        else if(session()->exists('order'))
            session()->flash('status','There is still On-going order in Shopping Cart');
        else{
            if(!session()->exists('cart'))
                session(['cart'=>[]]);

            if(!in_array($id,session()->get('cart')))
                session()->push('cart',$id);   
        }
        return redirect('/#console');
    }

    public function shoppingCart(){
        // return session()->all();
        $cartList = array();
        $input_duration = '';
        $btn_statusOrder = 'disabled';
        $btn_clear = '';
        if(session()->exists('user'))
            $this->user = session()->get('user');

        if(session()->exists('order')){
            $this->order = session()->get('order');
            $cartList = explode('_',$this->order->consoles);
            $this->cart = count($cartList);
            if($this->order->status != $this->statusOrderList[0]){
                $input_duration = 'readonly';
                $btn_clear = 'disabled';
            }
                
            if($this->order->status == $this->statusOrderList[2])
                $btn_statusOrder = '';
        }
        else if(session()->exists('cart')){
            $cartList = session()->get('cart');
            $this->cart = count($cartList);
        }
        if(session()->exists('status'))
            $this->status = session()->get('status');

        $consolesRaw = Console::all();
        $consoles = array();
        $totalPrice = 0;
        foreach($cartList as $id){
            $temp = $consolesRaw->firstWhere('id',$id);
            if($temp!=null){
                $totalPrice += $temp->price;
                array_push($consoles, $temp);
            }
        }
        
        return view('console.shoppingCart',[
            'user' => $this->user,
            'cart' => $this->cart,
            'consoles' => $consoles,
            'totalPrice' => $totalPrice,
            'status' => $this->status,
            'order' => $this->order,
            'input_duration' => $input_duration,
            'btn_statusOrder' => $btn_statusOrder,
            'btn_clear' => $btn_clear
        ]);
    }
    
    public function order(Request $req){
        // return $req->input();
        // return session()->all();
        $req->validate([
            'duration' => 'required | numeric | min:0 | max: 10'
        ]);
        if(!session()->exists('cart') || session()->get('cart')==[]){
            session()->flash('status',' Cart still empty, You can add consoles in consoles page :)');
            return redirect('/console/shoppingCart');
        }
        if($req->btn=='order'){
            if(session()->exists('order')){
                session()->flash('status','Already ordered !!');
                return redirect('/console/shoppingCart');
            }
            $cartList = session()->get('cart');

            // Decrement stock console after Customer Order
            foreach($cartList as $id)
                Console::where(['id'=>$id])->decrement('stock');

            $cartString = implode('_',$cartList);
            $respond = Order::make([
                'id_user' => $req->userId,
                'consoles' => $cartString,
                'duration' => $req->duration,
                'status' => $this->statusOrderList[1],
                'total_price' => $req->totalPrice,
                'date' => date('Y-m-d H:i:s')
            ]);
            // dd($respond);
            $respond->save();
            if($respond){ 
                session(['order' => $respond]);
                session()->flash('status','Order success, Wait for admin to submitted');
            }else
                session()->flash('status','Order Failed');
            
            
        }
        else if($req->btn=='statusOrder'){
            
            $respond = Order::where('id',session()->get('order')->id)
                ->update(['status'=>$this->statusOrderList[3]]);
            
            if($respond){
                session()->flash('status','Your order ready to Pick Up, Wait Admin for confirmation');
                $updatedOrder = Order::where('id',$req->orderId)->get()->first();
                session(['order'=>$updatedOrder]);
            }
            else
                session()->flash('status','Something went wrong, Try again or contact admin');
            
        }
        else if($req->btn=='clear'){
            if(session()->exists('order')){
                session()->flash('status','There is still On-going order in Shopping Cart');
                return redirect('/console/shoppingCart');
            }
            else {
                session()->flash('status','Empty cart success :)');
                session()->forget('cart');
            }
        }
        return redirect('/console/shoppingCart');
    }

    public function history(){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        else 
            return redirect('/');

        $consolesList = Console::select(['id','name'])->get();
        $consoles = array();
        $history = Order::where('id_user',session()->get('user')->id)
            ->where('status',$this->statusOrderList[4])
            ->get();
        
        // Consoles as array corresponding to id as index
        foreach($consolesList as $item)
            $consoles[$item->id] = $item;

        // Filter array of object to fetch id
        foreach($history as $item){
            $listConsole = array();
            foreach(explode('_',$item->consoles) as $id)
                array_push($listConsole,$consoles[$id]->name);
                $item->consoles = $listConsole;
        }
        
        return view('console.history',[
            'user' => $this->user,
            'cart' => $this->cart,
            'status' => $this->status,
            'history' => $history
        ]);
    }

}
// AJAX GAGAL
// // USING AJAX - javascript.blade.php
// public function order(Request $req){
//     // return response()->json(['status'=>$req->durasi]);
//     if(session()->exists('cart')) {
//         if(session()->exists('user')){
            
//             $cartList = session()->get('cart');
            
//             $cartString = implode('_',$cartList);
            
//             $respond = Order::create([
//                 'consoles' => $cartString,
//                 'duration' => $req->durasi,
//                'status' => "Sedang Dikirim",
//                 'date' => date('d-m-Y')
//             ]);
//             return response()->json(['status'=>$cartString]);
//             // return response()->json(['status'=>$respond]);
//             if($respond){
//                 // session()->flash('status','Order Set');
//                 return response()->json(['status'=>1]);
//             }
//             else 
//                 return response()->json(['status'=>3]);
//         }
//         else 
//             return response()->json(['status'=>0]);
//     }
//     else return response()->json(['status'=>2]);
    
//     /* 
//     0 = Not Logged In
//     1 = Success Order
//     2 = Empty Cart
//     3 = Database error
//     */
// }