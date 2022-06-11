<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view("welcome",compact('courses'));
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
        ]);
        return $course;
    }
}
