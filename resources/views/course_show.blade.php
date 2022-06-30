{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>course</title>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar bg-primary">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">Dropdown
              </a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <form class="form-inline">
            <div class="md-form my-0">
              <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            </div>
          </form>
        </div>
      </nav>
    @foreach ($sessions as $item)
        <div style="padding: 50px; background-color: #8dcef7;"> --}}
            {{-- @php
                // $array = (array) $item;
                // $keys = array_keys($array);
                $video = $item->video;
            @endphp
            
            @switch($login_error)
                @case(1)
                    <span> `E-mail` input is empty!</span>
                    @break

                @case(2)
                    <span>`Password` input is empty!</span>
                    @break

                @default
                    <span>Something went wrong, please try again</span>
            @endswitch
            
            <div class="div">{{$item->subject}}</div><br>
          

            <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl" 
            width="400"
            alt=""><br>

            @if(isset($item->video))
                <video controls width="400">
                                
                    <source src="{{asset("videos/" . $item->video)}}"
                            type="video/mp4">
                
                    Sorry, your browser doesn't support embedded videos.
                </video><br>
            @endif
            
        </div><br><br>
    @endforeach
</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script>
      function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    
    var label = document.getElementById("Prerequisites");


  
    // If the checkbox is checked, display the output text
    if (checkBox.checked == true){
    
      label.style.display = "block";

    } else {
      
      label.style.display = "none"; 

    }
  }
  </script>
</head>

<body>
   
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="/" class="brand">Simple</a>
          <nav class="nav">
            
            <ul class="nav__wrapper">
            
                <li class="nav__item">  
                    <a href="#">welcome</a>
                </li>
                       
            </ul>
          </nav>
        </div>
    </header>
    <div><br><br><br><br>

      {{-- ok{{$related}}--------{{$sessions}} --}}
    {{-- @foreach ($sessions as $it)
      <div class="container_s">
        <a href="course/{{$it->id}}">{{$it->subejct}}op</a>
      </div>
    @endforeach --}}
    <div class="container_lnss">
      Prerequisites<input type="checkbox" id="myCheck" name="Prerequisites" onclick="myFunction()" >
    </div>
    <div id="Prerequisites" style="display:none;">
      @if(!is_null($related))
          @foreach ($related as $item)
            <div class="container_lns">
              <a style="color:rgb(150, 41, 41);   text-decoration: none;" href="{{ asset("course/$item->id") }}">{{$item->subject}}</a>
            </div>
          @endforeach
      @else
      
        <div class="container_lns">
          <a style="color:rgb(150, 41, 41);   text-decoration: none;" href="">Nothing!!!!!</a>
        </div>
      @endif
    </div><hr>
    <div class="container_lnss" style="  padding-left: 45%;font-weight: bold;
    font-family:Times New Roman;
    font-size: 40px; ">
      Sessions
    </div>
    @foreach ($sessions as $item)
    {{-- <img src="{{asset("images/" . $item->image)}}" class="image" 
            
            alt=""><br><br> --}}
    <div class="count">{{ $loop->iteration }}</div>
    <div class="container_s">
        <div class="subject">{{$item->subject}}</div><br>
        {{-- <div >{{asset("videos/" . $item->video)}}{{URL::asset("/videos/$item->video")}} </div><br> --}}
        {{-- course{{$course}}0000000000{{$related}} --}}
        <div >{{$item->text}}</div><br><br>
        <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl display: block;
        margin-left: auto;
        margin-right: auto;" 
            width="800"
            height= "auto"
            alt=""><br><br>
        @if(isset($item->video))
        {{-- https://videojs.com/getting-started/ --}}
        {{-- https://github.com/imanghafoori1/laravel-video --}}
        <video width="800" controlsList="nodownload" controls>
            <source src='{{asset("viidd/$item->video")}}'
                    type="video/mp4">
        
            Sorry, your browser doesn't support embedded videos.
        </video><br>
          

        @endif
   
        
        

    </div><br>
    @endforeach


</body>

</html>