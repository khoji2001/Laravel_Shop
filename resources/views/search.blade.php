<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-1.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    {{-- <header class="site-header">
        <div class="wrapper site-header__wrapper">
          <a href="/" class="brand">Simple</a>
          <nav class="nav">
            
            <ul class="nav__wrapper">
                <form method="post" action={{"/search"}} >
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
    </header> --}}
    <nav class=" navbar navbar-dark navbar-expand-lg  justify-content-center" style="background-color: #0B3D91">
      <a href="/" class="navbar-brand d-flex w-50 mr-auto" style="padding-left: 10px !important; ">Simple</a>
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3" aria-controls="collapsingNavbar3" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
          <ul class="navbar-nav w-100 justify-content-center ">
              <form class="mx-2 my-auto d-inline w-100" role="search" method="post" action={{"/search"}}>
                  @csrf
              <div class="input-group">

                <input class="form-control border border-right-0" name="search" id="search" type="text" placeholder="Search" aria-label="Search">
                <span class="input-group-append">
                  <button class="btn btn-outline-secondary border border-left-0" type="button">
                      <i class="fa fa-search"></i>
                  </button>
              </span> 
              </div>               
          </form>
          </ul>
          <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
          
                <li class="nav-item">
                  <a class="nav-link "href="#">{{$search}}</a>
                </li>
              

          </ul>
      </div>
  </nav><br>
    {{-- <a href="{{ route('login') }}">login<a><br>
    <a href="{{ route('register') }}">register<a> --}}
    


    @foreach ($courses as $item)
       
    <div class="container">

        <div class="row">
            <div class="card mb-3 shadow-lg bg-white rounded justify-content-center mx-auto" style="width: 55rem;padding: 0 !important; ">
            <div class="card-header bg-white d-flex justify-content-between">
        
                <h5 class="card-title  p-2 " >{{$item->user->username}}</h5>
                <p class="card-text p-2">starts</p>
                <p class="card-text p-2">{{$item->view}}</p>

                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
            </div>
                <img 
                src="{{asset("images/" . $item->cover)}}" class="card-img-top" 
                alt="" >
                <div class="card-body">
                    <div class=" bg-white d-flex justify-content-between">
                        <h5 class="card-title p-2">{{$item->subject}}</h5>
                        <p class="card-text p-2">{{$item->session()->count()}} sessions</p>
                    </div>
                    <div class=" bg-white d-flex justify-content-between">
                      <h6  style="overflow-y: auto;" class="card-title p-2">{{$item->description}}</h6>
                      <p class="card-text p-2">{{date('d-m-Y', strtotime($item->updated_at))}}</p>
                  </div>

                  {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                  </div>
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