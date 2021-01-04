@extends('layouts.admin')

@section('title', 'Schedule')

@section('plugin')
<script src='https://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
<script src="https://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
<script src='https://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>
<link rel="stylesheet" href="{{asset('/assets/fullcalendar/main.css')}}">
<script src="{{asset('/assets/fullCalendar/main.js')}}"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        var idPemilik = window.location.pathname.split('/');
        idPemilik = idPemilik[idPemilik.length - 1];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                type:'get',
                url:'/getCalendarData/' + idPemilik,
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
                                                pemilik: idPemilik,
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
                        remove: {
                            click: function () {
                                if (selId != '') {
                                    var selectedEvent = calendar.getEventById(selId);
                                    var result = confirm('Yakin ingin menghapus Event "' + selectedEvent.title + '" ?');
                                        if(result){
                                            $.ajax({
                                                url:'/schedule/delete/',
                                                type:'delete',
                                                data:{
                                                    'id':selectedEvent.id
                                                },
                                                dataType:'json',
                                                success:function(data){
                                                    console.log(data.message);
                                                }
                                            });
                                            selectedEvent.remove();
                                        }
                                    selId = '';
                                    calendarEl.getElementsByClassName('fc-remove-button')[0].setAttribute(
                                        'disabled', '');
                                    calendarEl.getElementsByClassName('fc-edit-button')[0].setAttribute(
                                        'disabled', '');
                                } else {
                                    alert('Tidak ada event yang dipilih');
                                }
                            }
                        },
                        edit: {
                            click: function () {
                                if (selId != '') {
                                    var id = "/" + "id"; //Id Event
                                    document.location.assign('/schedule/edit/' + selId);
                                } else {
                                    alert('Tidak ada event yang dipilih');
                                }
                            }
                        }
                    },
                    bootstrapFontAwesome: {
                        remove: 'fa-trash',
                        add: 'fa-plus',
                        edit: 'fa-pencil'
                    },
                    // Header & Layout Setting
                    headerToolbar: {
                        start: 'prev,next',
                        center: 'title',
                        end: 'add edit remove'
                    },
                    initialView: 'dayGridMonth',
                    fixedWeekCount: false,

                    // Select Behaviour
                    selectable: true,
                    select: function (info) {
                        tanggalAkhir = info.endStr;
                        tanggalAwal = info.startStr;
                        calendarEl.getElementsByClassName('fc-add-button')[0].removeAttribute('disabled');
                    },
                    unselect: function () {
                        setTimeout(() => {
                            calendarEl.getElementsByClassName('fc-add-button')[0].setAttribute(
                                'disabled', '');
                        }, 50);
                    },

                    eventClick: function (info) {
                        selId = info.event.id;
                        calendarEl.getElementsByClassName('fc-remove-button')[0].removeAttribute(
                            'disabled');
                        calendarEl.getElementsByClassName('fc-edit-button')[0].removeAttribute('disabled');
                    },

                    // Drag & Drop Behaviour
                    editable: true,

                    eventDrop: function (info) {
                        if (!confirm('Konfirmasi perubahan?')) {
                                info.revert();
                            } else {
                                    var start = info.event.start.toISOString().split("T")[0];
                                    console.log("Start : "+start);
                                    var end = info.event.end.toISOString().split("T")[0];
                                    start = end;
                                    end = "".concat(end.split("-")[0],"-",end.split("-")[1],"-",(parseInt(end.split("-")[2])+1).toString());
                                    console.log("End : "+end);
                                    $.ajax({
                                        url:"/schedule/edit",
                                        type:"PATCH",
                                        data:{
                                            'id':info.event.id,
                                            'title':info.event.title,
                                            'start':start,
                                            'end':end
                                        },
                                        dataType:'json',
                                        success : function(data){
                                            console.log(data.message);
                                        }
                                    });
                            }
                    },

                    eventResize: function (info) {
                        if (!confirm('Konfirmasi perubahan?')) {
                                info.revert();
                            } else {
                                    var start = info.event.start.toISOString().split("T")[0];
                                    start = "".concat(start.split("-")[0],"-",start.split("-")[1],"-",(parseInt(start.split("-")[2])+1).toString());
                                    var end = info.event.end.toISOString().split("T")[0];
                                    end = "".concat(end.split("-")[0],"-",end.split("-")[1],"-",(parseInt(end.split("-")[2])+1).toString());
                                    $.ajax({
                                        url:"/schedule/edit",
                                        type:"PATCH",
                                        data:{
                                            'id':info.event.id,
                                            'title':info.event.title,
                                            'start':start,
                                            'end':end
                                        },
                                        dataType:'json',
                                        success : function(data){
                                            console.log(data.message);
                                        }
                                    });
                            }
                    },
                    
                    events: data
                });
                calendar.render();
                calendarEl.getElementsByClassName('fc-add-button')[0].setAttribute('disabled', '');
                calendarEl.getElementsByClassName('fc-remove-button')[0].setAttribute('disabled', '');
                calendarEl.getElementsByClassName('fc-edit-button')[0].setAttribute('disabled', '');
            }
        });
        
    });

</script>
@endsection

@section('mainContent')

<div class="row h-auto">
    
    <div class="col">
        <div class="row">
            <div class="col m-3">
                <a href="/user" >
                    <h1>
                        <i class="fas fa-arrow-left"></i>
                    </h1>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col p-5"><div id="calendar" class="bg-light p-4 rounded"></div></div>
            <div class="col-1"></div>
        </div>
    </div>
</div>
@endsection
