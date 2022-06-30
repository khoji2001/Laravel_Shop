{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course</title>
</head>
<body>
    <form method="POST" action="{{ route('course') }}" enctype="multipart/form-data" >
        @csrf
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject"><br><br>
        
        <label for="description">Description:</label><br>
        <input type="text" id="description" name="description"><br><br>

        <label for="cover">Cover:</label><br>
        <input type="file" id="cover" name="cover" accept="image/png, image/jpeg , image/jpg"><br>
        <small>png,jpg,jpeg</small><br><br>
        

        <input type="submit" value="Submit">
    </form>
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
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
      var text = document.getElementById("select");
      var btn = document.getElementById("btn");
      var label = document.getElementById("label");


    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
        btn.style.display = "block";
        label.style.display = "block";

      } else {
        text.style.display = "none";
        btn.style.display = "none";
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
    
    <div class="container_l">
        <form method="POST" action="{{ route('course') }}" enctype="multipart/form-data" >
            @csrf
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters"><br><br>
            
            <label for="description">Description:</label><br>
            <input type="text" id="description" maxlength="100" placeholder="100 characters" name="description"><br><br>
    
            <label for="cover">Cover:</label><br>
            <input type="file" id="cover" name="cover" accept="image/png, image/jpeg , image/jpg"><br><br><br>
            
            <label for="Prerequisites">Prerequisites:</label><input type="checkbox" id="myCheck" name="Prerequisites" ><br><br>
            {{-- onclick="myFunction()" --}}
            <input type="submit" value="Submit">
        </form>
    </div><br><br>

    {{-- <div class="container_ln">
        <form method="get" action={{"/search/check"}} >
            @csrf
            <label style="display: none; font-size: 20px;" id="label" for="search" >search your course:</label>
            <input  type="text" name="search" id="select" placeholder="search..." style="display: none;  width: 400px; 
            margin-bottom: 0px; inline-block float:right;">
            <input  id="btn"  type="submit" value=&#x1F50D; style="display:none; margin-bottom: 16px; " >
        </form>  
    </div> --}}

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif

    
</body>
</html>