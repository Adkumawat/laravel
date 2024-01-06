<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\Session;



class AuthController extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }
   
    function loginPost(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            
            return redirect()->intended(route('dashboard'));
        }
        return redirect(route('login'))->with("error","Email & Password is Not Valid");
    }

    function registrationPost(request $request){
        $request->validate([
            'username'=>'required|min:3|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'password_confirm' => 'required_with:password|same:password|min:6'
        ]);
        $data['username']=$request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        
        if(!$user){
           
            return redirect(route('registration'))->with("error" , "Register Again");
        }
        
        return redirect(route('login'));
    }
    function dashboard(){
        return view('dashboard');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
