<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Console;
use App\Models\Order;
use Illuminate\Support\Facades\File;

class AdminController extends Controller{
    
    public $user, $status, $cart, $statusOrderList;

    public function __construct(){
        $this->status = null;
        $this->user = (object)[
            'name' => null,
            'role' => null
        ];
        $this->cart = null;
        $this->statusOrderList = ['Silahkan di Order','Sedang Dikirim','Sudah Dikirim','Siap di Pick-Up','Selesai'];
    }
    public function home(){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        return view('admin.admin',[
            'user' => $this->user,
            'cart' => $this->cart
        ]);
    }

    //////////////////////////////////////////////////////////////////////////////////
    // ORDERS //

    public function orders(){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        if(session()->exists('status'))
            $this->status = session()->get('status');

        $consolesList = Console::select(['id','name'])->get();
        $orders = Order::all();
        $consoles = array();
        
        // Consoles as array corresponding to id as index
        foreach($consolesList as $item)
            $consoles[$item->id] = $item;
        
        // Filter array of object to fetch id
        foreach($orders as $order){
            $order->id_user = User::select('name')->where('id',$order->id_user)->get()->first()->name;
            $listConsole = array();
            foreach(explode('_',$order->consoles) as $id)
                array_push($listConsole,$consoles[$id]->name);
            $order->consoles = $listConsole;
        }
        return view('admin.orders.orders',[
            'user' => $this->user,
            'cart' => $this->cart,
            'status' => $this->status,
            'orders' => $orders
        ]);
    }

    public function action($id){
        if(session()->exists('user'))
            $this->user = session()->get('user');

        $consolesList = Console::select(['id','name'])->get();
        $order = Order::where('id',$id)->get()->first();
        $customer = User::where('id',$order->id_user)->get()->first();

        // Consoles as array corresponding to id as index
        $consoles = array();
        foreach($consolesList as $item)
            $consoles[$item->id] = $item;

        // Filter array of object to fetch id
        $listConsole = array();
        foreach(explode('_',$order->consoles) as $id)
            array_push($listConsole,$consoles[$id]->name);
        $order->consoles = $listConsole;

        // Admin changing order status
        $availableStatus = null;
        if($order->status==$this->statusOrderList[1])
            $availableStatus = $this->statusOrderList[2];
        else if ($order->status==$this->statusOrderList[3])
            $availableStatus = $this->statusOrderList[4];

        return view('admin.orders.details',[
            'user' => $this->user,
            'cart' => $this->cart,
            'order' => $order,
            'customer' => $customer,
            'availableStatus' => $availableStatus
        ]);
    }

    public function actionValidity(Request $req){
        // return $req->input();
        $respond = Order::where('id',$req->id)
            ->update(['status'=>$req->newStatus]);
        
        if($req->newStatus==$this->statusOrderList[4]){
            $orderConsoles = Order::
                select('consoles')
                ->where('id',$req->id)
                ->get()
                ->first();
                
            foreach(explode('_',$orderConsoles->consoles) as $idConsole)
                Console::where(['id'=>$idConsole])->increment('stock');
        }

        if($respond)
            session()->flash('status','Updated status from "'.$req->oldStatus.'" to "'.$req->newStatus.'" at ID : '.$req->id);      
        else
            session()->flash('status','Failed make a change at ID : '.$req->id);
        return redirect('admin/orders');

    }

    //////////////////////////////////////////////////////////////////////////////////
    // CONSOLES //

    public function consoles(){

        if(session()->exists('user'))
            $this->user = session()->get('user');
        if(session()->exists('status'))
            $this->status = session()->get('status');
        $consoles = Console::all();
        return view('admin.consoles.consoles',[
            'user' => $this->user,
            'cart' => $this->cart,
            'consoles' => $consoles,
            'status' => $this->status
        ]);
    }

    // INSERT
    public function insert(){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        return view('admin.consoles.insert',[
            'user' => $this->user,
            'cart' => $this->cart,
        ]);
    }
    public function insertValidity(Request $req){
        // dd($req->file());
        // dd($req->file('image')->getClientOriginalName());
        $req->validate([
            'name' => 'required | string | max:30',
            'price' => 'required | numeric | min:0 | max:1000000',
            'stock' => 'required | numeric | min:0 | max:100',
            'description' => 'required | string | max:190',
            'image' => 'required | mimes:jpg,png,jpeg | max:5048'
        ]);
        
        $imageName = 'consoles/'.$req->image->getClientOriginalName();

        $respond = Console::create([
            'name' => $req->name,
            'price' => $req->price,
            'stock' => $req->stock,
            'image_link' => $imageName,
            'description' => $req->description
        ]);
        if($respond){
            $req->image->move(public_path('consoles'),$imageName);
            session()->flash('status','Succesfully INSERT New Console "'.$req->name.'"');
        }
        else
            session()->flash('status','Failed INSERT New Console');   
        
        return redirect('/admin/consoles');
    }

    // DETAILS
    public function details($id){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        $console = Console::where('id',$id)->get();
        if($console->containsOneItem()){
            return view('admin.consoles.details',[
                'user' => $this->user,
                'cart' => $this->cart,
                'console' => $console[0]
            ]);
        }
        else return redirect('/admin');
    }

    // EDIT
    public function edit($id){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        $console = Console::where('id',$id)->get();
        if($console->containsOneItem()){
            return view('admin.consoles.edit',[
                'user' => $this->user,
                'cart' => $this->cart,
                'console' => $console[0]
            ]);
        }
        else return redirect('/admin');
    }
    public function editValidity(Request $req){
        // dd($req->file());
        $req->validate([
            'name' => 'required | string | max:30',
            'price' => 'required | numeric | min:0 | max:1000000',
            'stock' => 'required | numeric | min:0 | max:100',
            'description' => 'required | string | max:200',
            'image' => 'mimes:jpg,png,jpeg | max:5048'
        ]);
        if($req->file('newImage')){
            $imageName = 'consoles/'.$req->newImage->getClientOriginalName();
            $req->newImage->move(public_path('consoles'),$imageName);
            File::delete(public_path($req->oldImage));
        }
        else 
            $imageName = $req->oldImage;
        
        $respond = Console::where('id',$req->id)->update([
            'name' => $req->name,
            'price' => $req->price,
            'stock' => $req->stock,
            'image_link' => $imageName,
            'description' => $req->description
        ]);
        if($respond){
            session()->flash('status','Succesfully EDIT Console at id = '.$req->id);
        }
        else
            session()->flash('status','Failed EDIT Console at id = '.$req->id);
        return redirect('/admin/consoles');        
    }

    // DELETE
    public function delete($id){
        $deleteImage = Console::where('id',$id)->get()[0]->image_link;
        $result = Console::where('id',$id)->delete();
        if($result){
            File::delete(public_path($deleteImage));
            session()->flash('status','Succesfully DELETE Console at id = '.$id);
        }
        else 
            session()->flash('status','Failed DELETE Console at id = '.$id);

        return redirect('/admin/consoles');
    }
}
