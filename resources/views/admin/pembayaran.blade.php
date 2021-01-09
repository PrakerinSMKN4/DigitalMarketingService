@extends('admin.layouts.main')
@section('request', 'active')

@section('title', 'Pembayaran')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Requests
@endsection

@section('content')

{{-- @if (session('success'))
<div class="alert alert-success" role="alert">
 {{ Session('success')}}
</div>
@endif --}}

{{-- Add Menu --}}
<div class="row mt-4">

    <div class="col-1">{{-- Offset --}}</div>
</div>

<div class="row mt-1 p-3">
    <div class="col offset-1">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
         {{ Session('success')}}
        </div>
        @endif
        <form action="" method="GET">
            <div class="input-group col-md-3 mb-2" style="margin-left: -14px;">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" name="query" value="{{ @$_GET['query'] }}">
            </div>
        </form>
            <table class="col centered table table-striped table-hover table-bordered">
                <thead class="bg-dark text-light fw-bold">
                    <tr>
                        <td>No</td>
                        <td>Action</td>
                        <td>Pemohon</td>
                        <td>Jenis Paket</td>
                        <td>Keterangan Paket</td>
                        <td>Harga</td>
                        <td>Status Pembayaran</td>
                        <td>Jenis Pembayaran</td>
                        <td>Tanggal Dibuat</td>
                    </tr>
                </thead>
                @foreach ($requests as $request)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td id="action{{ $request->id }}">
                        @if ($request->status_pembayaran == 'pending')
                            <button class="btn btn-success" onclick="verifikasi({{ $request->id }})">
                                Verifikasi Pembayaran
                            </button>
                        @elseif($request->status_pembayaran == 'selesai')
                            <span class="btn btn-outline-success">Terverifikasi <i class="fa fa-check-circle" aria-hidden="true"></i></span>
                        @endif
                        
                    </td>
                    <td>{{ $request->name }}</td>
                    <td>{{ $request->paket }}</td>
                    <td>{{ $request->deskripsi }}</td>
                    <td>{{ "Rp." . number_format($request->harga,2,',','.') }}</td>
                    <td id="status{{ $request->id }}">
                        <span class=" {{ $request->status_pembayaran == 'selesai'? 'btn btn-outline-success btn-sm' : 'btn btn-outline-warning btn-sm' }}" >
                            {{ $request->status_pembayaran }}
                        </span>
                    </td>
                    <td>{{ $request->jenis_pembayaran }}</td>
                    <td>{{ $request->created_at->format('d F Y') }}</td>
                </tr>
                @endforeach
            </table>
    </div>
    <div class="col-1">{{-- Offset --}}</div>
</div>
<script>

    function verifikasi(id){
        console.log(id);
        Swal.fire({
            title: 'Yakin ingin memverifikasi?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Yakin`,
            denyButtonText: `Tidak`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                var form = new FormData();
                form.append("_token", "{{ csrf_token() }}");
                form.append("id", id);
                $.ajax({
                    url: "{{ route('verifikasi') }}",
                    processData: false,
                    contentType: false,
                    cache: false,
                    method: "POST",
                    data: form,
                    success: function(data){
                        $("#action" + id).html('<span class="btn btn-outline-success">Terverifikasi <i class="fa fa-check-circle" aria-hidden="true"></i></span>');
                        $("#status" + id).html('<span class="btn btn-outline-success">selesai</span>');
                        Swal.fire(
                        'Success',
                        data.message,
                        'success'
                    )
                    }
                });
            } else if (result.isDenied) {
                Swal.fire('Verifikasi dibatalkan!','','error');
            }
        });
        
    }
</script>
@endsection
