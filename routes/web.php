<?php

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

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('siakad/index');
});

Route::get('/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/guru', function () {
    return view('admin/guru');
});

Route::get('keluar',function(){
    Auth::logout();
    return redirect('login');
});

Auth::routes();
Route::post('/checklogin', 'login@Login');
Route::get('/admin','AdminController@dashboard')->name('admin')->middleware('admin');
Route::get('/guru','GuruController@dashboard_guru')->name('guru')->middleware(['auth', 'guru']);
Route::get('/siswa','SiswaController@dashboard')->name('siswa')->middleware('siswa');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'LoginController@logout');

Route::get('/login/cek_email/json', 'UserController@cek_email');
// Route::get('/login/cek_email/json', 'UserController@cek_email');
Route::get('/login/cek_password/json', 'UserController@cek_password');
Route::post('/cek-email', 'UserController@email')->name('cek-email')->middleware('guest');
Route::get('/reset/password/{id}', 'UserController@password')->name('reset.password')->middleware('guest');
Route::patch('/reset/password/update/{id}', 'UserController@update_password')->name('reset.password.update')->middleware('guest');

Route::group(['middleware' =>['auth']], function() {

    Route::prefix('admin')->group(function () {
        Route::get('/', function() {
            return view('admin/dashboard');
        })->name('home');

        Route::prefix('user')->group(function () {
            Route::get('/', 'UserController@index')->name('admin/users')->middleware('admin');
            Route::get('/setting', 'UserController@create')->name('admin.users.create');
            Route::post('/setting', 'UserController@update')->name('admin.users.update');
        });
    });
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::put('/profile/update', 'UserController@updateProfile');
    Route::put('/profile/guru/update', 'UserController@updateProfileGuru');
    Route::put('/profile/siswa/update', 'UserController@updateProfileSiswa');

    Route::middleware(['guru'])->group(function () {
        Route::get('/absen/harian', 'GuruController@absen')->name('absen.harian');
        Route::post('/absen/simpan', 'GuruController@simpan')->name('absen.simpan');
        Route::get('/jadwal/guru', 'JadwalController@guru')->name('jadwal.guru');
        Route::resource('/nilai', 'NilaiController');
        Route::resource('/ulangan', 'UlanganController');
        Route::resource('/sikap', 'SikapController');
        Route::get('/rapot/predikat', 'RapotController@predikat');
        Route::resource('/rapot', 'RapotController');

        Route::get('/absen', 'AbsenController@index');
        Route::get('/absen/list', 'AbsenController@listAbsen');
        Route::get('/absen/list/add', 'AbsenController@listSiswa');
    });

    Route::middleware(['admin'])->group(function () {
        Route::resource('users','UserController');
        Route::group(["prefix" => "g", "as" => "g."], function () {
            Route::get("/users/tambah", ["uses" => "UserController@tambah", "as" => "tambah"]);
            Route::post("/users/simpan", ["uses" => "UserController@simpan", "as" => "simpan",]);
            Route::post("/users/edit",  ["uses" => "UserController@edit", "as" => "admin.users.edit",]);
            Route::post("/users/create",  ["uses" => "UserController@create", "as" => "create",]);
            Route::get("/users/search", "UserController@search");
            Route::get("/users/all", "UserController@index");
            Route::get("/users/{idUsers}/delete", "UserController@delete");
            Route::get("/user/{idUsers}/update", "UserController@restore");
        });

        Route::resource('guru','GuruController');
        Route::group(["prefix" => "g", "as" => "g."], function () {
            Route::get("/guru/tambah", ["uses" => "GuruController@tambah", "as" => "tambah"]);
            Route::post("/guru/simpan", ["uses" => "GuruController@simpan", "as" => "simpan",]);
            Route::post("/guru/edit",  ["uses" => "GuruController@edit", "as" => "edit",]);
            Route::post("/guru/create",  ["uses" => "GuruController@create", "as" => "create",]);
            Route::get("/guru/search", "GuruController@search");
            Route::get("/guru/all", ["uses" => "GuruController@index", "as" => "admin.guru.index",]);
            Route::get("/guru/all", "GuruController@index");
            Route::get("/guru/{idGuru}/delete", "GuruController@delete");
            Route::get("/guru/{idGuru}/update", "GuruController@restore");
        });


        Route::resource('/siswa', 'SiswaController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/siswa/tambah", ["uses" => "SiswaController@tambah", "as" => "tambah"]);
            Route::post("/siswa/simpan", ["uses" => "SiswaController@simpan", "as" => "simpan",]);
            Route::post("/siswa/edit",  ["uses" => "SiswaController@edit", "as" => "admin.siswa.edit",]);
            Route::post("/siswa/create",  ["uses" => "SiswaController@create", "as" => "create",]);
            Route::get("/siswa/search", "SiswaController@search");
            Route::get("/siswa/all", ["uses" => "SiswaController@index", "as" => "admin.siswa.index",]);
            Route::post("/siswa/delete",  ["uses" => "SiswaController@delete", "as" => "delete",]);
            Route::post("/siswa/update",  ["uses" => "SiswaController@update", "as" => "update",]);
            Route::get("/siswa/{idSiswa}/delete", "SiswaController@delete");
            Route::get("/siswa/{idSiswa}/update", "SiswaController@restore");
        });


        Route::resource('mapel', 'MapelController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/mapel/tambah", ["uses" => "MapelController@tambah", "as" => "tambah"]);
            Route::post("/mapel/simpan", ["uses" => "MapelController@simpan", "as" => "simpan",]);
            Route::post("/mapel/edit",  ["uses" => "MapelController@edit", "as" => "admin.mapel.edit",]);
            Route::post("/mapel/create",  ["uses" => "MapelController@create", "as" => "create",]);
            Route::get("/mapel/search", "MapelController@search");
            Route::get("/mapel/all", ["uses" => "MapelController@index", "as" => "admin.mapel.index",]);
            Route::post("/mapel/delete",  ["uses" => "MapelController@delete", "as" => "delete",]);
            Route::post("/mapel/update",  ["uses" => "MapelController@update", "as" => "update",]);
            Route::get("/mapel/{idMapel}/delete", "MapelController@delete");
            Route::get("/mapel/{idMapel}/update", "MapelController@restore");
        });

        Route::resource('kelas','KelasController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/kelas/tambah", ["uses" => "KelasController@tambah", "as" => "tambah"]);
            Route::post("/kelas/simpan", ["uses" => "KelasController@simpan", "as" => "simpan",]);
            Route::post("/kelas/edit",  ["uses" => "KelasController@edit", "as" => "admin.kelas.edit",]);
            Route::post("/kelas/create",  ["uses" => "KelasController@create", "as" => "create",]);
            Route::get("/kelas/search", "KelasController@search");
            Route::get("/kelas/all", ["uses" => "KelasController@index", "as" => "admin.kelas.index",]);
            Route::post("/kelas/delete",  ["uses" => "KelasController@delete", "as" => "delete",]);
            Route::post("/kelas/update",  ["uses" => "KelasController@update", "as" => "update",]);
            Route::get("/kelas/{idkelas}/delete", "KelasController@delete");
            Route::get("/kelas/{idkelas}/update", "KelasController@restore");
        });

        Route::resource('jadwal','JadwalController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/jadwal/tambah", ["uses" => "JadwalController@tambah", "as" => "tambah"]);
            Route::post("/jadwal/simpan", ["uses" => "JadwalController@simpan", "as" => "simpan",]);
            Route::post("/jadwal/edit",  ["uses" => "JadwalController@edit", "as" => "admin.jadwal.edit",]);
            Route::post("/jadwal/create",  ["uses" => "JadwalController@create", "as" => "create",]);
            Route::get("/jadwal/search", "JadwalController@search");
            Route::get("/jadwal/all", ["uses" => "JadwalController@index", "as" => "admin.jadwal.index",]);
            Route::post("/jadwal/delete",  ["uses" => "JadwalController@delete", "as" => "delete",]);
            Route::post("/jadwal/update",  ["uses" => "JadwalController@update", "as" => "update",]);
            Route::get("/jadwal/{idjadwal}/delete", "JadwalController@delete");
            Route::get("/jadwal/{idjadwal}/update", "JadwalController@restore");
        });


        Route::resource('pembayaran','PembayaranController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/pembayaran/tambah", ["uses" => "PembayaranController@tambah", "as" => "tambah"]);
            Route::post("/pembayaran/simpan", ["uses" => "PembayaranController@simpan", "as" => "simpan",]);
            Route::post("/pembayaran/edit",  ["uses" => "PembayaranController@edit", "as" => "admin.pembayaran.edit",]);
            Route::post("/pembayaran/create",  ["uses" => "PembayaranController@create", "as" => "create",]);
            Route::get("/pembayaran/search", "PembayaranController@search");
            Route::get("/pembayaran/all", ["uses" => "PembayaranControlle r@index", "as" => "admin.pembayaran.index",]);
            Route::post("/pembayaran/delete",  ["uses" => "PembayaranController@delete", "as" => "delete",]);
            Route::post("/pembayaran/update",  ["uses" => "PembayaranController@update", "as" => "update",]);
            Route::get("/pembayaran/{idpembayaran}/delete", "PembayaranController@delete");
            Route::get("/pembayaran/{idpembayaran}/update", "PembayaranController@restore");
        });

        Route::resource('nilai','NilaiController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/nilai/tambah", ["uses" => "NilaiController@tambah", "as" => "tambah"]);
            Route::post("/nilai/simpan", ["uses" => "NilaiController@simpan", "as" => "simpan",]);
            Route::post("/nilai/edit",  ["uses" => "NilaiController@edit", "as" => "nilai.edit",]);
            Route::post("/guru_nilai/edit",  ["uses" => "NilaiController@edit", "as" => "guru.nilai.edit",]);
            Route::post("/nilai/create",  ["uses" => "NilaiController@create", "as" => "create",]);
            Route::get("/nilai/search", "NilaiController@search");
            Route::get("/nilai/all", ["uses" => "nilaiControlle r@index", "as" => "guru.nilai.index",]);
            Route::post("/nilai/delete",  ["uses" => "NilaiController@delete", "as" => "delete",]);
            Route::post("/nilai/update",  ["uses" => "NilaiController@update", "as" => "update",]);
            Route::get("/nilai/{idnilai}/delete", "NilaiController@delete");
            Route::get("/nilai/{idnilai}/update", "NilaiController@restore");
        });

        Route::resource('info', 'InfoController');
        Route::group(["prefix" => "o", "as" => "o."], function () {
            Route::get("/info/tambah", ["uses" => "InfoController@tambah", "as" => "tambah"]);
            Route::post("/info/simpan", ["uses" => "InfoController@simpan", "as" => "simpan",]);
            Route::post("/info/edit",  ["uses" => "InfoController@edit", "as" => "admin.info.edit",]);
            Route::post("/info/create",  ["uses" => "InfoController@create", "as" => "create",]);
            Route::get("/info/search", "InfoController@search");
            Route::get("/info/all", ["uses" => "infoControlle r@index", "as" => "admin.info.index",]);
            Route::post("/info/delete",  ["uses" => "InfoController@delete", "as" => "delete",]);
            Route::post("/info/update",  ["uses" => "InfoController@update", "as" => "update",]);
            Route::get("/info/{idinfo}/delete", "InfoController@delete");
            Route::get("/info/{idinfo}/update", "InfoController@restore");
        });


    });
});



