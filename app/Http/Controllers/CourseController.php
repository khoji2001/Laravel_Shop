<?php

namespace App\Http\Controllers;

use DB;
use File;
use App\Models\Course;
use App\Models\Session;
use Illuminate\Http\Request;
use Owenoj\LaravelGetId3\GetId3;
use Illuminate\Support\Facades\Validator;


class CourseController extends Controller
{
    public function show($id)
    {
        $sessions = Session::where('course_id',$id)->get();
        $course = Course::where("id",$id)->first(); #check find
        $course->view += 1;
        $course->save();

        $related = $course->related()->get();
        
        return view("course_show",compact('sessions','course',"related"));
    }
    public function add_related(Request $request)
    {
        // dd($request->all());
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
        $input = $request->all();

        $request->validate([
            'subject' => "required|max:80",
            'description' =>"max:100",
            'imageUpload' => "required|mimes:jpg,png,jpeg",
        ],[
            "imageUpload.required" => "The cover field is required"
        ]);
        // $cover = time() . "." . $request->image->extension();
        // $request->validate([
        //     'imageUpload' => "required|max:10000|mimes:jpg,png,jpeg",
        // ]);
        // $cover = time() . "." . $request->imageUpload->extension();
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
        // $request->image->move(public_path("images"),$cover);
        // dd($request->all());
        // if($request->Prerequisites=="on"){
        //     $course = Course::create([
        //         'subject' => $request->subject,
        //         'description' => $request->description,
        //         'cover' => $filename,
        //         'user_id' => auth()->user()->id,
                
        //     ]);
        //     return redirect("search/check?id=$course->id");
        //     // $course->related()->attach([2,3,4]);
        //     // return "on";
            
        // }else{
        $course = Course::create([
            'subject' => $request->subject,
            'description' => $request->description,
            'cover' => $filename,
            'user_id' => auth()->user()->id,
            
        ]);
        sleep(10);
        return redirect("api/session?id=$course->id");
        
    
    }
    public function test_store(Request $request){
        
        $input = $request->all();

        $request->validate([
            'subject' => "required",
            'imageUpload' => "required|mimes:jpg,png,jpeg",
        ]);
        $data =[];
        
        $data["subject"] = $request->subject;
        $data["description"] = $request->description;
        $data["cover"] = $input['base64image'];


        $jdata=json_encode($data);
        

        // $folderPath = public_path('images/');
        // $image_parts = explode(";base64,", $input['base64image']);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);
        // $filename = time() . '.'. $image_type;
        // $file =$folderPath.$filename;
        // file_put_contents($file, $image_base64);

        // $data["image"]->move(public_path("images"),"khoji.jpg");
        
        // File::move($data["image"], public_path("images/$image_name"));

        // $course = Course::create([
        //     'subject' => $data["subject"],
        //     'description' => $data["description"],
        //     'cover' => "test.jpg",
        //     'user_id' => 1,
        //     "first_session" => 1
            
        // ]);
        // return $data["employees"]["employee"][0];
        // foreach($data["employees"]['employee'] as $item){
        //     Session::create([
        //         'subject' => $item["subjectt"],
        //         'text' => $item["text"],
        //         'course_id' => $course->id,
                
        //     ]);
        // }

        return back()->with('data', $jdata); 

    }
    
    public function test_store_ses(Request $request){
        // dd($request->image->getRealpath());
        $input = $request->all();
        // $request->validate([
        //     'subject' => "required",
        //     "image" => 'required_without_all:video,text|mimes:png,jpg,jpeg',
        //     "text" => 'required_without_all:video,image',
        //     'video' => [
        //         'required_without_all:text,image',
        //         'mimetypes:video/mp4',
        //         function ($attribute, $value, $fail) {
        //             $video = new GetId3($value);
        
        //             if ($video->getPlaytimeSeconds() > 62) {
        //                 $fail('The video must be shorter than 60 seconds.');
        //             }
        //         }
        //     ]
        // ]);
        $validator = Validator::make($request->all(), [
            'subject' => "required",
            "image" => 'required_without_all:video,text|mimes:png,jpg,jpeg',
            "text" => 'required_without_all:video,image',
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

        if ($validator->fails()) {
            return response()->json([
                        'error' => $validator->errors()->all()
                    ]);
        }
        $data = json_decode($input["data"], TRUE);
        
        // $arr = json_decode($arr, TRUE);
        
        $ses = [];
        $keys = array_keys($input);
        foreach($keys as $key){
            switch ($key) {
                case "video":
                    $video = time() . "." . $request->video->extension();
                    $video_path = $request->video->getRealpath();
                    // $ses[] = ['video' => $video, 'video_path' => $video_path];
                    $ses["video"] = $video;
                    $ses["video_path"] = $video_path;
                    break;
                
                case "image":
                    $image = time() . "." . $request->image->extension();
                    $image_path = $request->image->getRealpath();
                    // $ses[] = ['image' => $image, 'image_path' => $image_path];
                    $ses["image"] = $image;
                    $ses["image_path"] = $image_path;
                    break;

                case "subject":
                    $ses["subject"] = $request->subject;
                    break;
                
                case "text":
                    $ses["text"]  = $request->text;

                    break;  
            }
        }

        $data[] = $ses;
        
        // dd($data);
        // $manage[] = ['subject' => 'a99', 'name' => 'e'];

        $data = json_encode($data);
        
        // dd($manage[1]);

        return back()->with('data', $data); 
        
    }
}
