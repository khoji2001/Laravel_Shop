<?php

namespace App\Http\Controllers;
use App\Models\Course;

use App\Models\Session;
use Illuminate\Http\Request;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\File; 


class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request);
        $id = $request->query('id');
        
        return view("session",compact('id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        // https://github.com/Owen-oj/laravel-getid3
        $request->validate([
            'subject' => "required",
            "image" => 'required_without_all:video,text|mimes:png,jpg,jpeg',
            "text" => 'required_without_all:video,image|max:350',
            'video' => [
                'required_without_all:text,image',
                'mimetypes:video/mp4',
                function ($attribute, $value, $fail) {
                    $video = new GetId3($value);
        
                    if ($video->getPlaytimeSeconds() > 62) {
                        $fail('The video must be shorter than 60 seconds.');
                    }
                }
            ]
        ]);

        $data = $request->all();
        // dd($data);
        $int = (int) filter_var($data['course_id'], FILTER_SANITIZE_NUMBER_INT);
        $data['course_id'] = $int;
        $keys = array_keys($data);
        foreach($keys as $key){
            switch ($key) {
                case "video":
                    $video = time() . "." . $request->video->extension();
                    $request->video->move(public_path("videos"),$video);
                    $data['video'] = $video;
                    break;
                
                case "image":
                    $image = time() . "." . $request->image->extension();
                    $request->image->move(public_path("images"),$image);
                    $data['image'] = $image;
                    break;
            }
        }
        
        $session = Session::create($data);
        
        return redirect("api/session/add/{$int}");

        
      
    }

    public function finish(Request $request)
    {
        // dd($request->course_id);
        $data = $request->all();
        // dd($data["course_id"]);
        $course_change = Course::where("id",$data['course_id'])->first();
        // dd($course_change);
        $course_change->first_session = 1;
        $course_change->save();
        $wrong_course = Course::where("first_session",0)->get();
        $img_del =[];
        $video_del =[];

        // $img_del = ["/Users/khoji/Desktop/Laravel_Shop/public/images/1657784445.jpg","sadsad","dsadas"];
        // dd($wrong_course);
        // File::delete($img_del);
        foreach($wrong_course as $item){
            $path_img = public_path()."/images/";
            $path_video = public_path()."/videos/";

            // dd($path_img);
            // unlink($path);
            File::delete($path_img.$item->cover);
            $sessions = Session::where('course_id',$item->id)->pluck('image')->toArray();
            // dd($sessions);
            // File::delete($path_img.$item->cover);
            foreach($sessions as $image)
            if(!is_null($image)){
                $img_del[] = $path_img.$image;
            }
            $vid = Session::where('course_id',$item ->id)->pluck('video')->toArray();
            foreach($vid as $vi)
            if(!is_null($vi)){
                $video_del[] = $path_video.$vi;
            }
            
            // dd($sessions);
            $item->delete();
        }
        // dd($img_del);
        // File::delete($path_img.$img_del);
        File::delete($img_del);
        File::delete($video_del);

        // dd($video_del);
        
        return redirect("search/check?id=$course_change->id");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sessions = Session::where('course_id',$id)->get();

        return view("add",compact('sessions', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
