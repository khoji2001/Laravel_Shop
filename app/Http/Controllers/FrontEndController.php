<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File; 

use DB;

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
        
        
        // $data =  DB::select('select cover from courses');
        // // dd($data);
        // File::delete($data.first);

        // $courses = Course::where("first_session",1)->delete();
        $courses = Course::where("first_session",1)->get();
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
            'password_confirmation' => 'required'
        ]);
        $user = User::create([
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
    public function search(Request $request) {
    // dd($request->search);
    $search = $request->search;
    $courses = Course::where('subject', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
    
    return view('search',compact('courses','search'));
    }

    public function search_check(Request $request) {
        // dd($request->search);
        $id = $request->query('id');
        $search = $request->search;
        $courses = Course::where('id',"!=", (int)$id)->where('subject', 'LIKE', '%'.$search.'%')->where('description', 'LIKE', '%'.$search.'%')->get();

        // $courses = Course::where('subject', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->where('id', '!=' , $id)->get();
        $leadIds = DB::table('related_course_pivot')->select('post_id',"related_id")->distinct()->get();

        return view('search_check',compact('courses','search','id',"leadIds"));
        }
    public function search_check_get(Request $request) {
        // dd($request->search);
        $id = $request->query('id');
        // dd((int)$id);
        $search = $request->search;
        
        // $courses = Course::where('id',"!=", 13)->orWhere('subject', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
        $courses = Course::where('id',"!=", (int)$id)->where('subject', 'LIKE', '%'.$search.'%')->where('description', 'LIKE', '%'.$search.'%')->get();
        // dd($courses);

        // $courses->permissions()->where('subject', 'LIKE', '%'.$search.'%')->where('description', 'LIKE', '%'.$search.'%')->get();
        // dd($courses);
        $leadIds = DB::table('related_course_pivot')->select('post_id',"related_id")->distinct()->get();

        return view("search_check",compact('id','courses','search',"leadIds"));
        }

    public function test(){
        return view("test");
    }
    public function vii(){
        // $courses = Course::all();
        return view("video");
    }

    public function too(Request $request){
        // dd($request->all());
        $input = $request->all();
        $request->validate([
            'imageUpload' => "required|max:10000|mimes:jpg,png,jpeg",
        ]);
        $cover = time() . "." . $request->imageUpload->extension();
        
        $folderPath = public_path('images/');
        $image_parts = explode(";base64,", $input['base64image']);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        // dd($image_base64);
        // $request->base64image->move(public_path("images"),$cover);
        $filename = time() . '.'. $image_type;
        $file =$folderPath.$filename;
        file_put_contents($file, $image_base64);
        dd($file);
        return $cover;
    }
}
