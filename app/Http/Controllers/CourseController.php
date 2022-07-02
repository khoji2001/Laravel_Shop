<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use Illuminate\Http\Request;
use DB;


class CourseController extends Controller
{
    public function show($id)
    {
        $sessions = Session::where('course_id',$id)->get();
        $course = Course::where("id",$id)->first();
        $related = $course->related()->get();
        
        return view("course_show",compact('sessions','course',"related"));
    }
    public function add_related(Request $request)
    {
        dd($request->all());
        $data = $request->all();
        $course_id = (int) filter_var($data['course_id'], FILTER_SANITIZE_NUMBER_INT);
        $related_id = (int) filter_var($data['related_id'], FILTER_SANITIZE_NUMBER_INT);

        // $sessions = Session::where('course_id',$id)->get();
        $course = Course::where("id",$course_id)->first();
        $course->related()->attach([$related_id]);

        // dd($leadIds->where('post_id', 98)->contains('related_id',4));
        //dd($course->related()->first()->getOriginal()["pivot_related_id"]);

        // $related = $course->related()->get();
                
        return back();
    }
    public function index()
    {
        
        return view("course");
    }
    
    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'subject' => "required",
            'image' => "required|max:10000|mimes:jpg,png,jpeg",
        ]);
        $cover = time() . "." . $request->image->extension();

        $request->image->move(public_path("images"),$cover);
        // dd($request->all());
        if($request->Prerequisites=="on"){
            $course = Course::create([
                'subject' => $request->subject,
                'description' => $request->description,
                'cover' => $cover,
                'user_id' => auth()->user()->id,
                
            ]);
            return redirect("search/check?id=$course->id");
            // $course->related()->attach([2,3,4]);
            // return "on";
            
        }else{
            $course = Course::create([
                'subject' => $request->subject,
                'description' => $request->description,
                'cover' => $cover,
                'user_id' => auth()->user()->id,
                
            ]);
            return redirect("api/session?id=$course->id");
        }
        
        
        

        
        // dd($course->related()->get());
        
        
    }
}
