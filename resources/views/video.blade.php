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

            <input type="file" id="video" name="video"   accept="video/mp4,video/x-m4v,video/*" >    

            <input type="submit" value="Submit">
        </form>
</body>
</html>