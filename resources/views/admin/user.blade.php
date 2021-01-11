@extends('admin.layouts.main')

@section('users', 'active')
@section('title', 'Digital Marketing Service')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Users
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success" role="alert">
 {{ Session('success')}}
</div>
@endif


<div class="row mt-5">
    
    <div class="col offset-1 mr-5">
        <form action="" method="GET">
            <div class="input-group col-md-3 mb-2" style="margin-left: -14px;">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" name="query" value="{{ @$_GET['query'] }}">
            </div>
        </form>
            <table border="2" class="centered table table-striped table-hover table-responsive">
                <thead class="bg-dark text-light fw-bold">
                    <tr>
                        <td>No</td>
                        <td>Name</td>
                        <td>Username Medsos</td>
                        <td>Role</td>
                        <td>Email</td>
                        <td>No Handphone</td>
                        <td colspan="3" style="width: 50%">Action</td>
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
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->no_handphone }}</td>
                        <td>
                            <a href="{{ url('/product',$user->id) }}" class="btn btn-success"> <i class="fa fa-shopping-bag" aria-hidden="true"></i> Show Product</a>
                        </td>
                        <td>
                            
                            <a href="{{ url('/schedule',$user->id) }}" class="btn btn-primary"> <i class="fa fa-calendar" aria-hidden="true"></i> Show Schedule</a>
                        </td>
                        <td>
                            
                            <a href="{{ url('/profile',$user->id) }}" class="btn btn-danger"> <i class="fa fa-building" aria-hidden="true"></i> Show Company Profile</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
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

</script>
@endsection
