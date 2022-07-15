<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<style>
    .fc-title{
        color: white;
    }
</style>
<div class="container">
    <div id='full_calendar_events'></div>
</div>
<script>
    $(document).ready(function () {
        var eventData = JSON.parse('<?php echo json_encode($eventData)?>');

        var SITEURL = "{{ url('/') }}";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#full_calendar_events').fullCalendar({
            editable: true,
            editable: true,
            events: SITEURL + "/calendar-event",
            displayEventTime: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            eventClick: function (event) {
                var eventDelete = confirm("Are you sure, you want to remove this event ?");
                if (eventDelete) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function (response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event removed from calendar successfully!");
                        }
                    });
                }
            }
        });

        for(let i=0; i<=eventData.length; i++) {
            calendar.fullCalendar('renderEvent', {
                id: eventData[i].id,
                title: eventData[i].event_name,
                start: eventData[i].event_start,
                end: eventData[i].event_end,
            }, true);
        }

    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }

</script>
