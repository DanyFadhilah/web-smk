@extends('layouts.master')

@section('title')
    Dashboard | Home Admin
@endsection

@section('css')

@endsection

@section('sidebar')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
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
                <a class="collapse-item" href="{{ route('table.admin.list') }}">Table</a>
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
                <a class="collapse-item" href="{{ route('table.teacher.list') }}">Table</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tabStudent"
            aria-expanded="true" aria-controls="tabStudent">
            <i class="fas fa-user-graduate"></i>
            <span>Halaman Siswa</span>
        </a>
        <div id="tabStudent" class="collapse" aria-labelledby="headingStudent" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Kelola Siswa</h6>
                <a class="collapse-item" href="{{ route('add.student') }}">Create</a>
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
                <a class="collapse-item" href="{{ route('add.major') }}">Create</a>
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
        <div id="tabMapel" class="collapse" aria-labelledby="headingClass" data-parent="#accordionSidebar">
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

    <li class="nav-item active">
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

<a href="{{ url('/admin/dashboard/home') }}" class="btn btn-primary w-20">
    <i class="fas fa-long-arrow-alt-left"></i>
    Kembali
</a>

<div class="card shadow mt-4">
	<div class="card-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="panel-title"><i class="fas fa-user-plus"></i> Edit RPP</h3>
            </div>
        </div>
	</div>
	<div class="card-body">
		<div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.rapot', $rapot->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nis">NIS <span class="text-danger">*</span></label>
                                    <select name="nis" id="nis" class="form-control" required>
                                        <option value="{{ old('nis') ?? $rapot->nis }}">{{ old('nis') ?? $rapot->nis }}</option>   
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->nis }}">{{ $item->nis }}</option>   
                                        @endforeach
                                    </select>
                                </select>
                                @error('nis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="siswa">Nama Siswa <span class="text-danger">*</span></label>
                                    <select name="siswa" id="siswa" class="form-control" required>
                                        <option value="{{ old('siswa') ?? $rapot->siswa }}">{{ old('siswa') ?? $rapot->siswa }}</option>   
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>   
                                        @endforeach
                                    </select>
                                </select>
                                @error('siswa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('siswa') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas">Kelas <span class="text-danger">*</span></label>
                                    <select name="kelas" id="kelas" class="form-control" required>
                                        <option value="{{ old('kelas') ?? $rapot->kelas }}">{{ old('kelas') ?? $rapot->kelas }}</option>   
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->kelas }}">{{ $item->kelas }}</option>   
                                        @endforeach
                                    </select>
                                </select>
                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="akademik">Akademik <span class="text-danger">*</span></label>
                                    <input type="text" name="akademik" id="akademik" class="form-control" required @error('akademik') is-invalid @enderror value="{{ old('akademik') ?? $rapot->akademik }}" id="akademik">
                                    @error('akademik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('akademik') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>                            
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="integritas">Integritas <span class="text-danger">*</span></label>
                                    <input type="text" name="integritas" id="integritas" class="form-control" required @error('integritas') is-invalid @enderror value="{{ old('integritas') ?? $rapot->integritas }}" id="integritas">
                                    @error('integritas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('integritas') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="religius">Religius <span class="text-danger">*</span></label>
                                    <input type="text" name="religius" id="religius" class="form-control" required @error('religius') is-invalid @enderror value="{{ old('religius') ?? $rapot->religius }}" id="religius">
                                    @error('religius')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('religius') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nasionalis">Nasionalis <span class="text-danger">*</span></label>
                                    <input type="text" name="nasionalis" id="nasionalis" class="form-control" required @error('nasionalis') is-invalid @enderror value="{{ old('nasionalis') ?? $rapot->nasionalis }}" id="nasionalis">
                                    @error('nasionalis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nasionalis') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mandiri">Mandiri <span class="text-danger">*</span></label>
                                    <input type="text" name="mandiri" id="mandiri" class="form-control" required @error('mandiri') is-invalid @enderror value="{{ old('mandiri') ?? $rapot->mandiri }}" id="mandiri">
                                    @error('mandiri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mandiri') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gotong_royong">Gotong Royong <span class="text-danger">*</span></label>
                                    <input type="text" name="gotong_royong" id="gotong_royong" class="form-control" required @error('gotong_royong') is-invalid @enderror value="{{ old('gotong_royong') ?? $rapot->gotong_royong }}" id="gotong_royong">
                                    @error('gotong_royong')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gotong_royong') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="catatan">Catatan <span class="text-danger">*</span></label>
                                    <input type="text" name="catatan" id="catatan" class="form-control" required @error('catatan') is-invalid @enderror value="{{ old('catatan') ?? $rapot->catatan }}" id="catatan">
                                    @error('catatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('catatan') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mitra_pkl">Mitra PKL <span class="text-danger">*</span></label>
                                    <input type="text" name="mitra_pkl" id="mitra_pkl" class="form-control" required @error('mitra_pkl') is-invalid @enderror value="{{ old('mitra_pkl') ?? $rapot->mitra_pkl }}" id="mitra_pkl">
                                    @error('mitra_pkl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mitra_pkl') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lokasi"> Lokasi <span class="text-danger">*</span></label>
                                    <input type="text" name="lokasi" id="lokasi" class="form-control" required @error('lokasi') is-invalid @enderror value="{{ old('lokasi') ?? $rapot->lokasi }}" id="lokasi">
                                    @error('lokasi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lokasi') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lama_pkl">Lama PKL <span class="text-danger">*</span></label>
                                    <input type="text" name="lama_pkl" id="lama_pkl" class="form-control" required @error('lama_pkl') is-invalid @enderror value="{{ old('lama_pkl') ?? $rapot->lama_pkl }}" id="lama_pkl">
                                    @error('lama_pkl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lama_pkl') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                    <input type="text" name="keterangan" id="keterangan" class="form-control" required @error('keterangan') is-invalid @enderror value="{{ old('keterangan') ?? $rapot->keterangan }}" id="keterangan">
                                    @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                    @enderror
                                </label>
                            </div>
                        </div>                        
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-pen-square"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
</select>
@endsection