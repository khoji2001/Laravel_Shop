<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontEndController extends Controller
{
    public function index()
    {
        // if(Auth::check())
        // {
        //     return view('home');
        // }
        // else
        // {
        //     return "home";
        // }
        $courses = Course::all();
        // dd(auth()->user());
        return view('home',compact("courses"));
    }
    public function dashboard()
    {
        return "dashboard";
    }
    public function login()
    {
        return view('auth.login');
    }
    public function login_submit(Request $request)
    {
        $data= $request->all();
        
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
       
        $credentials = $request->only('username', 'password');
        // dd(Auth::attempt($credentials));
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        else
        {
            return redirect()->back()->withInput()->with('message', 'Wrong user or password ');
        }
  


    }
    public function register()
    {
        return view("auth.register");
    }
    public function register_submit(Request $request)
    {

        $this->validate($request,[
            'username' => 'required|max:200|unique:users,username',
            'email' => 'required|email|max:200|unique:users,email',
            'password' => 'required_with:password_confirmation|same:password_confirmation',
            'phone' => 'required|min:8|max:12|unique:users,phone',
            'password_confirmation' => 'required'
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
            return redirect()->back()->withInput();
        }

    }
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }

}
