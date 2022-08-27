<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logook.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    {{-- <link rel="stylesheet" href="styles/reset.min.css" />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="stylesheet" href="styles/header-1.css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
   
    <nav class=" navbar navbar-dark navbar-expand-lg  justify-content-center" style="background-color: #033E5B">
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
                  <button class="btn btn-outline-secondary border border-left-0" type="submit">
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
    
    @foreach ($courses as $item)
    <div onclick="window.open('course/{{$item->id}}','_self');" style="cursor: pointer;">
  
        <div class="container">

            <div class="row">
                <div class="card mb-3 shadow-lg bg-white rounded justify-content-center mx-auto" style="width: 55rem;padding: 0 !important; ">
                <div class="card-header bg-white d-flex justify-content-between">
            
                    <h5 class="card-title  p-2 " >{{$item->user->username}}</h5>
                    <p class="card-text p-2">{{$item->session()->count()}}sessions</p>
                    <p class="card-text p-2">{{$item->view}}views</p>

                </div>
                    <img 
                    src="{{asset("images/" . $item->cover)}}" class="card-img-top" 
                    alt="" >
                    <div class="card-body">
                        <div class=" bg-white d-flex justify-content-between">
                            <h5  style="overflow-y: auto;" class="card-title p-2">{{$item->subject}}</h5>
                        </div>
                        <div class=" bg-white d-flex justify-content-between">
                        <h6  style="overflow-y: auto;" class="card-title p-2">{{$item->description}}</h6>
                        <p class="card-text p-2">{{date('d-m-Y', strtotime($item->updated_at))}}</p>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @if($courses->isEmpty())
        <div>Not found</div>
    @endif

</body>
</html>