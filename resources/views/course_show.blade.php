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
            <div class="div">{{$item->text}}</div><br>
            @if(isset($item->voice))
                <audio onseeking="CallAction1();" onseeked="CallAction2();"  controls>
                    <source src="{{asset("voices/" . $item->voice)}}" type="audio/mpeg">
                Your browser does not support the audio element.
                </audio><br>
            @endif

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
    
</head>

<body>
   
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="#" class="brand">Simple</a>
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
    

    @foreach ($sessions as $item)
    <div class="container">
        <div >{{$item->subject}}</div><br>
        <div >{{$item->text}}</div><br>
        <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl" 
            width="800"
            height= "auto"
            alt=""><br>
        @if(isset($item->video))
        <video controls width="800">
                        
            <source src="{{asset("videos/" . $item->video)}}"
                    type="video/mp4">
        
            Sorry, your browser doesn't support embedded videos.
        </video><br>
        @endif
        @if(isset($item->voice))
            <audio controls>
                <source src="{{asset("voices/" . $item->voice)}}" type="audio/mpeg">
            Your browser does not support the audio element.
            </audio><br>
        @endif
        

    </div><br>
    @endforeach


</body>
</html>