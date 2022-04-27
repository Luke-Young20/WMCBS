<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>





</head>
<body>
  
<div class="container">
    <br />
    <h1 class="text-center"><u>Room Booking System</u></h1>
    <br />

    <div id="calendar"></div> 
</div>
   
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/fullcalendar/{{ $id }}',
        selectable:true,
        selectHelper: true,
        eventOverlap: false,
        selectOverlap: false,

        select:function(start, end, allDay)
        {

            //$id = Auth;
           // var userid = '2';
            //var userid = $id;
            var userid = {{ Auth::user()->id }}
            var title = prompt('Event Title:');
            var room = prompt('Enter Room');

            //var userid = user.id;
            if(title)
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/fullcalendar/action",
                    type:"POST",
                    data:{
                        title: title,
                        room: room,
                        userid: userid, 
                        start: start,
                        end: end,
                        type: 'add'
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Created Successfully");
                    }
                })
            }
        },
        editable:true,
        eventOverlap: false,
        selectOverlap: false,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var room = event.room;
            var id = event.id;
            /* var userid = event.userid; */

            $.ajax({
                url:"/fullcalendar/action",
                type:"POST",
                data:{
                    title: title,
                    room: room,
               /*      userid: userid, */

                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    $('#calendar').fullCalendar('updateEvent', event);

                    alert("Event resized Successfully");
                }
            })
        },
        eventOverlap: false,
        selectOverlap: false,
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var room = event.room;
            var id = event.id;
        /*     var userid = event.userid; */
            $.ajax({
                url:"/fullcalendar/action",
                type:"POST",
                data:{
                    title: title,
                    room: room,
           /*          userid: userid, */

                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    $('#calendar').fullCalendar('updateEvent', event);
                    alert("Event Updated Successfully");
                }
            })
        },
        eventOverlap: false,
        selectOverlap: false,
        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"/fullcalendar/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Deleted Successfully");
                    }
                })
            }
        }
    });

});
  
</script>
  
</body>
</html>
