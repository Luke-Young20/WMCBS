<html>
    <head>
        <title>Rooms - @yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
    </head>
    <body>


        <div class="container">
            @yield('content')
        </div>

        <div>
        <table>

            <tr>
                <th>Rooms</th>
            </tr>
            
            <tr>
                <td><a href="fullcalendar">Room 1</a></td>
                <td><a href="fullcalendar1">Room 3</a></td>
                <td><a href="fullcalendareventmaster">Room 5</a></td>
              </tr>
              <tr>
                <td><a href="fullcalendar1">Room 2</a></td>
                <td><a href="fullcalendareventmaster">Room 4</a></td>
                <td><a href="fullcalendareventmaster">Room 6</a></td>
              </tr>

           
        </div>
    </body>
</html>
