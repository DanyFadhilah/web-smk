@extends('layouts.master')

@section('title')
    Dashboard | Deatil Data Siswa
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

    <li class="nav-item ">
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

<a href="{{ route('table.student.list') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-edit"></i> Deatil Data Siswa <i class="fas fa-exchange-alt"></i> {{ $student->nama }}</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
                        <div class="col-md-12">
                            <h1>Siswa</h1>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" value="{{ $student->nis }}" id="nis" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" value="{{ $student->nisn }}" id="nisn" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="{{ $student->nama }}" id="nama" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_1">Alamat 1</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_1 }}" id="alamat_1" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_2">Alamat 2</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_2 }}" id="alamat_2" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kabkota">Kabupaten/Kota</label>
                                <input type="text" class="form-control" value="{{ $student->kabkota }}" id="kabkota" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="provinsi">Provinsi</label>
                                <input type="text" class="form-control" value="{{ $student->provinsi }}" id="provinsi" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" value="{{ $student->tempat_lahir }}" id="tempat_lahir" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{ $student->tanggal_lahir }}" id="tanggal_lahir" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <input type="text" class="form-control" value="{{ $student->jenis_kelamin  }}" id="jenis_kelamin" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input name="agama" type="text" class="form-control" value="{{ $student->agama }}" id="agama" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="status_dalam_keluarga">Status Dalam Keluarga</label>
                                <input name="status_dalam_keluarga" type="text" class="form-control" value="{{ $student->status_dalam_keluarga }}" id="status_dalam_keluarga" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="anak_ke">Anak Ke</label>
                                <input type="text" class="form-control" value="{{ $student->anak_ke }}" id="anak_ke" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="diterima_dikelas">Diterima di Kelas</label>
                                <input type="text" class="form-control" value="{{ $student->diterima_dikelas }}" id="diterima_dikelas" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pada_tanggal">Pada Tanggal</label>
                                <input type="date" class="form-control" value="{{ $student->pada_tanggal }}" id="pada_tanggal" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" class="form-control" value="{{ $student->no_hp }}" id="no_hp" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <h2>Orang Tua</h2>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" value="{{ $student->nama_ayah }}" id="nama_ayah" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" value="{{ $student->nama_ibu }}" id="nama_ibu" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_rumah">No Telp Rumah </label>
                                <input type="text" class="form-control" value="{{ $student->nohp_rumah }}" id="nohp_rumah" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" value="{{ $student->pekerjaan_ayah }}" id="pekerjaan_ayah" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" value="{{ $student->pekerjaan_ibu }}" id="pekerjaan_ibu" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_ortu">Alamat Ortu</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_ortu }}" id="alamat_ortu" readonly>
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
                                <input type="text" class="form-control" value="{{ $student->nama_wali }}" id="nama_wali" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat_wali">Alamat Wali</label>
                                <input type="text" class="form-control" value="{{ $student->alamat_wali }}" id="alamat_wali" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nohp_wali">No HP Wali</label>
                                <input type="text" class="form-control" value="{{ $student->nohp_wali }}" id="nohp_wali" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pekerjaan_wali">Pekerjaan Wali</label>
                                <input type="text" class="form-control" value="{{ $student->pekerjaan_wali }}" id="pekerjaan_wali" readonly>
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
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="{{ $student->user->email }}" id="email" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="w-100">Mau Ganti Password?</label>
                                <a href="{{ route('edit.password.student', $student->id) }}" class="btn btn-primary w-100">Klik button ini!</a>
                            </div>
                        </div>
                        <div class="col-md-4 offset"></div>
                    </div>
	</div>
</div>
@endsection
