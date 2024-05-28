<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Console;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class TestingDev extends Controller{
    
    public function clearCart(){
        session()->forget('cart');
        return redirect('/');
    }

    public function clearSession(){
        session()->flush();
        return redirect('/');
    }
    public function getSession(){
        return session()->all();
    }
    public function decrement(){
        Console::where(['id'=>16])->decrement('stock');
        return Console::all();
    }

    public function dbConnect(){
        // Testing Database connection
        // return DB::table('users')->get();
        return User::all();
        // return Console::all();
    }

    public function sessionArray(){
        
        // Testing Session Array
        // session()->push('values',4);
        // session()->flush();
        // return session()->get('values');
        return session()->all();
    }

    public function testing(){


        // Testing Collection
        // return session()->get('cart');
        // session()->push('cart',90);
        if(session()->exists('cart'))
            $cart = session()->get('cart');
        // return $cart;
        $raw = Console::all();
        // dd($raw);
        $console = array();
        foreach($cart as $id){
            $temp = $raw->firstWhere('id',$id);
            if($temp!=null)
                array_push($console, $temp);
        }
        return $console;
    }
}
