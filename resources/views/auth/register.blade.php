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
    {{-- <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Submit">
    </form> --}}
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
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="{{ old('username') }}"><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="{{ old('email') }}"><br>
            
            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"><br>
            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            
            <label for="password_confirmation">Password confirmed:</label><br>
            <input type="password" id="password_confirmation" name="password_confirmation"><br>
            
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