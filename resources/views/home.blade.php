<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta http-equiv="refresh" content="5" > --}}
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logook.png') }}">

    
    {{-- <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-1.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>


<body>

      <nav class=" navbar navbar-dark navbar-expand-lg  justify-content-center" style="background-color: #033E5B">
        <img src="images/logook.png" width="45" alt="" class="d-inline-block align-middle mr-2 ms-2">

        <a href="/" class="navbar-brand d-flex w-50 mr-auto" style="padding-left: 10px !important; ">Simple</a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3" aria-controls="collapsingNavbar3" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
            <ul class="navbar-nav w-100 justify-content-center ">
                <form class="mx-2 my-auto d-inline w-100" role="search" method="post" action={{"/search"}}>
                    @csrf
                <div class="input-group">

                  <input class="form-control border border-right-0" name="search" id="search"   type="text" placeholder="Search" aria-label="Search">
                  <span class="input-group-append">
                    <button class="btn btn-outline-secondary border border-left-0" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span> 
                </div>               
            </form>
            </ul>
            <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
                @auth
                  <li class="nav-item">
                    <a class="nav-link "href="#">{{auth()->user()->username}}</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('course') }}">New Course</a>
                  </li>
                  
                  
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                  </li>
                @else
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
                            
                @endauth

            </ul>
        </div>
    </nav>
    

    <div></div><br>
    @if(isset($first_video))
    {{-- https://videojs.com/getting-started/ --}}
    {{-- https://github.com/imanghafoori1/laravel-video --}}
    <div class="container">
      <div class="row">

        <video  class=" justify-content-center mx-auto"  controlsList="nodownload" controls>
            <source src='{{asset("viidd_f/$first_video")}}'
                    type="video/mp4">
        
            Sorry, your browser doesn't support embedded videos.
        </video><br>
      </div>
    </div><br>

    @endif
    

    @foreach ($courses as $item)
       
        <div class="container">
          <div onclick="window.open('course/{{$item->id}}','_self');" style="cursor: pointer;">

            <div class="row">
                <div class="card mb-3 shadow-lg bg-white rounded justify-content-center mx-auto" style="width: 50rem !important;padding: 0 !important; ">
                  <div class="card-header bg-white d-flex justify-content-between pb-0">
                    <h5 class="card-title p-2 " style="overflow-y: auto; font-size: calc(0.8em + 0.7vw);">{{$item->user->username}}</h5>
                    <p class="card-text p-2" style="overflow-y: auto; font-size: calc(0.7em + 0.5vw);">{{$item->session()->count()}} sessions</p>

                    <p class="card-text p-2" style="overflow-y: auto; font-size: calc(0.7em + 0.5vw);">{{number_format($item->view)}}views</p>

                  </div>
                    <img 
                    src="{{asset("images/" . $item->cover)}}" class="card-img-top" 
                    alt="Card image cap" >
                    <div class="card-body">
                      <div class=" bg-white d-flex justify-content-between">
                          <h5  style="overflow-y: auto; font-size: calc(0.9em + 0.7vw);" class="card-title p-2">{{$item->subject}}</h5>

                        </div>
                      <div class=" bg-white d-flex justify-content-between">
                        <h5  style="overflow-y: auto; font-size: calc(0.7em + 0.7vw);" class="card-title p-2">{{$item->description}}</h5>
                        <h6 class="card-text p-2" style="font-size: calc(0.5em + 0.5vw);">{{date('d-m-Y', strtotime($item->updated_at))}}</h6>
                      </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
      </div>
    @endforeach

</body>
</html>