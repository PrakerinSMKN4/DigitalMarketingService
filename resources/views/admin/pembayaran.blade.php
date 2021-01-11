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
<div class="row mt-3">

</div>

<div class="row mt-1 p-2">
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
            <table class="col table table-striped table-hover table-bordered text-center">
                <thead class="bg-dark text-light fw-bold">
                    <tr>
                        <th>No</th>
                        <th>Action</th>
                        <th>Pemohon</th>
                        <th>Jenis Paket</th>
                        <th>Keterangan Paket</th>
                        <th>Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Jenis Pembayaran</th>
                        <th>Tanggal Dibuat</th>
                    </tr>
                </thead>
                @if (count($requests) > 0)
                    
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
                @else
                <tr>
                    <td colspan="9">
                        <h5>No Data</h5>
                    </td>
                </tr>
                @endif
            </table>
    </div>
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
