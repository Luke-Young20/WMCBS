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
                <td><a href="/fullcalendar/1">Room 1</a></td>
                <td><a href="/fullcalendar/3">Room 3</a></td>
                <td><a href="/fullcalendar/5">Room 5</a></td>
              </tr>
              <tr>
                <td><a href="/fullcalendar/2">Room 2</a></td>
                <td><a href="/fullcalendar/4">Room 4</a></td>
                <td><a href="/fullcalendar/6">Room 6</a></td>
              </tr>

           
        </div>
    </body>
</html>
