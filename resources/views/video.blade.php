<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First video</title>
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
