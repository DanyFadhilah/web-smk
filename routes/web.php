<?php

use Illuminate\Support\Facades\{Route, Auth};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'FrontController@index');

Auth::routes();

Route::get('/home','HomeController@index');

Auth::routes([
    'register' => false,
    // 'home'     => false,
    'login'    => false,
]);

Route::middleware('guest')->group(function () {
    // Login Admin
    Route::get('/login/web-smk/admin/sch', 'FrontController@loginAdmin')->name('login.admin');
    Route::post('/login/web-smk/admin/sch', 'FrontController@postLoginAdmin');

    // Login Guru
    Route::get('/login', 'FrontController@loginTeacher')->name('login.teacher');
    Route::post('/login', 'FrontController@postLoginTeacher');
});

Route::group(['middleware' => ['auth', 'cek.role:ADMIN']], function() {
    Route::get('/admin/dashboard/home', 'AdminController@index');

    // Admin
    Route::get('/admin/dashboard/add', 'AdminController@addAdmin')->name('add.admin');
    Route::post('/admin/dashboard/add/store', 'AdminController@postAddAdmin');
    // Table
    Route::get('/admin/dashboard/table/list/admin', 'AdminController@tableAdmin')->name('table.admin.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/admin/{id}/detail', 'AdminController@detailAdmin')->name('view.detail.admin');
    // Edit
    Route::get('/admin/dashboard/table/list/admin/{id}/edit', 'AdminController@editAdmin')->name('edit.admin');
    Route::put('/admin/dashboard/table/list/admin/{id}/update', 'AdminController@updateAdmin')->name('update.admin');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/admin/{id}/edit/password', 'AdminController@editPasswordAdmin')->name('edit.password.admin');
    Route::post('/admin/dashboard/table/list/admin/{id}/update/password', 'AdminController@updatePasswordAdmin')->name('update.password.admin');
    // Import Admin
    Route::post('/admin/dashboard/add/admin/import', 'AdminController@importAdmin');
    // Hapus Admin
    Route::delete('/admin/dashboard/table/list/admin/{id}/destroy', 'AdminController@destroyAdmin')->name('destroy.admin');


    // Guru
    Route::get('/admin/dashboard/add/teacher', 'GuruController@addTeacher')->name('add.teacher');
    Route::post('/admin/dashboard/add/teacher/store', 'GuruController@postAddTeacher');
    // Table
    Route::get('/admin/dashboard/table/list/teacher', 'GuruController@tableTeacher')->name('table.teacher.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/teacher/{id}/detail', 'GuruController@detailTeacher')->name('view.detail.teacher');
    // Edit
    Route::get('/admin/dashboard/table/list/teacher/{id}/edit', 'GuruController@editTeacher')->name('edit.teacher');
    Route::put('/admin/dashboard/table/list/teacher/{id}/update', 'GuruController@updateTeacher')->name('update.teacher');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/teacher/{id}/edit/password', 'GuruController@editPasswordTeacher')->name('edit.password.teacher');
    Route::post('/admin/dashboard/table/list/teacher/{id}/update/password', 'GuruController@updatePasswordTeacher')->name('update.password.teacher');
    // Import Guru
    Route::post('/admin/dashboard/add/teacher/import', 'GuruController@importTeacher');
    // Hapus Guru
    Route::delete('/admin/dashboard/table/list/teacher/{id}/destroy', 'GuruController@destroyTeacher')->name('destroy.teacher');


    // Siswa
    Route::get('/admin/dashboard/add/student', 'SiswaController@addStudent')->name('add.student');
    Route::post('/admin/dashboard/add/student/store', 'SiswaController@postAddStudent');
    // Table
    Route::get('/admin/dashboard/table/list/student', 'SiswaController@tableStudent')->name('table.student.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/student/{id}/detail', 'SiswaController@detailStudent')->name('view.detail.student');
    // Edit
    Route::get('/admin/dashboard/table/list/student/{id}/edit', 'SiswaController@editStudent')->name('edit.student');
    Route::put('/admin/dashboard/table/list/student/{id}/update', 'SiswaController@updateStudent')->name('update.student');
    // Ganti Password
    Route::get('/admin/dashboard/table/list/student/{id}/edit/password', 'SiswaController@editPasswordStudent')->name('edit.password.student');
    Route::post('/admin/dashboard/table/list/student/{id}/update/password', 'SiswaController@updatePasswordStudent')->name('update.password.student');
    // Import Siswa
    Route::post('/admin/dashboard/add/student/import', 'SiswaController@importStudent');
    // Hapus Siswa
    Route::delete('/admin/dashboard/table/list/student/{id}/destroy', 'SiswaController@destroyStudent')->name('destroy.student');

    // Jurusan
    Route::get('/admin/dashboard/add/major', 'JurusanController@addMajor')->name('add.major');
    Route::post('/admin/dashboard/add/major/store', 'JurusanController@postAddMajor');
    // Table
    Route::get('/admin/dashboard/table/list/major', 'JurusanController@tableMajor')->name('table.major.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/major/{id}/detail', 'JurusanController@detailMajor')->name('view.detail.major');
    // Edit
    Route::get('/admin/dashboard/table/list/major/{id}/edit', 'JurusanController@editMajor')->name('edit.major');
    Route::put('/admin/dashboard/table/list/major/{id}/update', 'JurusanController@updateMajor')->name('update.major');
    // Hapus Jurusan
    Route::delete('/admin/dashboard/table/list/major/{id}/destroy', 'JurusanController@destroyMajor')->name('destroy.major');

    // Jurusan
    Route::get('/admin/dashboard/add/major', 'JurusanController@addMajor')->name('add.major');
    Route::post('/admin/dashboard/add/major/store', 'JurusanController@postAddMajor');
    // Table
    Route::get('/admin/dashboard/table/list/major', 'JurusanController@tableMajor')->name('table.major.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/major/{id}/detail', 'JurusanController@detailMajor')->name('view.detail.major');
    // Edit
    Route::get('/admin/dashboard/table/list/major/{id}/edit', 'JurusanController@editMajor')->name('edit.major');
    Route::put('/admin/dashboard/table/list/major/{id}/update', 'JurusanController@updateMajor')->name('update.major');
    // Hapus Jurusan
    Route::delete('/admin/dashboard/table/list/major/{id}/destroy', 'JurusanController@destroyMajor')->name('destroy.major');

    // Kelas
    Route::get('/admin/dashboard/add/class', 'KelasController@addClass')->name('add.class');
    Route::post('/admin/dashboard/add/class/store', 'KelasController@postAddClass');
    // Table
    Route::get('/admin/dashboard/table/list/class', 'KelasController@tableClass')->name('table.class.list');
    // Edit Kelas
    Route::get('/admin/dashboard/table/list/class/{id}/edit', 'KelasController@editClass')->name('edit.class');
    Route::put('/admin/dashboard/table/list/class/{id}/update', 'KelasController@updateClass')->name('update.class');
    // Hapus Kelas
    Route::delete('/admin/dashboard/table/list/class/{id}/destroy', 'KelasController@destroyClass')->name('destroy.class');


    // Mapel
    Route::get('/admin/dashboard/add/lesson', 'MapelController@addLesson')->name('add.lesson');
    Route::post('/admin/dashboard/add/lesson/store', 'MapelController@postAddLesson');
    // Table
    Route::get('/admin/dashboard/table/list/lesson', 'MapelController@tablelesson')->name('table.lesson.list');
    // Edit Mapel
    Route::get('/admin/dashboard/table/list/lesson/{id}/edit', 'MapelController@editLesson')->name('edit.lesson');
    Route::put('/admin/dashboard/table/list/lesson/{id}/update', 'MapelController@updateLesson')->name('update.lesson');
    // Hapus Mapel
    Route::delete('/admin/dashboard/table/list/lesson/{id}/destroy', 'MapelController@destroyLesson')->name('destroy.lesson');


    // Info
    Route::get('/admin/dashboard/add/info', 'InformasiController@addInfo')->name('add.info');
    Route::post('/admin/dashboard/add/info/store', 'InformasiController@postAddInfo');
    // Table
    Route::get('/admin/dashboard/table/list/info', 'InformasiController@tableInfo')->name('table.info.list');
    // View Detail
    Route::get('/admin/dashboard/table/list/info/{id}/detail', 'InformasiController@detailInfo')->name('view.detail.info');
    // Edit Informasi
    Route::get('/admin/dashboard/table/list/info/{id}/edit', 'InformasiController@editInfo')->name('edit.info');
    Route::put('/admin/dashboard/table/list/info/{id}/update', 'InformasiController@updateInfo')->name('update.info');
    // Hapus Informasi
    Route::delete('/admin/dashboard/table/list/info/{id}/destroy', 'InformasiController@destroyInfo')->name('destroy.info');

    // Jadwal
    Route::get('/admin/dashboard/add/jadwal', 'JadwalController@addJadwal')->name('add.jadwal');
    Route::post('/admin/dashboard/add/jadwal/store', 'JadwalController@postAddJadwal');
    // Table
    Route::get('/admin/dashboard/table/list/jadwal', 'JadwalController@tableJadwal')->name('table.jadwal.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/jadwal/{id}/edit', 'JadwalController@editJadwal')->name('edit.jadwal');
    Route::put('/admin/dashboard/table/list/jadwal/{id}/update', 'JadwalController@updateJadwal')->name('update.jadwal');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/jadwal/{id}/destroy', 'JadwalController@destroyJadwal')->name('destroy.jadwal');

    // Materi
    Route::get('/admin/dashboard/add/materi', 'MateriController@addMateri')->name('add.materi');
    Route::post('/admin/dashboard/add/materi/store', 'MateriController@postAddMateri');
    // Table
    Route::get('/admin/dashboard/table/list/materi', 'MateriController@tableMateri')->name('table.materi.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/materi/{id}/edit', 'MateriController@editMateri')->name('edit.materi');
    Route::put('/admin/dashboard/table/list/materi/{id}/update', 'MateriController@updateMateri')->name('update.materi');
     // View Detail
     Route::get('/admin/dashboard/table/list/materi/{id}/detail', 'MateriController@detailMateri')->name('view.detail.materi');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/materi/{id}/destroy', 'MateriController@destroyMateri')->name('destroy.materi');

    // rpp
    Route::get('/admin/dashboard/add/rpp', 'RppController@addRpp')->name('add.rpp');
    Route::post('/admin/dashboard/add/rpp/store', 'RppController@postAddRpp');
    // Table
    Route::get('/admin/dashboard/table/list/rpp', 'RppController@tableRpp')->name('table.rpp.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/rpp/{id}/edit', 'RppController@editRpp')->name('edit.rpp');
    Route::put('/admin/dashboard/table/list/rpp/{id}/update', 'RppController@updateRpp')->name('update.rpp');
     // View Detail
    Route::get('/admin/dashboard/table/list/rpp/{id}/detail', 'RppController@detailRpp')->name('view.detail.rpp');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/rpp/{id}/destroy', 'RppController@destroyRpp')->name('destroy.rpp');
    Route::get('/guru/getGuru/', 'RppController@getGuru')->name('rpp.getGuru');

    // rapot
    Route::get('/admin/dashboard/add/rapot', 'RapotController@addRapot')->name('add.rapot');
    Route::post('/admin/dashboard/add/rapot/store', 'RapotController@postAddRapot');
    // Table
    Route::get('/admin/dashboard/table/list/rapot', 'RapotController@tableRapot')->name('table.rapot.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/rapot/{id}/edit', 'RapotController@editRapot')->name('edit.rapot');
    Route::put('/admin/dashboard/table/list/rapot/{id}/update', 'RapotController@updateRapot')->name('update.rapot');
     // View Detail
    Route::get('/admin/dashboard/table/list/rapot/{id}/detail', 'RapotController@detailRapot')->name('view.detail.rapot');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/rapot/{id}/destroy', 'RapotController@destroyRapot')->name('destroy.rapot');

    // ekskul
    Route::get('/admin/dashboard/add/ekskul', 'EkskulController@addEkskul')->name('add.ekskul');
    Route::post('/admin/dashboard/add/ekskul/store', 'EkskulController@postAddEkskul');
    // Table
    Route::get('/admin/dashboard/table/list/ekskul', 'EkskulController@tableEkskul')->name('table.ekskul.list');
    // Edit Jadwal
    Route::get('/admin/dashboard/table/list/ekskul/{id}/edit', 'EkskulController@editEkskul')->name('edit.ekskul');
    Route::put('/admin/dashboard/table/list/ekskul/{id}/update', 'EkskulController@updateEkskul')->name('update.ekskul');
     // View Detail
    Route::get('/admin/dashboard/table/list/ekskul/{id}/detail', 'EkskulController@detailEkskul')->name('view.detail.ekskul');
    // Hapus Jadwal
    Route::delete('/admin/dashboard/table/list/ekskul/{id}/destroy', 'EkskulController@destroyEkskul')->name('destroy.ekskul');

    // logout Admin
    Route::get('/admin/dashboard/logout', 'AdminController@logoutAdmin');

    Route::get('/info/{id}', 'MateriController@getInfo');
});
