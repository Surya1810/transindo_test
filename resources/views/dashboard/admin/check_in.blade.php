@extends('layouts.app')

@section('title')
    | Check-in
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Check-in</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Check-in</li>
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
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Check-in</h3>
                        </div>
                        <form action="{{ route('checked') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- <div class="form-group">
                                        <label for="id_tiket">ID Tiket</label>
                                        <input type="text" name="id_tiket" class="form-control form-control-sm"
                                            id="id_tiket" placeholder="ID tiket" value="{{ $beasiswa->id_tiket }}"
                                            required>
                                    </div> --}}
                                <div class="form-group">
                                    <label for="id_tiket">ID Tiket</label>
                                    <input type="text" name="id_tiket" class="form-control form-control-sm"
                                        id="id_tiket" placeholder="ID tiket" value="{{ old('id_tiket') }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary float-md-right">Cek</button>
                            </div>
                        </form>
                    </div>

                    @isset($hasil)
                        @if ($hasil == 'kosong')
                            <div class="card bg-warning">
                                <h5 class="card-title m-3">Data Tidak Valid</h5>
                            </div>
                        @endif
                    @endisset
                    @isset($hasil->status)
                        @if ($hasil->status == 'belum masuk')
                            <div class="card bg-success">
                                <div class="card-body">
                                    <h3 class="card-title m-3">Data Valid <strong>{{ $hasil->nama }} / {{ $hasil->nik }} |
                                            {{ $hasil->tiket_type }}</strong></h3><br>
                                </div>
                            </div>
                            <a href="{{ route('pemesanan.masuk', $hasil->id) }}" class="btn btn-warning">Masuk</a>
                        @elseif ($hasil->status == 'masuk')
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <h5 class="card-title m-3">Tiket tidak bisa digunakan kembali</h5>
                                </div>
                            </div>
                        @else
                            <div class="card bg-danger">
                                <div class="card-body">
                                    <h5 class="card-title m-3">Data tidak ditemukan</h5>
                                </div>
                            </div>
                        @endif
                    @endisset
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/jszip/jszip.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.js') }}"></script>
    <!-- date-range-picker -->
    <script src="{{ asset('assets/adminLTE/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>

    <script type="text/javascript"></script>
@endpush
