@extends('layouts.dashboard')

@section('title', 'DIMAS - Schedule')

@section('schedule', 'active')
    
@section('plugin')
<link rel="stylesheet" href="{{asset('/assets/fullcalendar/main.css')}}">
<script src="{{asset('/assets/fullCalendar/main.js')}}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $.ajax({
                type:'get',
                url:'/getCalendarData/' + {{ Auth::id() }},
                success:function(data){
                console.log(data);
            
                var tanggalAwal, tanggalAkhir, id = 0, selId;
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    themeSystem: 'bootstrap',
                    // Custom Button
                    customButtons: {
                        add: {
                            click: function () {
                                if (tanggalAwal != '' && tanggalAkhir != '') {
                                    var eventName = prompt('Masukan Nama Event');
                                    if(eventName!=null){
                                        calendar.addEvent({
                                            id: id,
                                            title: eventName,
                                            start: tanggalAwal,
                                            end: tanggalAkhir,
                                            allday: true
                                        });
                                        $.ajax({
                                            url:'/schedule/create',
                                            type:'post',
                                            data:{
                                                title: eventName,
                                                start: tanggalAwal,
                                                end: tanggalAkhir,
                                                pemilik: {{ Auth::id() }},
                                                allDay: 1
                                            },
                                            dataType:'json',
                                            success:function(data){
                                                console.log(data.message);
                                            }
                                        });
                                    }
                                    tanggalAwal = '';
                                    tanggalAkhir = '';
                                    id++;
                                } else {
                                    alert('Tidak ada tanggal yang dipilih');
                                }
                            },
                        },
                        detail: {
                            click: function () {
                                document.location.href = "/detail-schedule/"+selId;
                            }
                        }
                    },
                    bootstrapFontAwesome: {
                        add: 'fa-plus',
                        detail: 'fa-eye'
                    },
                    // Header & Layout Setting
                    headerToolbar: {
                        start: 'prev,next',
                        center: 'title',
                        end: 'detail'
                    },
                    initialView: 'dayGridMonth',
                    fixedWeekCount: false,

                    // Select Behaviour
                    selectable: true,
                    select: function (info) {
                        tanggalAkhir = info.endStr;
                        tanggalAwal = info.startStr;

                    },
                    unselect: function () {
                        calendarEl.getElementsByClassName('fc-detail-button')[0].setAttribute(
                            'disabled', '');
                    },

                    eventClick: function (info) {
                        selId = info.event.id;
                        calendarEl.getElementsByClassName('fc-detail-button')[0].removeAttribute(
                            'disabled');
                    },

                    // Drag & Drop Behaviour
                    editable: true,
                    
                    events: data.data
                });
                calendar.render();
                calendarEl.getElementsByClassName('fc-detail-button')[0].setAttribute('disabled', '');
            }
        });
    });

</script>
@endsection

@if ($socialMedia)  
    @section('content')
    <div class="row">
        <div class="col p-5"><div id="calendar"></div></div>
    </div>
    @endsection
@else
@section('content')
<div class="alert alert-danger col-5 text-center m-3">
    <h5>
        {{ $message }}
    </h5>
</div>
@endsection

@endif

@section('home', '')
@section('schedule', 'acive')
    