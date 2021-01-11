@extends('admin.layouts.main')

@section('title', 'List Invoice')

@section('header')
<i class="fa fa-clipboard mr-2" aria-hidden="true"></i>&nbsp;Laporan Invoice
@endsection

@section('invoice', 'active')

@section('content')
{{-- Add Menu --}}
<div class="row mt-3">

</div>
<div class="row mt-1 p-2">
    <div class="col offset-1">
        <form action="" method="GET">
            <div class="input-group col-md-3 mb-2" style="margin-left: -14px;">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                <input type="text" class="form-control" placeholder="Search..." aria-label="Username" aria-describedby="basic-addon1" name="query" value="{{ @$_GET['query'] }}">
            </div>
        </form>
        <table class="table table-hover table-striped table-bordered text-center">
            <thead class="bg-dark text-light">
                <tr>
                    <th>No</th>
                    <th>NO. Invoice</th>
                    <th>Nama Pemohon</th>
                    <th>Tanggal Permohonan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($invoices) > 0)
                
                @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $invoice->no_invoice }}</td>
                    <td>{{ $invoice->name }}</td>
                    <td>{{ $invoice->created_at->format('d F Y') }}</td>
                    <td>
                        <a href="{{ url('/admin/invoice', $invoice->id)  }}">
                            <button class="btn btn-primary">
                                Lihat Detail
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5">
                        <h5>No Data</h5>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>    
    </div>
</div>
    
@endsection
