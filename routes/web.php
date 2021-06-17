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
    return redirect('/login');
});

Auth::routes();
Route::get('/login', 'login@loginPage');
Route::post('/checklogin', 'login@Login');
Route::get('/admin','AdminController@dashboard')->name('admin')->middleware('admin');
Route::get('/guru','GuruController@dashboard_guru')->name('guru')->middleware(['auth', 'guru']);
Route::get('/siswa','SiswaController@dashboard')->name('siswa')->middleware('siswa');
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'LoginController@logout');
Route::post('/daftar', 'Auth\RegisterController@register');
Route::get('/register', function () {
    return view('auth/register');
});

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
        Route::get('/absen/harian', 'PegawaiController@absen')->name('absen.harian');
        Route::post('/absen/simpan', 'PegawaiController@simpan')->name('absen.simpan');
        Route::get('/jadwal/guru', 'JadwalController@guru')->name('jadwal.guru');
        Route::get('/nilai', 'NilaiController@index');
        Route::resource('/ulangan', 'UlanganController');
        Route::resource('/sikap', 'SikapController');
        Route::get('/rapot/predikat', 'RapotController@predikat');
        Route::resource('/rapot', 'RapotController');

        Route::get('/absen', 'AbsenController@index');
        Route::get('/absen/detail/{idAbsen}', 'AbsenController@show');
        Route::get('/absen/cetak/{idAbsen}', 'AbsenController@getPdf');
        Route::get('/absen/list/{id}', 'AbsenController@listAbsen');
        Route::get('/absen/list/{idJadwal}/add/{idKelas}', 'AbsenController@listSiswa');
        Route::post('/absen/save', 'AbsenController@store');

        Route::get('/listmapel', 'MapelController@listMapelByGuru');
        Route::get('/listSiswa/{id}', 'NilaiController@listSiswa');
        Route::get('/detailNilai/{idMapel}', 'NilaiController@detailNilai');
        Route::post('/inputNilai', 'NilaiController@inputNilai');
    });

    Route::middleware(['siswa'])->group(function () {
        Route::get('/siswa/jadwal/lihat-jadwal', 'SiswaController@lihatJadwal');
        Route::get('/siswa/lihat-nilai', 'SiswaController@lihatNilai');
    });

    Route::middleware(['admin'])->group(function () {
        Route::get('/raport/kelas', 'RaportController@index');
        Route::get('/raport/kelas/{idKelas}', 'RaportController@show');
        Route::get('/raport/cetak/{idSiswa}', 'RaportController@cetak');


        Route::get('admin/pegawai/index', 'PegawaiController@index');
        Route::get('admin/pegawai/create', 'PegawaiController@create');
        Route::post('admin/pegawai', 'PegawaiController@store');
        Route::get('admin/pegawai/edit/{idPegawai}', 'PegawaiController@edit');
        Route::patch('admin/pegawai/{idPegawai}', 'PegawaiController@update');
        Route::get('admin/pegawai/show/{id}', 'PegawaiController@show');
        Route::delete('admin/pegawai/destroy/{id}', 'PegawaiController@destroy');
        Route::get('admin/pegawai/cetak-data-pegawai', 'PegawaiController@cetakPegawai')->name('cetak-data-pegawai');
        Route::get('exportPegawai', 'PegawaiController@pegawaiexport')->name('exportPegawai');
        Route::put('importPegawai', 'PegawaiController@pegawaiimportexcel')->name('importPegawai');


        Route::get('admin/siswa/index', 'SiswaController@index');
        Route::get('admin/siswa/create', 'SiswaController@create');
        Route::post('admin/siswa', 'SiswaController@store');
        Route::get('admin/siswa/edit/{idSiswa}', 'SiswaController@edit');
        Route::patch('admin/siswa/{idSiswa}', 'SiswaController@update');
        Route::get('admin/siswa/show/{id}', 'SiswaController@show');
        Route::delete('admin/siswa/destroy/{id}', 'SiswaController@destroy');
        Route::get('admin/siswa/cetak-data-siswa', 'SiswaController@cetakSiswa')->name('cetak-data-siswa');
        Route::get('exportSiswa', 'SiswaController@siswaexport')->name('exportSiswa');
        Route::put('importSiswa', 'SiswaController@siswaimportexcel')->name('importSiswa');


        Route::get('admin/kelas/index', 'KelasController@index');
        Route::get('admin/kelas/create', 'KelasController@create');
        Route::post('admin/kelas', 'KelasController@store');
        Route::get('admin/kelas/edit/{id}', 'KelasController@edit');
        Route::patch('admin/kelas/{id}', 'KelasController@update');
        Route::get('admin/kelas/show/{id}', 'KelasController@show');
        Route::delete('admin/kelas/destroy/{id}', 'KelasController@destroy');

        Route::get('admin/info/index', 'InfoController@index');
        Route::get('admin/info/create', 'InfoController@create');
        Route::post('admin/info', 'InfoController@store');
        Route::get('admin/info/edit/{id}', 'InfoController@edit');
        Route::patch('admin/info/{id}', 'InfoController@update');
        Route::get('admin/info/show/{id}', 'InfoController@show');
        Route::delete('admin/info/destroy/{id}', 'InfoController@destroy');

        Route::get('admin/pembayaran/index', 'PembayaranController@index');
        Route::get('admin/pembayaran/create', 'PembayaranController@create');
        Route::post('admin/pembayaran', 'PembayaranController@store');
        Route::get('admin/pembayaran/edit/{id}', 'PembayaranController@edit');
        Route::patch('admin/pembayaran/{id}', 'PembayaranController@update');
        Route::get('admin/pembayaran/show/{id}', 'PembayaranController@show');
        Route::delete('admin/pembayaran/destroy/{id}', 'PembayaranController@destroy');

        Route::get('admin/jadwal/index', 'JadwalController@index');
        Route::get('admin/jadwal/show/{idKelas}/{idJadwal}', 'JadwalController@show');
        Route::get('admin/jadwal/create', 'JadwalController@create');
        Route::post('admin/jadwal', 'JadwalController@store');
        Route::get('admin/jadwal/pilihSemester/{id}', 'JadwalController@pilihSemester');
        Route::get('admin/jadwal/edit/{idJadwal}', 'JadwalController@edit');
        Route::patch('admin/jadwal/{id}', 'JadwalController@update');
        Route::get('admin/jadwal/detail/{id}', 'JadwalController@detail');
        Route::delete('admin/jadwal/destroy/{idJadwal}', 'JadwalController@destroy');
        Route::get('admin/cetak-jadwal', 'JadwalController@cetakForm')->name('cetak-jadwal');
        Route::get('admin/jadwal/cetak-data-pertanggal/{tglawal}/{tglakhir}', 'JadwalController@cetakJadwalPertanggal')->name('cetak-data-pertanggal');

        Route::get('admin/semester/index', 'SemesterController@index');
        Route::get('admin/semester/pilihSemester', 'SemesterController@index');
        Route::get('admin/semester/create', 'SemesterController@create');
        Route::post('admin/semester', 'SemesterController@store');
        Route::get('admin/semester/edit/{id}', 'SemesterController@edit');
        Route::patch('admin/semester/{id}', 'SemesterController@update');
        Route::get('admin/semester/show/{id}', 'SemesterController@show');
        Route::delete('admin/semester/destroy/{id}', 'SemesterController@destroy');

        Route::get('admin/mapel/index', 'MapelController@index');
        Route::get('admin/mapel/create', 'MapelController@create');
        Route::post('admin/mapel', 'MapelController@store');
        Route::get('admin/mapel/edit/{id}', 'MapelController@edit');
        Route::patch('admin/mapel/{id}', 'MapelController@update');
        Route::get('admin/mapel/show/{id}', 'MapelController@show');
        Route::delete('admin/mapel/destroy/{id}', 'MapelController@destroy');

        Route::get("admin/users/tambah", ["uses" => "UserController@tambah", "as" => "tambah"]);
        Route::post("admin/users/simpan", ["uses" => "UserController@simpan", "as" => "simpan",]);
        Route::post("admin/users/edit",  "UserController@edit");
        Route::post("admin/users/create",  ["uses" => "UserController@create", "as" => "create",]);
        Route::get("admin/users/search", "UserController@search");
        Route::get("admin/users/all", "UserController@index");
        Route::get("admin/users/index", "UserController@index");
        Route::get("admin/users/{idUsers}/delete", "UserController@delete");
        Route::get("/user/{idUsers}/update", "UserController@restore");
    });
});
