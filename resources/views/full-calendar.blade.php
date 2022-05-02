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

    <style>
        .back-btn {
            display: inline-block;
            box-sizing: border-box;
            margin: 0;
            margin-bottom: .5em;
            padding: .3em 1.7em;
            font-size: 1em;
            white-space: nowrap;
            cursor: pointer;
            color: #333333;
            background-color: #f5f5f5;
            text-decoration: none;
            border-radius: 5px;
            border-width: 1px;
            border-style: solid;
            background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: -o-linear-gradient(top, #ffffff, #e6e6e6);
            background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            border-color: #e6e6e6 #e6e6e6 #bfbfbf;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            color: #333;
            text-shadow: 0 1px 1px rgb(255 255 255 / 75%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 20%), 0 1px 2px rgb(0 0 0 / 5%);
        }
        .back-btn:hover, .back-btn:focus, .back-btn:active {
            color: unset;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <br />
        <h1 class="text-center"><u>Swansea University: Room Booking System</u></h1>
        <a class="back-btn" href="/rooms">Back</a>

        <div id="calendar"></div>
    </div>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: '/fullcalendar/{{ $id }}',
                selectable: true,
                selectHelper: true,
                eventOverlap: false,
                selectOverlap: false,

                select: function(start, end, allDay) {

                    var title = prompt('Event Title:');
                    var room = prompt('Enter Room');

                    if (title) {
                        var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                        var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                        $.ajax({
                            url: "/fullcalendar/action",
                            type: "POST",
                            data: {
                                title: title,
                                room: room,
                                start: start,
                                end: end,
                                type: 'add'
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (!response.success) {
                                    console.log("The request failed with the error: " + response.error);
                                    alert("Event was not created");
                                    calendar.fullCalendar('refetchEvents');
                                } else {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Created Successfully");
                                    console.log("The request succeeded with the data: ", response);
                                }
                            }

                        })
                    }
                },
                editable: true,
                eventOverlap: false,
                selectOverlap: false,
                eventResize: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var room = event.room;
                    var id = event.id;

                    $.ajax({
                        url: "/fullcalendar/action",
                        type: "POST",
                        data: {
                            title: title,
                            room: room,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        dataType: 'json',
                         success: function(response) { 
                            if (!response.success) {
                                console.log("The request failed with the error: " + response.error);
                               
                                alert(response.error);
                                calendar.fullCalendar('refetchEvents');
                            } else {
                                $('#calendar').fullCalendar('updateEvent', response.data);
                                alert("Event resized Successfully");
                            }
                        }
                    })
                },
                eventOverlap: false,
                selectOverlap: false,
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
                    var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
                    var title = event.title;
                    var room = event.room;
                    var id = event.id;
                    /* var userid = {{ Auth::user()->id }} */
                    /*     var userid = event.userid; */
                    $.ajax({
                        url: "/fullcalendar/action",
                        type: "POST",
                        data: {
                            title: title,
                            room: room,
                            start: start,
                            end: end,
                            id: id,
                            type: 'update'
                        },
                        dataType: 'json',
                        success: function(response) {
                                if (!response.success) {
                                    console.log("The request failed with the error: " + response.error);
                                    calendar.fullCalendar('refetchEvents');
                                    alert(response.error);

                                } else {
                                    $('#calendar').fullCalendar('updateEvent', response.data);
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Updated Successfully");
                                }
                            }
                    })
                },
                eventOverlap: false,
                selectOverlap: false,
                eventClick: function(event) {
                    if (confirm("Are you sure you want to remove it?")) {
                        var id = event.id;
                        $.ajax({
                            url: "/fullcalendar/action",
                            type: "POST",
                            data: {
                                id: id,
                                type: "delete"
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (!response.success) {
                                    console.log("The request failed with the error: " + response.error);
                                    alert(response.error);
                                } else {
                                    calendar.fullCalendar('refetchEvents');
                                    alert("Event Deleted Successfully");
                                }
                            }
                        })
                    }
                }
            });

        });
    </script>

</body>

</html>
