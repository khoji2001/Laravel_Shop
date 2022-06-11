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
    public function index()
    {
        $ses = Session::all();
        return view("welcome",compact('ses'));
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
    public function store(Request $request)
    {
        $request->validate([
            'subject' => "required",
            'video' => "max:1000000|mimes:mp4",
            'voice' => "nullable|max:1000000|mimes:mp3"

        ]);

        $data = $request->all();

        $keys = array_keys($data);
        foreach($keys as $key){
            switch ($key) {
                case "video":
                    $video = time() . "-" . $request->subject . "." . $request->video->extension();
                    $request->video->move(public_path("videos"),$video);
                    $data['video'] = $video;
                    break;
                case "voice":
                    $voice = time() . "-" . $request->subject . "." . $request->voice->extension();
                    $request->voice->move(public_path("voices"),$voice);
                    $data['voice'] = $voice;

                    break;
                case "image":
                    $image = time() . "-" . $request->subject . "." . $request->image->extension();
                    $request->image->move(public_path("images"),$image);
                    $data['image'] = $image;
                    break;
            }
        }
        
        $session = Session::create($data);

        return $session;

        // $keys = array_keys($data);
        // $keys = array_diff($keys, array('subject'));
      
        // foreach($keys as $key){
        //     $$key = time() . "-" . $request->subject . "." . $request->$key->extension();
        //     echo $$key;
        //     $request->$key->move(public_path("files"),$key);
        //     $session = Session::create([
        //         'subject' => $request->subject,
        //         strval($key) => $request->$key
        //     ]);
        // };
        // return $session;
        
        // $video = time() . "-" . $request->subject . "." . $request->video->extension();

        // $voice = time() . "-" . $request->subject . "f." . $request->voice->extension();

        // // $request->image->move(public_path("images"),$image_name);

        // $request->video->move(public_path("files"),$video);
        // $request->voice->move(public_path("files"),$voice);

        
        // $session = Session::create([
        //     'subject' => $request->subject,
        //     'text' => $request->text,
        //     'video' => $video,
        //     'voice' => $voice
        // ]);
        // return $session;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
