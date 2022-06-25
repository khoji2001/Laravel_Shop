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
          <a href="/" class="brand">Simple</a>
          <nav class="nav">
            
            
            <ul class="nav__wrapper">
              {{-- <li class="nav__item"><a href="#">Home</a></li> --}}
                {{-- search          --}}
                <form method="post" action={{"/search"}} >
                    @csrf
                    <input type="text" name="search" id="search" placeholder="search..." style=" width: 400px; margin-top:14px;">
                    <input type="submit" value=&#x1F50D; style="padding-right: 6.50em;">
                </form>
            </ul>
          </nav>
        </div>
    </header>
    {{-- <a href="{{ route('login') }}">login<a><br>
    <a href="{{ route('register') }}">register<a> --}}
    <div></div><br><br><br><br><br>
    
    @foreach ($courses as $item)
    <div onclick="window.open('course/{{$item->id}}','mywindow');" style="cursor: pointer;">
        <div class="container_n">
            <div class="card">
            <div class="card-header">
                <div class="user">
                    {{-- <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" /> --}}
                    <div class="user-info">
                    <h5>July Dec</h5>
                    <small>{{date('d-m-Y', strtotime($item->updated_at))}}</small>
                    </div>
                </div>
                <img src="{{asset("images/" . $item->cover)}}" alt="rover" >
            </div>
            <div class="card-body_n">
                {{-- <span class="tag tag-teal">Technology</span> --}}
                <h4>
                {{$item->subject}}
                </h4><br>
                <p>
                    {{$item->description}}
                </p>
                
            </div>
            </div>
        </div>
    </div>
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
