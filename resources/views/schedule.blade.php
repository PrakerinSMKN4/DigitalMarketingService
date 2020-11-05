<head>
    <title>Schedule</title>

    {{-- Plugin --}}
    <link rel="stylesheet" href="{{asset('/plugin/Bootstrap 4.4.1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugin/Font Awesome 4.7.0/css/font-awesome.min.css')}}">
    <script src="{{asset('/plugin/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('/plugin/Bootstrap 4.4.1/js/bootstrap.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('/plugin/fullcalendar/main.css')}}">
    <script src="{{asset('/plugin/fullCalendar/main.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                                            calendar.addEvent({
                                                id: id,
                                                title: eventName,
                                                start: tanggalAwal,
                                                end: tanggalAkhir,
                                                allday: true
                                            });
                                            tanggalAwal = '';
                                            tanggalAkhir = '';
                                            id++;
                                        } else {
                                            alert('Tidak ada tanggal yang dipilih');
                                        }
                                    }
                                },
                                remove: {
                                    click: function () {
                                        if (selId != '') {
                                            var selectedEvent = calendar.getEventById(selId);
                                            selectedEvent.remove();
                                            alert('Anda menghapus Event "' + selectedEvent.title + '"');
                                            selId = '';
                                        }
                                        else {
                                            alert('Tidak ada event yang dipilih');
                                        }
                                    }
                                },
                                edit: {
                                    click: function () {
                                        if(selId != '') {
                                            var eventName = prompt('Edit Event');
                                            var selectedEvent = calendar.getEventById(selId);
                                            selectedEvent.setProp('title', eventName);
                                            selId = '';
                                        }
                                        else {
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
                            },

                            eventClick: function (info) {
                                selId = info.event.id;
                            },

                            // Drag & Drop Behaviour
                            editable: true,

                            eventDrop: function (info) {
                                if(!confirm('Konfirmasi perubahan?')) {
                                    info.revert();
                                }
                                else {
                                    alert('Nama : ' + info.event.title + "\nMulai : " + info.event.start.toISOString() + "\nSelesai : " + info.event.end.toISOString());
                                }
                            },

                            eventResize: function (info) {
                                if(!confirm('Konfirmasi perubahan?')) {
                                    info.revert();
                                }
                                else {
                                    alert('Nama : ' + info.event.title + "\nMulai : " + info.event.start.toISOString() + "\nSelesai : " + info.event.end.toISOString());
                                }
                            }
                        }); calendar.render();
                    });

    </script>
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
</head>

<body>
    <div class="row h-100 w-100 m-0">

        {{-- Content --}}
        <div class="col" style="background: #DFD9D9;">

            {{-- Search and Header --}}
            <div class="row align-items-center mt-3">
                {{-- Header --}}
                <div class="col-3 offset-1" style="text-align: center;">
                    <h4 class="m-0" style="font-size: 20pt; color: #7c7c7c;"><i class="fa fa-calendar mr-2"
                            aria-hidden="true"></i>&nbsp;Schedule</h4>
                </div>

                {{-- Search --}}
                <form action="#" method="POST" class="col-7 m-0">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fa fa-search" aria-hidden="true"></i></div>
                        </div>
                        <input type="text" class="form-control" name="#" placeholder="Search">
                    </div>
                </form>
            </div>

            <div class="row mt-3 p-3">
                <div class="col offset-1 p-3" style="z-index: 0; background-color: #f7f7f7;">
                    <div id="calendar"></div>
                </div>
                <div class="col-1">{{-- Offset --}}</div>
            </div>
        </div>

        {{-- Side Bar --}}
        <div class="row h-100" style="position: fixed;">
            <div id="sideBar" class="col-auto">
                {{-- Logo Perusahaan --}}
                <div class="row mb-5">
                    <div class="col m-3"><img src="" alt="" sizes="" srcset=""></div>
                </div>

                {{-- Menu Menu --}}
                {{-- Dashboard --}}
                <a href="{{route('dashboard')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Dashboard</div>
                    </div>
                </a>

                {{-- Social Media Monitoring --}}
                <a href="{{route('monitoring')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-pie-chart fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Social Media Monitoring</div>
                    </div>
                </a>

                {{-- Company Profile --}}
                <a href="{{route('profile')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-id-card fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Company Profile</div>
                    </div>
                </a>

                {{-- Menu Setting --}}
                <a href="{{route('setting')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-clipboard fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Menu Setting</div>
                    </div>
                </a>

                {{-- Connected Social Media --}}
                <a href="{{route('connection')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Connected Social Media</div>
                    </div>
                </a>

                {{-- Schedule --}}
                <a href="{{route('schedule')}}" class="sidebar-link active">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-calendar fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Schedule</div>
                    </div>
                </a>

                {{-- Sign Out --}}
                <form id="logout" method="POST" action="{{route('logout')}}" class="m-0">@csrf</form>
                <a onclick="logout()" href="{{route('logout')}}" class="sidebar-link">
                    <div class="row">
                        <div class="col-1 m-3"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></div>
                        <div class="col align-self-center side-text">Sign Out</div>
                    </div>
                </a>
            </div>
            <div id="toggle-button" class="col p-0 align-self-center" onclick="openNav()"></div>
        </div>
    </div>
</body>
<script src="{{asset('/js/index.js')}}"></script>
