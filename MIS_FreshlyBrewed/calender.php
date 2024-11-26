<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>See All Calendar</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Calendar</h2>
        <div id="calendar"></div>
    </div>
    <p class="text-center mt-3"><a href="dashboard.php">Back to Dashboard</a></p>

    <!-- Script to load the calendar -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.2.0/dist/fullcalendar.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: [
                    {
                        title: 'Meeting',
                        start: '2024-11-25T10:30:00',
                        end: '2024-11-25T12:30:00'
                    },
                    {
                        title: 'Conference',
                        start: '2024-11-26T14:00:00',
                        end: '2024-11-26T16:00:00'
                    },
                    {
                        title: 'Workshop',
                        start: '2024-11-28T09:00:00',
                        end: '2024-11-28T11:00:00'
                    }
                ]
            });
        });
    </script>
</body>

</html>
