@extends('admin.layouts.main')

@section('users', 'active')
@section('title', 'Digital Marketing Service')

@section('header')
<i class="fa fa-users mr-2" aria-hidden="true"></i>&nbsp;List Users
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">
 {{ Session('success')}}
</div>
@endif


<div class="row mt-4">
    
    <div class="col col-md-11 offset-1">
        <form action="" method="GET">
            <div class="input-group col-md-3 mb-2" style="margin-left: -14px;">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" name="query" value="{{ @$_GET['query'] }}">
            </div>
        </form>
        @if (count($users) > 0)
            <table border="2" class="table table-striped table-hover table-responsive text-center">
                <thead class="bg-dark text-light fw-bold">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Username Medsos</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th>No Handphone</th>
                        <th colspan="4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>
                            <input style="background: none; border: 0.5 solid; margin-top: 10px;" type="text" name="socmed" onfocus="setId({{ $user->id }})" value="{{ $user->socmed }}" id="socmed">
                        </td>
                        <td>
                            <input style="background: none; border: 0.5 solid; margin-top: 10px;" type="text" name="website" onfocus="setId({{ $user->id }})" value="{{ $user->website }}" id="website">
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_handphone }}</td>
                        <td>
                            <a href="{{ url('/product',$user->id) }}" class="btn btn-success"> <i class="fa fa-shopping-bag" aria-hidden="true"></i>Product</a>
                        </td>
                        <td>
                            
                            <a href="{{ url('/schedule',$user->id) }}" class="btn btn-primary"> <i class="fa fa-calendar" aria-hidden="true"></i>Schedule</a>
                        </td>
                        <td>
                            
                            <a href="{{ url('/profile',$user->id) }}" class="btn btn-danger"> <i class="fa fa-building" aria-hidden="true"></i>Company Profile</a>
                        </td>
                        <td>
                            <a href="{{ url('/admin/invoice?query=' . $user->name) }}" class="btn btn-secondary"><i class="fa fa-clipboard" aria-hidden="true"></i> Invoice</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
        <table class="table table-striped table-hover text-center table-bordered">
            <thead class="bg-dark text-light fw-bold">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Username Medsos</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="6">
                        <h5>No Data</h5>
                    </td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
    <div class="col-2">{{-- Offset --}}</div>
</div>
<script>
    var idUser;
    function setId(id){
        idUser = id;
    }

    $("#socmed").on('keypress', function(e){
        if(e.keyCode == 13){
            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('id', idUser);
            data.append('socmed', $(this).val());
            console.log(data);
            $.ajax({
                url:"{{ route('update-socmed') }}",
                type:"POST",
                data:data,
                processData: false,
                contentType: false,
                success: function(data){
                    Swal.fire(
                        data.title,
                        data.message,
                        data.status
                    );
                }
            })
        }
    });

    $("#website").on('keypress', function(e){
        if(e.keyCode == 13){
            var data = new FormData();
            data.append('_token', "{{ csrf_token() }}");
            data.append('id', idUser);
            data.append('website', $(this).val());
            console.log(data);
            $.ajax({
                url:"{{ route('update-website') }}",
                type:"POST",
                data:data,
                processData: false,
                contentType: false,
                success: function(data){
                    Swal.fire(
                        data.title,
                        data.message,
                        data.status
                    );
                }
            })
        }
    });

</script>
@endsection
