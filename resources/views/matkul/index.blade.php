@extends('layout')
@section('title','Matkul')
@section('judul','Matkul')
@section('isi')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Table Matkul</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">DataTables</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                <h3 class="card-title mb-0">Data Mahasiswa</h3>
                                <div class="ml-auto">
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#creatematkulModal">
                                        <i class="fa fa-plus"></i> Add Matkul
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Matkul</th>
                                            <th>Nama Matkul</th>
                                            <th>sks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($matkul as $mtkl)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mtkl['kode_matkul'] }}</td>
                                            <td>{{ $mtkl['nama_matkul'] }}</td>
                                            <td>{{ $mtkl['sks'] }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-toggle="modal" data-target="#editModal{{ $mtkl['kode_matkul'] }}"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{route('matkul.destroy', $mtkl['kode_matkul'])}}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-link btn-danger btn-lg" id="alert_demo_8">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- modal for edit -->
                                        <div class="modal fade" id="editModal{{ $mtkl['kode_matkul'] }}" tabindex="-1" aria-labelledby="editModalLabel{{ $mtkl['kode_matkul'] }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ ($mtkl['kode_matkul']) }}">Edit Mahasiswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('matkul.update', $mtkl['kode_matkul']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                             <div class="form-group">
                                                                <label for="kode_matkul">Kode Matkul</label>
                                                                <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="{{ $mtkl['kode_matkul'] }}" placeholder="Masukkan Kode Matkul">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_matkul">Nama Matkul</label>
                                                                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="{{ $mtkl['nama_matkul'] }}" placeholder="Masukkan Nama">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sks">SKS</label>
                                                                <input type="text" class="form-control" id="sks" name="sks" value="{{ $mtkl['sks'] }}" placeholder="Masukkan sks">
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                            </div>
                                                        </div>

                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>


<!-- modal for create -->
<div class="modal fade" id="creatematkulModal" tabindex="-1" aria-labelledby="creatematkulModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('matkul.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="creatematkulModalLabel">Tambah Matkul Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kode_matkul">Kode Matkul</label>
                        <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" placeholder="Masukkan Kode Matkul">
                    </div>
                    <div class="form-group">
                        <label for="nama_matkul">Nama Matkul</label>
                        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="sks">SKS</label>
                        <input type="text" class="form-control" id="sks" name="sks" placeholder="Masukkan SKS">
                    </div>
                   
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


@push('script')
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "excel", "pdf"],
            // Custom DOM to place search and buttons on the right
            "dom": '<"row"<"col-md-6"l><"col-md-6 d-flex justify-content-end align-items-center"fB>>rtip'
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endpush
@endsection