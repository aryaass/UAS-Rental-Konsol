<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Console;
use App\Models\Order;

class HomeController extends Controller{
    
    protected $model, $user, $status, $cart, $statusOrderList;
    
    public function __construct(){
        $this->model = new User;
        $this->user = (object)[
            'name' => null,
            'role' => null
        ];
        $this->status = '';
        $this->cart = null;
        $this->statusOrderList = ['Silahkan di Order','Sedang Dikirim','Sudah Dikirim','Siap di Pick-Up','Selesai'];
    }

    // LANDING PAGE
    public function home(){
        // return session()->all(); 
        if(session()->exists('user'))
            $this->user = session()->get('user');
        if(session()->exists('cart'))
            $this->cart = count(session()->get('cart'));
        if(session()->exists('status'))
            $this->status = session()->get('status');

        $consoles = Console::select(['id','name','image_link','description'])->get();
        return view('home',[
            'user' => $this->user,
            'cart' => $this->cart,
            'consoles' => $consoles,
            'status' => $this->status
        ]);
    }

    // REGISTER
    public function register(){
        if(session()->exists('user'))
            $this->user = session()->get('user');
        
        return view('authentication.register',[
            'user' => $this->user,
            'cart' => $this->cart,
        ]);
    }
    public function registerValidity(Request $req){
        
        $req->validate([
            'name' => 'required | max:50',
            'address' => 'required | max:200',
            'phone' => 'required',
            'email' => 'required | email | max:50',
            'password' => 'required | confirmed | min:8'
        ]);

        // Store data to database with ELOQUENT Model
        User::create([
            'role' => $req->role,
            'name' => $req->name,
            'address' => $req->address,
            'phone_number' => $req->phone,
            'email' => $req->email,
            'password' => md5($req->password)
        ]);
        return redirect('/login');
    }

    // LOGIN
    public function login(){
        $status = null;
        if(session()->exists('status')){
            $status = session()->get('status');
        }
        if(session()->exists('user'))
            $this->user = session()->get('user');
        
        return view('authentication.login',[
            'status' => $status,
            'user' => $this->user,
            'cart' => $this->cart,
        ]);
    }
    public function loginValidity(Request $req){
        $req->validate([
            'email' => 'required | email | max:20',
            'password' => 'required | min:8'
        ]);
        $user = User::where('email',$req->email)
            ->where('password',md5($req->password))
            ->get();
        // dd($user);
        if($user->containsOneItem()){
            session(['user' => $user[0]]);
            // dd($user[0]->id);
            $currentOrder = Order::where('id_user',$user[0]->id)
                ->where('status',$this->statusOrderList[1])
                ->orWhere('status',$this->statusOrderList[2])
                ->orWhere('status',$this->statusOrderList[3])
                ->get();
            if($currentOrder->containsOneItem()){
                session(['order'=>$currentOrder[0]]);
                session(['cart'=>explode('_',$currentOrder[0]->consoles)]);
            }
            if($user[0]->role=='admin')
                return redirect('/admin/consoles');
            else
                return redirect('/');
        }
        else {
            session()->flash('status', 'Wrong Email / Password');
            return redirect('/login');
        }
    }

    // LOGOUT
    public function logout(){
        session()->flush();
        return redirect('/');
    }

    public function captcha(){
        // Generating Random Code
        // $md5_hash = md5(rand());
        // $captcha = substr($md5_hash,15,5);
        
        // session()->flash(['captcha',$str]);

        // $newImage = ImageCreate(100,30);

        // Colours

        // $white = imagecolorallocate($newImage, 220,220,255);
        // $black = imagecolorallocate($newImage, 0,0,0);
        // $green = imagecolorallocate($newImage, 0,255,0);
        // $brown = imagecolorallocate($newImage, 0,255,0);
        // $green = imagecolorallocate($newImage, 133,69,19);
        // $orange = imagecolorallocate($newImage, 204,204,204);
        // $grey = imagecolorallocate($newImage, 204,204,204);

        // Making Background
        // imagefill($newImage,0,0,$black);

        // Imagettftest($newImage,25,angle, x,y,color, fontfile,text);

        // imagestring($newImage, 29,10,2, $str, $col);
        // header('content:image/jpeg');
        // return imagejpeg($newImage);
    }
}
