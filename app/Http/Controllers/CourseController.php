<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show($id)
    {
        $sessions = Session::where('course_id',$id)->get();
        
        return view("course_show",compact('sessions'));
    }
    public function index()
    {
        
        return view("course");
    }
    public function store(Request $request){
        
        $request->validate([
            'subject' => "required",
            'description' => "required",
            'cover' => "required|max:10000|mimes:jpg,png,jpeg",
        ]);
        $cover = time() . "-" . $request->subject . "." . $request->cover->extension();

        $request->cover->move(public_path("images"),$cover);

        $course = Course::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'cover' => $cover,
            'user_id' => auth()->user()->id
        ]);
        
        return redirect("api/session?id=$course->id");
    }
}
