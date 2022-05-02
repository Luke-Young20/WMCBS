<html>
    <head>
        <title>Rooms - @yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/rooms.css') }}">
    </head>
    <body class="page">
        <div class="header">
            <img class="logo" src="https://www.swansea.ac.uk/_assets/images/logos/swansea-university-2017.en.png" alt="Uni Logo"/>
            <h1 class="text">Rooms</h1>
            <img class="logo" src="https://www.swansea.ac.uk/_assets/images/logos/swansea-university-2017.en.png" style="visibility: hidden;"/>
        </div>
        <div class="container">
            <div class="rooms">
                @for ($i = 1; $i < 7; $i++)
                    <a class="room" href="/fullcalendar/{{$i}}">
                        <span class="room-text">Room {{$i}}</span>
                    </a>
                @endfor
            </div>
        </div>
    </body>
</html>
