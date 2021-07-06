@extends('layouts.app')

@section('head')
    <link href="/fullcalendar/packages/core/main.css" rel='stylesheet' />
    <link href="/fullcalendar/packages/timegrid/main.css" rel='stylesheet' />
    <link href="/fullcalendar/packages/daygrid/main.css" rel='stylesheet' />
    <link href="/fullcalendar/packages/list/main.css" rel='stylesheet' />
    <script src="/fullcalendar/packages/core/main.js"></script>
    <script src="/fullcalendar/packages/interaction/main.js"></script>
    <script src="/fullcalendar/packages/daygrid/main.js"></script>
    <script src="/fullcalendar/packages/timegrid/main.js"></script>
    <script src="/fullcalendar/packages/list/main.js"></script>
@endsection

@section('content')
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-positions mr-2"></i> <span class="font-weight-semibold">{{__('Calendar')}}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content pt-0">

        <!-- Basic card -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">{{__('Calendar')}}</h5>
            </div>

            <div class="card-body">
                <div id="calendar"></div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
                slotDuration: '00:15:00',
                slotLabelFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false,
                },
                eventTimeFormat: {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: false,
                },
                slotLabelInterval: "01:00:00",
                defaultDate: '{{now()->format('Y-m-d')}}',
                navLinks: true, // can click day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events
                events: jQuery.parseJSON( '<?php echo $items; ?>' ),
                eventRender: function(info) {
                $(info.el).find('.fc-title').html(info.event.title);
                $(info.el).find('.fc-list-item-title').html(info.event.title);
                },
            });

           calendar.render();

       });
    </script>
@endsection
