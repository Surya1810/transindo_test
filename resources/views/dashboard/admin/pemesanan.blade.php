@extends('layouts.app')

@section('title')
    | Pemesanan
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/toastr/toastr.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pemesanan</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pemesanan</li>
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
                        <div class="card-header border-0">
                            <a href="{{ route('dashboard') }}" class="btn-sm btn-secondary"><i
                                    class="fa-solid fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="PemesananTable" class="table table-bordered text-sm">
                                <thead class="table-dark text-nowrap">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>ID Tiket</th>
                                        <th>Tipe Tiket</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $key => $data)
                                        <tr class="text-center text-nowrap">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $data->nama }}</td>
                                            <td>{{ $data->nik }}</td>
                                            <td>{{ $data->id_tiket }}</td>
                                            <td>{{ $data->tiket_type }}</td>
                                            <td>
                                                @if ($data->status == 'dihapus')
                                                    <span class="badge badge-danger">{{ $data->status }}</span>
                                                @elseif ($data->status == 'belum masuk')
                                                    <span class="badge badge-warning">{{ $data->status }}</span>
                                                @else
                                                    <span class="badge badge-success">{{ $data->status }}</span>
                                                @endif
                                            <td>
                                                <a href="{{ route('pemesanan.edit', $data->id) }}"
                                                    class="btn text-danger"><i class="fas fa-pencil"></i>
                                                    Edit</a>
                                                <button class="btn text-danger"
                                                    onclick="deleteData({{ $data->id }})"><i class="fas fa-trash"></i>
                                                    Delete</button>
                                                <form id="delete-form-{{ $data->id }}"
                                                    action="{{ route('pemesanan.delete', $data->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    <script type="text/javascript">
        $('#PemesananTable').DataTable({
            "language": {
                "infoFiltered": "",
                "decimal": "",
                "emptyTable": "Tak ada data yang tersedia pada tabel ini",
                "info": "Tampil _START_ sampai _END_ dari _TOTAL_ data",
                "infoEmpty": "Tampil 0 sampai 0 dari 0 baris",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ baris",
                "loadingRecords": "memuat...",
                "processing": "",
                "search": "Pencarian:",
                "zeroRecords": "Tidak ada catatan yang cocok ditemukan",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
                "aria": {
                    "sortAscending": ": aktifkan untuk mengurutkan kolom naik",
                    "sortDescending": ": aktifkan untuk mengurutkan kolom menurun"
                }
            },
            "paging": true,
            'processing': true,
            "searching": true,
            "ordering": true,
            "info": true,
        }).buttons().container().appendTo('#PemesananTable_wrapper .col-md-6:eq(0)');

        function deleteData(id) {
            Swal.fire({
                title: 'Anda Yakin?',
                text: "Bila sudah dihapus, data tidak dapat kembali!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !',
                        'error'
                    )
                }
            })
        }

        @if (session('pesan'))
            @switch(session('level-alert'))
                @case('alert-success')
                toastr.success("{{ Session::get('pesan') }}", 'Berhasil');
                @break

                @default
                toastr.info('test', 'info');
            @endswitch
        @endif
    </script>
@endpush
