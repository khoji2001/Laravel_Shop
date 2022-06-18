<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        home
    </div>
    {{-- <a href="{{ route('login') }}">login<a><br>
    <a href="{{ route('register') }}">register<a> --}}
    
    @auth
        {{-- <cart /> --}}
        <div>{{auth()->user()->username}}</div><br>
        
        <li class="nav-item">  
            <a href="{{ route('course') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">create your course</a>
        </li>
        <li class="nav-item">  
            <a href="{{ route('logout') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Logout</a>
        </li>
    @else
        <li class="nav-item">  
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
        </li>
            @if (Route::has('register'))
            <li class="nav-item">  
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
            </li>    
            @endif
    @endauth

    @foreach ($courses as $item)
        <div onclick="window.open('course/{{$item->id}}','mywindow');" style="cursor: pointer;">
            <div class="div">{{$item->subject}}</div>
            <div class="div">{{$item->description}}</div>

            <img src="{{asset("images/" . $item->cover)}}" class="w-4 mb-8 shadow-xl" 
            width="400"
            alt="" src ="bfjdsnk">
            {{-- <video controls width="400">
                            
                <source src="{{asset("videos/" . $item->video)}}"
                        type="video/mp4">
            
                Sorry, your browser doesn't support embedded videos.
            </video> --}}

        </div><br>
    @endforeach
</body>
</html>