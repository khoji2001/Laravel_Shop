<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

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
        $request->validate([
            'subject' => "required",
            'video' => "max:1000000|mimes:mp4",
            'voice' => "nullable|max:1000000|mimes:mp3"

        ]);

        $data = $request->all();
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
                case "voice":
                    $voice = time() . "." . $request->voice->extension();
                    $request->voice->move(public_path("voices"),$voice);
                    $data['voice'] = $voice;

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
