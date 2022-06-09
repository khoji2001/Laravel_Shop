<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontEndController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return "home logged in";
        }
        else
        {
            return "home";
        }
    }
    public function dashboard()
    {
        return "dashboard";
    }
    public function login()
    {
        return "login";
    }
    public function login_submit(Request $request)
    {
        $data= $request->all();

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        }
  
        return redirect()->route('login')->withSuccess('Login details are not valid');;


    }
    public function register()
    {
        return "register";
    }
    public function register_submit(Request $request)
    {

        $this->validate($request,[
            'username' => 'required|max:200',
            'email' => 'required|email|max:200',
            'password' => 'required',
            'phone' => 'required|min:8|max:12'
        ]);
        $user = User::create([
            'phone' => $request->phone,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password) ,
        ]);
        $credentials = $request->only('username', 'password');
        $auth = Auth::attempt($credentials);
        if ($auth){
            return redirect()->route('home');
        }
        else
        {
            return redirect()->route('register');
        }

    }

}
