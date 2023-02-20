<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class AdminController extends Controller
{
    private $user;
    function __construct(User $user){
        $this->user = $user;
    }
    public function loginAdmin(){
        // dd(Auth::user());
        if(Auth::check() ){
            return redirect()->to('home');
        }
        return view("login");
    }

    public function isAdmin(Request $request){
        $remember = $request->has("remember-me") ? true : false;
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'rule' => 1
        ], $remember)){
            return redirect()->to('home');
        }else if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
            'rule' => 0
        ], $remember)
        ){
            return redirect()->to('store');
        }
        else{
            return redirect()->route('login')->with('fail', 'Email or password incorrect');
        }
    }

    public function register(){
        return view('register');
    }
    public function store(RegisterRequest $request){
        // dd($request->all());
        if($request->password == $request->cpassword){
            $this->user->create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "rule" => 0,
            ]);
            return redirect()->route('login');
        } 
        return redirect()->route('register')->with('fail', 'password incorrect');
    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route("login");
    }
}
