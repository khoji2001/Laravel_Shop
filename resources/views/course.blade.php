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
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" >
    {{-- <style>
  body{
    background-color: #dfdfdf;
  }

  .container {
    max-width: 960px;
    margin: 30px auto;
    padding: 20px;
  }
  h1 {
    font-size: 20px;
    text-align: center;
    margin: 20px 0 20px;
  }
  h1 small {
    display: block;
    font-size: 15px;
    padding-top: 8px;
    color: gray;
  }
  .avatar-upload {
    position: relative;
    max-width: 205px;
    margin: 50px auto;
  }
  .avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
  }
  .avatar-upload .avatar-edit input {
    display: none;
  }
  .avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
  }
  .avatar-upload .avatar-edit input + label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
  }
  .avatar-upload .avatar-edit input + label:after {
    content: "\f040";
    font-family: 'FontAwesome';
    color: #757575;
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
  }
  .avatar-upload .avatar-preview {
    width: 800px;
    height: 600px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
  }
  .avatar-upload .avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
  }
  .container2 .btn {
      position: absolute;
      top: 90%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
    
      color: white;
      font-size: 16px;

      border: none;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
  }
  #image {
    display: block;
    /* This rule is very important, please don't ignore this */
    max-width: 100%;
}

</style> --}}
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"/>

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
    
    <div class="container_l">
        <form id="myform" name="myform" method="POST" action="{{ route('course') }}" enctype="multipart/form-data" >
            @csrf
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters"><br><br>
            
            <label for="description">Description:</label><br>
            <input type="text" id="description" maxlength="100" placeholder="100 characters" name="description"><br><br>
    
            <label for="cover">Cover:</label><br>
            {{-- <input type="file" class="image" id="cover" name="image" accept="image/png, image/jpeg , image/jpg"><br><br><br> --}}
            
            <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="imageUpload" class=" imageUpload" /><br><br>
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

<script>
  window.addEventListener( "pageshow", function ( event ) {
  var historyTraversal = event.persisted || 
                         ( typeof window.performance != "undefined" && 
                              window.performance.navigation.type === 2 );
  if ( historyTraversal ) {
    // Handle page restore.
    window.location.reload();
  }
});
</script>


    


</body>
</html>