@extends('layouts.app')

@section('title')
    | Edit
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('pemesanan.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Edit</h3>
                            </div>
                            <div class="card-body">
                                <h4>Biodata Pembeli</h4>
                                <div class="row">
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama"
                                                class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                                id="nama" value="{{ $data->nama }}" required>
                                            @error('nama')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" name="nik"
                                                class="form-control form-control-sm @error('nik') is-invalid @enderror"
                                                id="nik" value="{{ $data->nik }}" required>
                                            @error('nik')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group">
                                            <label for="id_tiket">ID Tiket</label>
                                            <input type="text" name="id_tiket"
                                                class="form-control form-control-sm @error('id_tiket') is-invalid @enderror"
                                                id="id_tiket" value="{{ $data->id_tiket }}" required>
                                            @error('id_tiket')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
