@extends('layouts.app_old')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('tiket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">Pilih Tiket</div>

                        <div class="card-body">
                            <h4>Tiket</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tiket_type">Tiket</label>
                                        <select class="form-select" aria-label="Default select example" required
                                            name="tiket_type" id="tiket_type">
                                            <option selected disabled>Pilih</option>
                                            <option value="Cat 1">Cat 1</option>
                                            <option value="Cat 2">Cat 2</option>
                                            <option value="Cat 3">Cat 3</option>
                                            <option value="VIP 1">VIP 1</option>
                                            <option value="VIP 2">VIP 2</option>
                                        </select>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <h4>Biodata Pembeli</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama"
                                            class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                            id="nama" placeholder="Nama Anda" value="{{ old('nama') }}" required>
                                        @error('nama')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik"
                                            class="form-control form-control-sm @error('nik') is-invalid @enderror"
                                            id="nik" placeholder="NIK Anda" value="{{ old('nik') }}" required>
                                        @error('nik')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Beli</button>
                        </div>
                    </div>
                </form>

                @if (session('pesan'))
                    <div class="card bg-success p-3 text-white m-5">
                        <div class="col-12">
                            Selamat! Pembelian Berhasil <br>
                            ID Tiket: <strong>{{ Session::get('pesan') }}</strong>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
