<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logook.png') }}">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="{{ asset('styles/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/header-1.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('styles/reset.min.css') }}" rel="stylesheet" type="text/css" >
  
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.css"/>

</head>

<body>
    <div><br>
    <header class="site-header">
        <div class="wrapper site-header__wrapper">
          

          <a href="/" class="brand">Simple</a>
          <nav class="nav">
            
            <ul class="nav__wrapper">
            
                <img src="{{ asset('images/logook.png') }}" width="45" alt="" class="d-inline-block align-middle mr-2 ms-2">

                       
            </ul>
          </nav>
        </div>
    </header>
    <div><br><br>
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
    
    <div id ="origin" style="display: block">

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
              <input type="submit" value="Submit" id="form_sub" onclick="loader();">
          </form>
      </div><br><br>
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
    
      <div class="modal fade bd-example-modal-lg imagecrop " data-keyboard="false" data-backdrop="static" id="model" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-lg" >
          <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cover:</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container"  >
                    <div class="row">
                        <div class="col-md-10">
                            <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" style="width: 100%; heght:100%;">
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

      <div id ="loading" style="display: none">
        <div class="text-center">

            <h1 class="sr-">uploading...</h1>

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
              autoCrop: true,
              autoCropArea: 1,
              aspectRatio: 800 / 600,
              minCropBoxWidth: 800,
              minCropBoxHeight: 600,
              viewMode: 2,

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
<script>
  function loader() {
      document.getElementById('loading').style.display = "block"
      document.getElementById('origin').style.display = "none"
  
  }
</script>

</body>
</html>