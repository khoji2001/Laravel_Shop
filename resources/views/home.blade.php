<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="#" class="brand">Simple</a>
          <nav class="nav">
            
            
            <ul class="nav__wrapper">
              {{-- <li class="nav__item"><a href="#">Home</a></li> --}}
                {{-- search          --}}
                <form action="" >
                    <input type="text" name="search" id="search" placeholder="search..." style=" width: 400px; margin-top:14px;">
                    <input type="submit" value=&#x1F50D; style="padding-right: 6.50em;">
                </form>
                @auth
                    
                    <li class="nav__item"><a href="#">{{auth()->user()->username}}</a></li>
                    
                    <li class="nav__item">
                        <a href="{{ route('course') }}">create your course</a>
                    </li>

                    <li class="nav__item">  
                        <a href="{{ route('logout') }}" >Logout</a>
                    </li>
                @else
                    <li class="nav__item">  
                        <a href="{{ route('login') }}">Log in</a>
                    </li>
                        @if (Route::has('register'))
                        <li class="nav__item">  
                            <a href="{{ route('register') }}" >Register</a>
                        </li><br><br>
                        @endif
                @endauth
            </ul>
          </nav>
        </div>
    </header>
    {{-- <a href="{{ route('login') }}">login<a><br>
    <a href="{{ route('register') }}">register<a> --}}
    <div></div><br><br><br><br><br><br>
    

    @foreach ($courses as $item)
        <div onclick="window.open('course/{{$item->id}}','mywindow');" style="cursor: pointer;">
            <div class="div">{{$item->subject}}</div>
            <div class="div">{{$item->description}}</div>

            <img src="{{asset("images/" . $item->cover)}}" class="w-4 mb-8 shadow-xl" 
            width="400"
            alt="" src ="bfjdsnk">
            

        </div><br>
    @endforeach
    <footer class="site-footer">
        <div class="wrapper site-header__wrapper">
            {{-- <a href="#" class="brand">Simple</a> --}}
            <nav class="nav">
                <ul class="nav__wrapper">
                    
                    <li class="nav__item"><a href="#">Break it Down , Get to the point</a></li>

                </ul>
            </nav>
          </div>
    </footer>
</body>
</html>