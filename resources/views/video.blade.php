<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <div id ="origin" style="display: block">
            <form id="data" method="POST" action="{{ '/firstvid' }}" enctype="multipart/form-data" >
                @csrf

                <input type="file" id="video" name="video"  accept="video/mp4,video/x-m4v,video/*" >    
                
                <input type="submit" value="Submit" onclick="loader();">
            </form>
        </div>
        
        <div id ="loading" style="display: none">
            <div class="text-center">
                <div class="spinner-border" role="status">
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <span class="sr-">uploading...</span>
            </div>
        </div>

</body>
<script>
function loader() {
    document.getElementById('loading').style.display = "block"
    document.getElementById('origin').style.display = "none"

}
</script>

</html>




{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 8 Bootstrap 5 Progress Bar Example</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5" style="max-width: 500px">
       
        <div class="alert alert-warning mb-4 text-center">
           <h2 class="display-6">jQuery Ajax File uploading with Progress Bar Example - Laravelcode</h2>
        </div>  

        <form id="fileUploadForm" method="POST" action="{{ '/firstvid' }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <input type="file" id="video" name="video"  accept="video/mp4,video/x-m4v,video/*" >    
            </div>

            <div class="d-grid mb-3">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>

            <div class="form-group">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

    <script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        console.log('File has uploaded');
                    }
                });
            });
        });
    </script>
</body>

</html> --}}






{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Bootstrap 5 Progress Bar Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5" style="max-width: 900px">
         
        <div class="alert alert-primary mb-4 text-center">
           <h2 class="display-6">Laravel File Upload with Ajax Progress Bar Example - ItSolutionStuff.com</h2>
        </div>  
        <form id="fileUploadForm" method="POST" action="{{ "firstvid/" }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <input name="file" type="file" class="form-control">
            </div>
            <div class="form-group">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
                </div>
            </div>
            <div class="d-grid mt-4">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
    <script>
        $(function () {
            $(document).ready(function () {
                $('#fileUploadForm').ajaxForm({
                    beforeSend: function () {
                        var percentage = '0';
                    },
                    uploadProgress: function (event, position, total, percentComplete) {
                        var percentage = percentComplete;
                        $('.progress .progress-bar').css("width", percentage+'%', function() {
                          return $(this).attr("aria-valuenow", percentage) + "%";
                        })
                    },
                    complete: function (xhr) {
                        console.log('File has uploaded');
                    }
                });
            });
        });
    </script>
</body>
</html> --}}
