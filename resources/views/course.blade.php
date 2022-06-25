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
    
    <div class="container">
        <form method="POST" action="{{ route('course') }}" enctype="multipart/form-data" >
            @csrf
            <label for="subject">Subject:</label><br>
            <input type="text" id="subject" name="subject" maxlength="80" placeholder="80 characters"><br><br>
            
            <label for="description">Description:</label><br>
            <input type="text" id="description" maxlength="100" placeholder="100 characters" name="description"><br><br>
    
            <label for="cover">Cover:</label><br>
            <input type="file" id="cover" name="cover" accept="image/png, image/jpeg , image/jpg"><br><br><br>
            {{-- <small>png,jpg,jpeg</small><br><br> --}}
            
    
            <input type="submit" value="Submit">
        </form>
    
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