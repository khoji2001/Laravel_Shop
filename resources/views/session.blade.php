{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>session</title>
</head>
<script>
    function myFunction() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheck");
  // Get the output text
  var text = document.getElementById("text");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}
function myFunctionimage() {
  // Get the checkbox
  var checkBox = document.getElementById("myCheckimage");
  // Get the output text
  var text = document.getElementById("image");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

</script>
<body>
    <div>
        {{(int)$id}}
    </div>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <form method="POST" action="{{ '/api/session/' }}" enctype="multipart/form-data" >
        @csrf
        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject"><br><br>
        
        <label  for="text">Text:</label>
        <input type="checkbox" id="myCheck" onclick="myFunction()"><br>

        <input type="text" id="text" name="text" style="display:none" ><br><br>

        <label for="image">Image:</label><input type="checkbox" id="myCheckimage" onclick="myFunctionimage()"><br>

        <input type="file" id="image" name="image" style="display:none" accept="image/png, image/jpeg , image/jpg"><br>
        <small>png,jpg,jpeg</small><br><br>

        <label for="video">Video:</label><br>
        <input type="file" id="video" name="video" accept="video/mp4,video/x-m4v,video/*" ><br>
        <small>mp4,x-m4v</small><br><br>

        <label for="voice">Voice:</label><br>
        <input type="file" id="voice" name="voice" accept="audio/mp3,audio/mpeg" ><br>
        <small>mp3,mpeg</small><br><br>

        <input type = "hidden" name = "course_id" value = {{(int)$id}}/>



        <input type="submit" value="Submit">
    </form><br><br>



    
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
      var text = document.getElementById("text");
    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }
    function myFunctionimage() {
      // Get the checkbox
      var checkBox = document.getElementById("myCheckimage");
      // Get the output text
      var text = document.getElementById("image");
    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }
    function myFunctionvideo() {
      // Get the checkbox
      var checkBox = document.getElementById("myCheckvideo");
      // Get the output text
      var text = document.getElementById("video");
    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }
    function myFunctionvoice() {
      // Get the checkbox
      var checkBox = document.getElementById("myCheckvoice");
      // Get the output text
      var text = document.getElementById("voice");
    
      // If the checkbox is checked, display the output text
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
        text.style.display = "none";
      }
    }  
    </script>
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
    
    <div class="container">
        <form method="POST" action="{{ '/api/session/' }}" enctype="multipart/form-data" >
            @csrf
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters" ><br><br>
            
            <label  for="text">Text:</label>
            <input type="checkbox" id="myCheck" onclick="myFunction()"><br>
            
            <textarea id="text" name="text" maxlength="350" style="display:none; height:200px; font-size: 18px; font-family:Times, serif;" placeholder="300 characters" ></textarea><br>
            {{-- <input type="text" id="text" name="text" style="display:none" ><br> --}}
    
            <label for="image">Image:</label><input type="checkbox" id="myCheckimage" onclick="myFunctionimage()"><br>
    
            <input type="file" id="image"  name="image" style="display:none" accept="image/png, image/jpeg , image/jpg"><br>
            
    
            <label for="video">Video:</label><input type="checkbox" id="myCheckvideo" onclick="myFunctionvideo()"><br>
            <input type="file" id="video" name="video"  style="display:none" accept="video/mp4,video/x-m4v,video/*" ><br>
    
            <label for="voice">Voice:</label><input type="checkbox" id="myCheckvoice" onclick="myFunctionvoice()"><br>
            <input type="file" id="voice" style="display:none" name="voice" accept="audio/mp3,audio/mpeg" ><br>
    
            <input type = "hidden" name = "course_id" value = {{(int)$id}}/>
    
    
    
            <input type="submit" value="Submit">
        </form><br><br>
    
    </div>
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