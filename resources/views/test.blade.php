<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" >

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"/>

<style type="text/css">
.alert{
    padding:15px 0px 0px 0px;
}    
</style>


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

</script>
</head>

<body>
    window.onbeforeunload = function() { return "Your work will be lost."; };

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
    <div><br><br><br>
    {{-- @if(Session::get('message'))
      <div class="alert alert-primary" role="alert">
        {{ Session::get('message') }}
      </div>
    @endif
    @if(Session::get('error'))
      <div class="alert alert-danger" role="alert">
        {{ Session::get('error') }}
      </div>
    @endif --}}
    @php
    $data = Session("data")
    @endphp

    @if(isset($data))

    <div class="container_l">
      <form method="POST" action="{{ '/api/test/sessions' }}" enctype="multipart/form-data" >
          @csrf
          <div class="alert alert-danger print-error-msg" style="display:none">
            <ul></ul>
          </div>

          <label for="subject">Subject:</label><br>
          <input type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters" ><br><br>
          
          <label  for="text">Text:</label>
          <input type="checkbox" id="myCheck" onclick="myFunction()"><br>
          
          <textarea id="text" name="text" maxlength="350" style="display:none; height:200px; font-size: 18px; font-family:Times, serif;" placeholder="300 characters" ></textarea><br>
          {{-- <input type="text" id="text" name="text" style="display:none" ><br> --}}
  
          <label for="image">Image:</label><input type="checkbox" id="myCheckimage" onclick="myFunctionimage()"><br>
  
          <input type="file" id="image"  name="image" style="display:none" accept="image/png, image/jpeg , image/jpg"><br>
          {{-- @php
          $data1=serialize($data); 
          $data1=htmlentities($data1);
          @endphp --}}
          <input type="hidden" id="data" name="data" value={{$data}}>
  
          <label for="video">Video:</label><input type="checkbox" id="myCheckvideo" onclick="myFunctionvideo()"><br>
          <input type="file" id="video" name="video"  style="display:none" accept="video/mp4,video/x-m4v,video/*" ><br>
  
  
  
  
          <input type="submit" value="Submit" id = "btn-submit">
      </form><br><br>
  
  </div><br><br>
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

  {{-- @foreach ($sessions as $item)
  <div class="container">
      <div >{{$item->subject}}</div><br>
      <div >{{$item->text}}</div><br>
      <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl" 
          width="250"
          alt=""><br>
      @if(isset($item->video))
      <video width="300" controlsList="nodownload" controls>
          <source src='{{asset("viidd/$item->video")}}'
                  type="video/mp4">
      
          Sorry, your browser doesn't support embedded videos.
      </video><br>
      @endif
      
      

  </div><br>
  @endforeach --}}

    @else

    
    
    <div class="container_l">
        <form id="myform" name="myform" method="POST" action="api/test" enctype="multipart/form-data" >
            @csrf
            <label for="subject">Subject:</label><br>
            <input required type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters"><br><br>
            
            <label for="description">Description:</label><br>
            <input type="text" id="description" maxlength="100" placeholder="100 characters" name="description"><br><br>
    
            <label  for="cover">Cover:</label><br>
            {{-- <input type="file" class="image" id="cover" name="image" accept="image/png, image/jpeg , image/jpg"><br><br><br> --}}
            
            <input required type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload" class=" imageUpload" /><br><br>
            <input type="hidden" name="base64image" name="base64image" id="base64image">
            {{-- <img id="blah" src="#" alt="your image" /> --}}

            {{-- <label for="Prerequisites">Prerequisites:</label><input type="checkbox" id="myCheck" name="Prerequisites" ><br><br> --}}
            {{-- onclick="myFunction()" --}}
            <div class="avatar-preview container2">
                @php
                    if(!empty($image->image) && $image->image!='' && file_exists(public_path('images/'.$image->image))){
                      $image =$image->image;
                    }else{
                      $image = 'default.png';
                    }
                    $url = url('public/images/'.$image);
                    $imgs =  "background-image:url($url)";
                      
                @endphp
                <div id="imagePreview" style="{{$imgs}};">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </div>
            </div>
            <input type="submit" value="Submit" id="form_sub">
        </form>
    </div><br><br>
    </div>
 @endif
    
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

    <div class="modal fade bd-example-modal-lg imagecrop " data-keyboard="false" data-backdrop="static" id="model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cover:</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="img-container">
                  <div class="row">
                      <div class="col-md-11">
                          <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                      </div>
                  </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary crop" id="crop">Crop</button>
            </div>
        </div>
      </div>
    </div>
  
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
  <script>
      var $modal = $('.imagecrop');
      var image = document.getElementById('image');
      var cropper;
      $("body").on("change", ".imageUpload", function(e){
          var files = e.target.files;
          var done = function(url) {
              image.src = url;
              $modal.modal('show');
          };
          var reader;
          var file;
          var url;
          if (files && files.length > 0) {
              file = files[0];
              if (URL) {
                  done(URL.createObjectURL(file));
              } else if (FileReader) {
                  reader = new FileReader();
                  reader.onload = function(e) {
                      done(reader.result);
                  };
                  reader.readAsDataURL(file);
              }
          }
      });
      $modal.on('shown.bs.modal', function() {
          cropper = new Cropper(image, {
              aspectRatio: 1.333,
              viewMode: 1,
          });
      }).on('hidden.bs.modal', function() {
          cropper.destroy();
          cropper = null;
      });
      $("body").on("click", "#crop", function() {
          canvas = cropper.getCroppedCanvas({
              width: 800,
              height: 600,
          });
          canvas.toBlob(function(blob) {
              url = URL.createObjectURL(blob);
              var reader = new FileReader();
              reader.readAsDataURL(blob);
              reader.onloadend = function() {
                   var base64data = reader.result;
                   $('#base64image').val(base64data);
                   document.getElementById('imagePreview').style.backgroundImage = "url("+base64data+")";
                   $modal.modal('hide');
              }
          });
      })

  </script>

<script type="text/javascript">
      
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(".btn-submit").click(function(e){
  
      e.preventDefault();
   
      var subject = $("#subject").val();
      var text = $("#text").val();
      var image = $("#image").val();
      var video = $("#video").val();

   
      $.ajax({
         type:'POST',
         url:"api/test/sessions",
         data:{subject:subject, text:text, image:image , video:video},
         success:function(data){
              if($.isEmptyObject(data.error)){
                  alert(data.success);
                  location.reload();
              }else{
                  printErrorMsg(data.error);
              }
         }
      });
  });

  function printErrorMsg (msg) {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").css('display','block');
      $.each( msg, function( key, value ) {
          $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
  }

</script>



</body>
</html>