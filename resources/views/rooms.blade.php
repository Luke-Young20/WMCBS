
<html>
    <head>
        <title>Rooms - @yield('title')</title>
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
                <td><a href="fullcalendareventmaster">Room 1</a></td>
                <td><a href="fullcalendareventmaster">Room 3</a></td>
                <td><a href="fullcalendareventmaster">Room 5</a></td>
              </tr>
              <tr>
                <td><a href="fullcalendareventmaster">Room 2</a></td>
                <td><a href="fullcalendareventmaster">Room 4</a></td>
                <td><a href="fullcalendareventmaster">Room 6</a></td>
              </tr>

           
        </div>
    </body>
</html>
<style>
    body {
        text-align: center;
        margin: 50;
        background: lightblue;
        
    }

    td{

        border-left: black;
        border-right: black;
        border-style: solid;
        padding: 4px;
        
    }
    th{

        border-left: black;
        border-right: black;
        border-style: solid;
    }
    table{
        font-size: 105px;
        text-align: center;    
    }
    td:hover {background-color: coral;}
    </style>