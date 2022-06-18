<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>session</title>
</head>
<body>
    <div>
        {{(int)$id}}
    </div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form method="POST" action="{{ '/api/session/' }}" enctype="multipart/form-data" >
        @csrf
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject"><br><br>
        
        <label for="text">Text:</label><br>
        <input type="text" id="text" name="text"><br><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/png, image/jpeg , image/jpg"><br>
        <small>png,jpg,jpeg</small><br><br>

        <label for="video">Video:</label><br>
        <input type="file" id="video" name="video" accept="video/mp4,video/x-m4v,video/*" ><br>
        <small>mp4,x-m4v</small><br><br>

        <label for="voice">Voice:</label><br>
        <input type="file" id="voice" name="voice" accept="audio/mp3,audio/mpeg" ><br>
        <small>mp3,mpeg</small><br><br>

        <input type = "hidden" name = "course_id" value = {{(int)$id}}/>

        <input type="submit" value="Submit">
    </form><br><br>

    @foreach ($sessions as $item)
        <div>
            <div class="div">{{$item->subject}}</div>
            {{-- <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl" 
            width="400"
            alt=""> --}}
            {{-- <video controls width="400">
                            
                <source src="{{asset("videos/" . $item->video)}}"
                        type="video/mp4">
            
                Sorry, your browser doesn't support embedded videos.
            </video> --}}

        </div><br>
    @endforeach

    <form action="/">
        <input type="submit" value="finish" />
    </form>

    
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
</body>
</html>