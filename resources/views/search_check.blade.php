<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ok</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="/" class="brand">Simple</a>
          <nav class="nav">
            
            <ul class="nav__wrapper">
                <form method="post" action={{"/search/check?id=$id"}} >
                    @csrf
                    <input type="text" name="search" id="search" placeholder="search..." style=" width: 400px; margin-top:14px;">
                    <input type="submit" value=&#x1F50D; style="padding-right: 6.50em;">
                </form>
                <li class="nav__item">  
                    <a href="#">{{$search}}</a>
                </li>
                       
            </ul>
          </nav>
        </div>
    </header>
    {{-- <a href="{{ route('login') }}">login<a><br>
    <a href="{{ route('register') }}">register<a> --}}
    <div></div><br><br><br><br><br><br>
    <div class="container_lns">
        <form action="{{ asset('/') }}" method="get">
            <input type = "hidden" id="id" name = "id" value = {{(int)$id}}/>
            <input type="submit" style="background-color: green" value="complete">
        </form>
    </div>
        {{-- <input type="checkbox" name="colors[]" value="red" id="color_red" /> --}}
        @foreach ($courses as $item)
            
            {{-- @if(!$leadIds->where('post_id', $id)->contains('related_id',$item->id))
            
                <form action="{{ route('add_related') }}" method="post">
                    @csrf
                    <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
                    <input type = "hidden" name = "related_id" value = {{(int)$item->id}}/>
        
                    <input type="submit" value="add to pre">
                </form>
            
            @endif --}}

        

        {{-- <input type="checkbox" name="courses[]" value="{{$item->id}}" id="courses" /> --}}
            <div class="container_n">
                <div class="card">
                    <div class="card-header">
                    <div class="user">
                        <div class="user-info-right">
                        {{-- <img src="https://yt3.ggpht.com/a/AGF-l7-0J1G0Ue0mcZMw-99kMeVuBmRxiPjyvIYONg=s900-c-k-c0xffffffff-no-rj-mo" alt="user" /> --}}
                            @if(!$leadIds->where('post_id', $id)->contains('related_id',$item->id))
                
                                <form action="{{ route('add_related') }}" method="post">
                                    @csrf
                                    <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
                                    <input type = "hidden" name = "related_id" value = {{(int)$item->id}}/>
                        
                                    <input type="submit" value="add to pre">
                                </form>
                            
                            @else
                                <input type="submit" value="selected" style="  background-color: rgb(41, 250, 65); color: black;">
                            @endif
                        </div>
                        <div class="user-info">
                            <h5>{{$item->user->username}}</h5>
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

        @endforeach
        
    
    @if($courses->isEmpty())
        <div>Not found</div>
    @endif
    {{-- <footer class="site-footer">
        <div class="wrapper site-header__wrapper">
            <nav class="nav">
                <ul class="nav__wrapper">
                    
                    <li class="nav__item"><a href="#">Break it Down , Get to the point</a></li>

                </ul>
            </nav>
          </div>
    </footer> --}}
</body>
</html>