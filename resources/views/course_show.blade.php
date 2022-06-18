<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>course</title>
</head>
<body>
    @foreach ($sessions as $item)
        <div style="padding: 50px; background-color: #7ebce2;">
            {{-- @php
                // $array = (array) $item;
                // $keys = array_keys($array);
                $video = $item->video;
            @endphp --}}
            
            {{-- @switch($login_error)
                @case(1)
                    <span> `E-mail` input is empty!</span>
                    @break

                @case(2)
                    <span>`Password` input is empty!</span>
                    @break

                @default
                    <span>Something went wrong, please try again</span>
            @endswitch --}}
            
            <div class="div">{{$item->subject}}</div><br>
            <div class="div">{{$item->text}}</div><br>
            @if(isset($item->voice))
                <audio controls>
                    <source src="{{asset("voices/" . $item->voice)}}" type="audio/mpeg">
                Your browser does not support the audio element.
                </audio><br>
            @endif

            <img src="{{asset("images/" . $item->image)}}" class="w-4 mb-8 shadow-xl" 
            width="400"
            alt=""><br>

            @if(isset($item->video))
                <video controls width="400">
                                
                    <source src="{{asset("videos/" . $item->video)}}"
                            type="video/mp4">
                
                    Sorry, your browser doesn't support embedded videos.
                </video><br>
            @endif
            
        </div><br><br>
    @endforeach
</body>
</html>