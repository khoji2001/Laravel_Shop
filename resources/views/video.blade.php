<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple</title>
</head>
<body>
        <form method="POST" action="{{ '/firstvid' }}" enctype="multipart/form-data" >
            @csrf

            <input type="file" id="video" name="video" onchange="uploadFile()"   accept="video/mp4,video/x-m4v,video/*" >    

            <input type="submit" value="Submit">
        </form>
</body>
<script>
function _(el) {
    return document.getElementById(el);
  }
  
  function uploadFile() {
    var file = _("video").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("video", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "file_upload_parser.php"); // http://www.developphp.com/video/JavaScript/File-Upload-Progress-Bar-Meter-Tutorial-Ajax-PHP
    //use file_upload_parser.php from above url
    ajax.send(formdata);
  }
  
  function progressHandler(event) {
    _("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
  }
  
  function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0; //wil clear progress bar after successful upload
  }
  
  function errorHandler(event) {
    _("status").innerHTML = "Upload Failed";
  }
  
  function abortHandler(event) {
    _("status").innerHTML = "Upload Aborted";
  }
</script>
</html>