@extends('layouts.master')

@section('title')
    Dashboard | Edit Data Siswa
@endsection

@section('sidebar')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin/dashboard/home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/admin/dashboard/home') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabAdmin"
            aria-expanded="true" aria-controls="tabAdmin">
            <i class="fas fa-users-cog"></i>
            <span>Halaman Admin</span>
        </a>
        <div id="tabAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Admin</h6>
                <a class="collapse-item" href="{{ route('add.admin') }}">Create</a>
                <a class="collapse-item active" href="{{ route('table.admin.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabTeacher"
            aria-expanded="true" aria-controls="tabTeacher">
            <i class="fas fa-chalkboard-teacher"></i>
            <span>Halaman Guru</span>
        </a>
        <div id="tabTeacher" class="collapse" aria-labelledby="headingTeacher" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Guru</h6>
                <a class="collapse-item" href="{{ route('add.teacher') }}">Create</a>
                <a class="collapse-item active" href="{{ route('table.teacher.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabStudent"
            aria-expanded="true" aria-controls="tabStudent">
            <i class="fas fa-user-graduate"></i>
            <span>Halaman Siswa</span>
        </a>
        <div id="tabStudent" class="collapse" aria-labelledby="headingStudent" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Siswa</h6>
                <a class="collapse-item active" href="{{ route('add.student') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.student.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMajor"
            aria-expanded="true" aria-controls="tabMajor">
            <i class="fas fa-place-of-worship"></i>
            <span>Halaman Jurusan</span>
        </a>
        <div id="tabMajor" class="collapse" aria-labelledby="headingMajor" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Jurusan</h6>
                <a class="collapse-item active" href="{{ route('add.major') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.major.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabClass"
            aria-expanded="true" aria-controls="tabClass">
            <i class="fas fa-hourglass-half"></i>
            <span>Halaman Kelas</span>
        </a>
        <div id="tabClass" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Kelas</h6>
                <a class="collapse-item" href="{{ route('add.class') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.class.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMapel"
            aria-expanded="true" aria-controls="tabMapel">
            <i class="fas fa-book"></i>
            <span>Halaman Mapel</span>
        </a>
        <div id="tabMapel" class="collapse" aria-labelledby="headingMapel" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Mata Pelajaran</h6>
                <a class="collapse-item" href="{{ route('add.lesson') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.lesson.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabJadwal"
            aria-expanded="true" aria-controls="tabJadwal">
            <i class="fas fa-book"></i>
            <span>Hal Jadwal Pelajaran</span>
        </a>
        <div id="tabJadwal" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Jadwal Pelajaran</h6>
                <a class="collapse-item" href="{{ route('add.jadwal') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.jadwal.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabMateri"
            aria-expanded="true" aria-controls="tabMateri">
            <i class="fas fa-book"></i>
            <span>Halaman Materi</span>
        </a>
        <div id="tabMateri" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Materi</h6>
                <a class="collapse-item" href="{{ route('add.materi') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.materi.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRpp"
            aria-expanded="true" aria-controls="tabRpp">
            <i class="fas fa-book"></i>
            <span>Halaman RPP</span>
        </a>
        <div id="tabRpp" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola RPP</h6>
                <a class="collapse-item" href="{{ route('add.rpp') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.rpp.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabRapot"
            aria-expanded="true" aria-controls="tabRapot">
            <i class="fas fa-book"></i>
            <span>Halaman Rapot</span>
        </a>
        <div id="tabRapot" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Rapot</h6>
                <a class="collapse-item" href="{{ route('add.rapot') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.rapot.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabEskul"
            aria-expanded="true" aria-controls="tabEskul">
            <i class="fas fa-book"></i>
            <span>Halaman Ekstrakulikuler</span>
        </a>
        <div id="tabEskul" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Ekstrakulikuler</h6>
                <a class="collapse-item" href="{{ route('add.ekskul') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.ekskul.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabInfo"
            aria-expanded="true" aria-controls="tabInfo">
            <i class="fas fa-info-circle"></i>
            <span>Halaman Informasi</span>
        </a>
        <div id="tabInfo" class="collapse" aria-labelledby="headingInfo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Informasi</h6>
                <a class="collapse-item" href="{{ route('add.info') }}">Create</a>
                <a class="collapse-item" href="{{ route('table.info.list') }}">Table</a>
            </div>
        </div>
    </li>
@endsection


@section('content')
<div class="col-12">
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
</div>

<a href="{{ route('table.teacher.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Edit Data Siswa</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.student', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Siswa</h1>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS <span class="text-danger">*</span></label>
                                <input name="nis" type="text" class="form-control @error('nis') is-invalid @enderror" value="{{ old('nis') ?? $student->nis }}" id="nis" placeholder="Input NIS">
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nisn">NISN <span class="text-danger">*</span></label>
                                <input name="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" value="{{ old('nisn') ?? $student->nisn }}" id="nisn" placeholder="Input NISN">
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nisn') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') ?? $student->nama }}" id="nama" placeholder="Input Nama">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 1 <span class="text-danger">*</span></label>
                                <input name="alamat_1" type="text" class="form-control @error('alamat_1') is-invalid @enderror" value="{{ old('alamat_1') ?? $student->alamat_1 }}" id="alamat_1" placeholder="Input Alamat 1">
                                @error('alamat_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_1') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 2 <span class="text-danger">*</span></label>
                                <input name="alamat_2" type="text" class="form-control @error('alamat_2') is-invalid @enderror" value="{{ old('alamat_2') ?? $student->alamat_2 }}" id="alamat_2" placeholder="Input Alamat 2">
                                @error('alamat_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_2') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabkota">Kabupaten/Kota <span class="text-danger">*</span></label>
                                <input name="kabkota" type="text" class="form-control @error('kabkota') is-invalid @enderror" value="{{ old('kabkota') ?? $student->kabkota }}" id="kabkota" placeholder="Input Kota/Kab">
                                @error('kabkota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kabkota') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi <span class="text-danger">*</span></label>
                                <input name="provinsi" type="text" class="form-control @error('provinsi') is-invalid @enderror" value="{{ old('provinsi') ?? $student->provinsi }}" id="provinsi" placeholder="Input Provinsi">
                                @error('provinsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('provinsi') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                <input name="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') ?? $student->tempat_lahir }}" id="tempat_lahir" placeholder="Input Tempat Lahir">
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tempat_lahir') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input name="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') ?? $student->tanggal_lahir }}" id="tanggal_lahir">
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tanggal_lahir') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                <input name="jenis_kelamin" type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin') ?? $student->jenis_kelamin  }}" id="jenis_kelamin" placeholder="Input Jenis Kelamin">
                                @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agama">Agama <span class="text-danger">*</span></label>
                                <input name="agama" type="text" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') ?? $student->agama }}" id="agama" placeholder="Input Agama">
                                @error('agama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('agama') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_dalam_keluarga">Status Dalam Keluarga <span class="text-danger">*</span></label>
                                <input name="status_dalam_keluarga" type="text" class="form-control @error('status_dalam_keluarga') is-invalid @enderror" value="{{ old('status_dalam_keluarga') ?? $student->status_dalam_keluarga }}" id="status_dalam_keluarga" placeholder="Input Status Dalam Keluarga">
                                @error('status_dalam_keluarga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status_dalam_keluarga') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="anak_ke">Anak Ke <span class="text-danger">*</span></label>
                                <input name="anak_ke" type="text" class="form-control @error('anak_ke') is-invalid @enderror" value="{{ old('anak_ke') ?? $student->anak_ke }}" id="anak_ke" placeholder="Input Anak Ke">
                                @error('anak_ke')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('anak_ke') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="diterima_dikelas">Diterima di Kelas <span class="text-danger">*</span></label>
                                <input name="diterima_dikelas" type="text" class="form-control @error('diterima_dikelas') is-invalid @enderror" value="{{ old('diterima_dikelas') ?? $student->diterima_dikelas }}" id="diterima_dikelas" placeholder="Input Diterima di Kelas">
                                @error('diterima_dikelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('diterima_dikelas') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pada_tanggal">Pada Tanggal <span class="text-danger">*</span></label>
                                <input name="pada_tanggal" type="date" class="form-control @error('pada_tanggal') is-invalid @enderror" value="{{ old('pada_tanggal') ?? $student->pada_tanggal }}" id="pada_tanggal">
                                @error('pada_tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pada_tanggal') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No HP <span class="text-danger">*</span></label>
                                <input name="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp') ?? $student->no_hp }}" id="no_hp" placeholder="Input No HP Siswa">
                                @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <h2>Orang Tua</h2>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                                <input name="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ old('nama_ayah') ?? $student->nama_ayah }}" id="nama_ayah" placeholder="Input Nama Ayah">
                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_ayah') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu <span class="text-danger">*</span></label>
                                <input name="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ old('nama_ibu') ?? $student->nama_ibu }}" id="nama_ibu" placeholder="Input Nama Ibu">
                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_ibu') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_rumah">No Telp Rumah </label>
                                <input name="nohp_rumah" type="text" class="form-control @error('nohp_rumah') is-invalid @enderror" value="{{ old('nohp_rumah') ?? $student->nohp_rumah }}" id="nohp_rumah" placeholder="Input No Telp Rumah">
                                @error('nohp_rumah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nohp_rumah') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                <input name="pekerjaan_ayah" type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" value="{{ old('pekerjaan_ayah') ?? $student->pekerjaan_ayah }}" id="pekerjaan_ayah" placeholder="Input Pekerjaan Ayah">
                                @error('pekerjaan_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pekerjaan_ayah') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                <input name="pekerjaan_ibu" type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" value="{{ old('pekerjaan_ibu') ?? $student->pekerjaan_ibu }}" id="pekerjaan_ibu" placeholder="Input Pekerjaan Ibu">
                                @error('pekerjaan_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pekerjaan_ibu') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Ortu <span class="text-danger">*</span></label>
                                <input name="alamat_ortu" type="text" class="form-control @error('alamat_ortu') is-invalid @enderror" value="{{ old('alamat_ortu') ?? $student->alamat_ortu }}" id="alamat_ortu" placeholder="Input Alamat Ortu">
                                @error('alamat_ortu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_ortu') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <h1>Wali</h1>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input name="nama_wali" type="text" class="form-control @error('nama_wali') is-invalid @enderror" value="{{ old('nama_wali') ?? $student->nama_wali }}" id="nama_wali" placeholder="Input Nama Wali">
                                @error('nama_wali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_wali') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_wali">Alamat Wali</label>
                                <input name="alamat_wali" type="text" class="form-control @error('alamat_wali') is-invalid @enderror" value="{{ old('alamat_wali') ?? $student->alamat_wali }}" id="alamat_wali" placeholder="Input Alamat Wali">
                                @error('alamat_wali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat_wali') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_wali">No HP Wali</label>
                                <input name="nohp_wali" type="text" class="form-control @error('nohp_wali') is-invalid @enderror" value="{{ old('nohp_wali') ?? $student->nohp_wali }}" id="nohp_wali" placeholder="Input No HP Wali">
                                @error('nohp_wali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nohp_wali') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input name="pekerjaan_wali" type="text" class="form-control @error('pekerjaan_wali') is-invalid @enderror" value="{{ old('pekerjaan_wali') ?? $student->pekerjaan_wali }}" id="pekerjaan_wali" placeholder="Input Pekerjaan Wali">
                                @error('pekerjaan_wali')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pekerjaan_wali') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8 offset"></div>
                    </div>
                    <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
                        <div class="col-md-12">
                            <h2>Akun</h2>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') ?? $student->user->email }}" id="email" placeholder="Input Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="w-100">Mau Ganti Password?</label>
                                <a href="{{ route('edit.password.student', $student->id) }}" class="btn btn-primary w-100">Klik button ini!</a>
                            </div>
                        </div>
                        <div class="col-md-4 offset"></div>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Submit</button>
                </form>
            </div>
		</div>
	</div>
</div>
@endsection
