@extends('layouts.dashboard')

@section('title', 'DIMAS - Schedule')

@section('schedule', 'active');

@section('content')
    <div class="row">
        <div class="col m-3">
            {{-- Header --}}
            <div class="row">
                <div class="col-auto align-self-center p-3">
                    @if ($data->prev_page)
                    <a href="/schedule-detail/{{ @$data->prev_page }}" class="{{ !isset($data->prev_page) ? 'text-muted' : '' }}">
                        <h5><i class="fa fa-arrow-left mr-2" aria-hidden="true"></i><span>Prev</span></h5>
                    </a>
                    @endif
                </div>
                <div class="col text-center p-3"><h3>Friday, 1st January 2021</h3></div>
                <div class="col-auto align-self-center p-3">
                    @if ($data->next_page)
                    <a href="/schedule-detail/{{ @$data->next_page }}" class="{{ !isset($data->next_page) ? 'text-muted' : '' }}">
                        <h5><span>Next</span><i class="fa fa-arrow-right ml-2" aria-hidden="true"></i></h5>
                    </a>
                    @endif
                </div>
            </div>
            
            {{-- Schedule Detail --}}
            <div class="row">
                <div class="col-md p-3">
                    <h5>Schedule Detail :</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Title</td>
                                <td>:</td>
                                <td>{{ $data->title }}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Username</td>
                                <td>:</td>
                                <td>{{ @Auth::user()->socmed }}</td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td>:</td>
                                <td>{{ $data->tanggal }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Image & Caption --}}
            <div class="row">
                {{-- Image --}}
                <div class="col-md p-3">
                    <h5>Image Preview :</h5>
                    @if ($data->gambar)
                        <img src="{{ Storage::url($data->gambar) }}" class="img-fluid">
                    @else
                        <p>No Image Yet!</p>
                    @endif
                </div>
                {{-- Caption --}}
                <div class="col-md p-3">
                    <div class="form-group">
                      <h5>Description :</h5>
                      <textarea class="form-control bg-white" readonly>{{ $data->deskripsi }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection