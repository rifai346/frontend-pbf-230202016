@extends('layout')
@section('title','Mahasiswa')
@section('judul','Mahasiswa')
@section('isi')
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Table Mahasiswa</h1>
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
                                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#createmahasiswaModal">
                                        <i class="fa fa-plus"></i> Add Mahasiswa
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NPM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Email</th>
                                            <th>User Id</th>
                                            <th>Kode Kelas</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mahasiswa as $mhs)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mhs['npm'] }}</td>
                                            <td>{{ $mhs['nama_mahasiswa'] }}</td>
                                            <td>{{ $mhs['email'] }}</td>
                                            <td>{{ $mhs['id_user'] }}</td>
                                            <td>{{ $mhs['kode_kelas'] }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        data-toggle="modal" data-target="#editModal{{ $mhs['npm'] }}"
                                                        data-original-title="Edit Task">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{route('mahasiswa.destroy', $mhs['npm'])}}" method="POST" style="display:inline;">
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
                                        <div class="modal fade" id="editModal{{ $mhs['npm'] }}" tabindex="-1" aria-labelledby="editModalLabel{{ $mhs['npm'] }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ ($mhs['npm']) }}">Edit Mahasiswa</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('mahasiswa.update', $mhs['npm']) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                             <div class="form-group">
                                                                <label for="npm">NPM</label>
                                                                <input type="text" class="form-control" id="npm" name="npm" value="{{ $mhs['npm'] }}" placeholder="Masukkan NPM">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="nama_mahasiswa">Nama Mahasiswa</label>
                                                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mhs['nama_mahasiswa'] }}" placeholder="Masukkan Nama">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" class="form-control" id="email" name="email" value="{{ $mhs['email'] }}" placeholder="Masukkan Email">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="id_user">Id User</label>
                                                                <select class="form-control" id="id_user" name="id_user" required>
                                                                    <option value="" disabled selected>-- Pilih user --</option>
                                                                    @foreach ($user as $usr)
                                                                    <option value="{{ $usr['id_user'] }}">{{ $usr['username'] }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="kode_kelas">Kode Kelas</label>
                                                                <select class="form-control" id="kode_kelas" name="kode_kelas" required>
                                                                    <option value="" disabled selected>-- Pilih kelas --</option>
                                                                    @foreach ($kelas as $kls)
                                                                    <option value="{{ $kls['kode_kelas'] }}">{{ $kls['nama_kelas'] }}</option>
                                                                    @endforeach
                                                                </select>
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
<div class="modal fade" id="createmahasiswaModal" tabindex="-1" aria-labelledby="createmahasiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createmahasiswaModalLabel">Tambah Mahasiswa Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                    </div>
                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan Program Studi">
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan">
                    </div>
                    <div class="form-group">
                        <label for="wali_kelas_id">Id Wali Kelas</label>
                        <select class="form-control" id="dosen_wali_id" name="dosen_wali_id" required>
                            <option value="" disabled selected>-- Pilih wali kelas --</option>
                            @foreach ($dosen as $dsn)
                            <option value="{{ $dsn['nidn'] }}">{{ $dsn['nama'] }}</option>
                            @endforeach
                        </select>
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