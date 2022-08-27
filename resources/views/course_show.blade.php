<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logook.png') }}">

    {{-- <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" > --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
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
   
  <nav class=" navbar navbar-dark navbar-expand-lg  justify-content-center" style="background-color: #033E5B">
    <a href="/" class="navbar-brand d-flex w-50 mr-auto" style="padding-left: 10px !important; ">Simple</a>
    <img src="{{ asset('images/logook.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2 ms-2">

  </nav>

    <div class="container-fluid d-flex align-items-center justify-content-center">
      Prerequisites<input type="checkbox" id="myCheck" name="Prerequisites" onclick="myFunction()" >
    </div>
    <div class="container " id="Prerequisites" style="display:none;">
      
      @if($related->isNotEmpty())
          @foreach ($related as $item)
            <div class="container d-flex align-items-center justify-content-center">
              <a style="color:rgb(150, 41, 41);   text-decoration: none;" href="{{ asset("course/$item->id") }}">{{$item->subject}}</a>
            </div>
          @endforeach
      @else
        <div class="container" >
          <a style="color:rgb(150, 41, 41);   text-decoration: none;" href="">Nothing!!!!!</a>
        </div>
      @endif
    </div><hr>
    <div class="container d-flex align-items-center justify-content-center" style="font-weight: bold;
    font-family:Times New Roman;
    font-size: 40px; ">
      Sessions
    </div>
    @foreach ($sessions as $item)
    {{-- <img src="{{asset("images/" . $item->image)}}" class="image" 
            
            alt=""><br><br> --}}
    <div class="d-flex justify-content-center" style="font-weight: bold;
    font-family:Times New Roman;
    font-size: 40px; ">{{ $loop->iteration }}</div>
    <div class="container-fluid ">
      <div class="row">
        <div class="card mb-3 shadow-lg bg-white rounded justify-content-center mx-auto">
          <div class="card-body bg-white  justify-content-center">
            <div class=" bg-white mx-auto justify-content-center">
                <h5 style="overflow-y: auto;" class="card-title p-2">{{$item->subject}}</h5>
                <h6 style="overflow-y: auto;" class="card-text p-2">{{$item->text}}</h6>
            </div>
          </div>
  
        @if(isset($item->image))
        <img src="{{asset("images/" . $item->image)}}" class="card-img-top justify-content-center mx-auto" style="max-width:800px;" alt="Responsive image"><br>
        @endif
        @if(isset($item->video))
        {{-- https://videojs.com/getting-started/ --}}
        {{-- https://github.com/imanghafoori1/laravel-video --}}
        <video  class="card-img-top justify-content-center mx-auto" style="max-width:800px; max-height:800px; " controlsList="nodownload" controls>
            <source src='{{asset("viidd/$item->video")}}'
                    type="video/mp4">
        
            Sorry, your browser doesn't support embedded videos.
        </video><br>
          

        @endif
        
   
        </div>
        
      </div> 
    </div><br>
    @endforeach


</body>

</html>