<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logook.png') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" > --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        function myFunction() {
      // Get the checkbox
      var checkBox = document.getElementById("myCheck");
      // Get the output text
      var text = document.getElementById("text");
    //   var message = document.getElementById("message");

    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
        // message.style.display = "block";


      } else {
        text.style.display = "none";
        // message.style.display = "none";


      }
    }
    function myFunctionimage() {
      // Get the checkbox
      var checkBox = document.getElementById("myCheckimage");
      // Get the output text
      var text = document.getElementById("image");
    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }
    function myFunctionvideo() {
      // Get the checkbox
      var checkBox = document.getElementById("myCheckvideo");
      // Get the output text
      var text = document.getElementById("video");
    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }

    </script>
    <style>
        .container_l {
        border-radius: 5px;
        background-color: #f0f5fb;/*f0f5fb*/
        padding: 10px;
        }
        input[type=text], select, textarea {
            width: 90%; /* Full width */
            padding: 12px; /* Some padding */ 
            border: 1px solid #ccc; /* Gray border */
            border-radius: 4px; /* Rounded borders */
            box-sizing: border-box; /* Make sure that padding and width stays in place */
            margin-top: 6px; /* Add a top margin */
            margin-bottom: 16px; /* Bottom margin */
            resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
            }
    </style>
</head>

<body>
   
    <nav class=" navbar navbar-dark navbar-expand-lg  justify-content-center" style="background-color: #0B3D91">
        <a href="#" class="navbar-brand d-flex w-50 mr-auto" style="padding-left: 10px !important; ">Simple</a>
        <img src="{{ asset('images/logook.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2 ms-2">

        
    </nav>
<div id ="origin" style="display: block">

    @if($sessions->count() < 30)
    
    <div class="container_l">
        <form method="POST" action="{{ '/api/session/' }}" enctype="multipart/form-data" >
            @csrf
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters" ><br><br>
            
            <label  for="text">Text:</label>
            <input type="checkbox" id="myCheck" onclick="myFunction()"><br>
            
            <textarea id="text" name="text" maxlength="350" style="display:none; height:200px; font-size: 18px; font-family:Times, serif;" placeholder="350 characters" ></textarea><br>
            {{-- <input type="text" id="text" name="text" style="display:none" ><br> --}}
            <p style="display:none;"id="message"></p>

            <label for="image">Image:</label><input type="checkbox" id="myCheckimage" onclick="myFunctionimage()"><br>
    
            <input type="file" id="image"  name="image" style="display:none" accept="image/png, image/jpeg , image/jpg"><br>
            
    
            <label for="video">Video:</label><input type="checkbox" id="myCheckvideo" onclick="myFunctionvideo()"><br>
            <input type="file" id="video" name="video"  style="display:none" accept="video/mp4,video/x-m4v,video/*" ><br>
    
    
            <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
    
    
    
            <input type="submit" class="btn btn-primary" value="Submit" onclick="loader();">
        </form><br><br>
        <div style="color: #ff0000;" >
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
        
    
    </div><br>
    @else
    <div class="container-fluid d-flex align-items-center justify-content-center">
        Max number of sessions is 30 session</div>
    @endif
    
    
    
    <div class="container" style="background: #ffff">
        <div class="row">
            <div class=" bg-white d-flex justify-content-center">
        
                <form action="/api/finish" method="post">
                    <div class="containerbut">
                        <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
                        <input type="submit" class="btn btn-success btn-lg"  value="Complete" />
                    </div>
                </form>
                <form action="/api/leave" method="post">
                    <div class="containerbut">
                        <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
                        <input type="submit" class="btn btn-danger btn-lg" value="Leave" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- <div style="" class="countt">
        
      </div> --}}

    {{-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif --}}

    {{-- @foreach ($sessions as $item)

    <div class="container" style="background: #ffff">
        <div class="row">
            <div class="count">{{ $loop->iteration }}</div>

                <div class="container_s">
                    <div class="subject" >{{$item->subject}}</div><br>
                    <div >{{$item->text}}</div><br>
                    <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl" 
                        width="250"
                        alt=""><br>
                    @if(isset($item->video))
                    <video width="300" controlsList="nodownload" controls>
                        <source src='{{asset("viidd/$item->video")}}'
                                type="video/mp4">
                    
                        Sorry, your browser doesn't support embedded videos.
                    </video><br>
                    @endif
                    
                    

                </div><br>
        </div>
    </div>
    @endforeach --}}

@foreach ($sessions as $item)
<div class="d-flex justify-content-center" style="font-weight: bold;
font-family:Times New Roman;
font-size: 40px; ">{{ $loop->iteration }}</div>
       
<div class="container">

    <div class="row">
        <div class="card mb-3 shadow-lg bg-white rounded justify-content-center mx-auto" style="width: 55rem;padding: 0 !important; ">
          <div class="card-header bg-white  justify-content-center">
            <h4 class="card-title  p-2 " >{{$item->subject}}</h4>
            {{-- <p class="card-text p-2">starts</p> --}}
            {{-- <p class="card-text p-2">{{$item->view}}</p> --}}

            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
          </div>
            <img 
            src="{{asset("images/" . $item->image)}}" class="card-img-top" 
            alt="" >
            @if(isset($item->video))
                    <video class="card-img-top"  width="800" height="800"  controlsList="nodownload" controls>
                        <source src='{{asset("viidd/$item->video")}}'
                                type="video/mp4">
                    
                        Sorry, your browser doesn't support embedded videos.
                    </video><br>
                    @endif

            <div class="card-body">
              <div class=" bg-white  justify-content-center">
                  {{-- <h5 class="card-title p-2">{{$item->subject}}</h5> --}}
                  <p class="card-text">{{$item->text}}</p>
              </div>

            {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
        </div>
    </div>
</div>
@endforeach

</div>

<div id ="loading" style="display: none">
    <div class="text-center">
        <div class="spinner-border" role="status">
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <span class="sr-">uploading...</span>
    </div>
</div>

    {{-- <div class="count">
    <form action="/api/finish" method="post">
        <div class="containerbut">
            <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
            <input type="submit" value="Publish" />
        </div>
    </form>
    </div> --}}

    
    
</body>
{{-- <script>
    var area = document.getElementById("text");
    var message = document.getElementById("message");
    var maxLength = 50;
    var checkLength = function() {
        if(area.value.length < maxLength) {
            message.innerHTML = (maxLength-area.value.length) + " characters remaining";
        }
    }
    setInterval(checkLength, 300);
</script> --}}

<script>
    function loader() {
        document.getElementById('loading').style.display = "block"
        document.getElementById('origin').style.display = "none"
    
    }
    </script>
</html>