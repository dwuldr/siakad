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

//Auth::routes();
//Route::get('/login', 'login@loginPage');
//Route::post('/checklogin', 'login@Login');
//Route::get('/admin','AdminController@dashboard')->name('admin')->middleware('admin');
//Route::get('/guru','GuruController@dashboard_guru')->name('guru')->middleware(['auth', 'guru']);
//Route::get('/siswa','SiswaController@dashboard')->name('siswa')->middleware('siswa');
//Route::get('/home', 'HomeController@index');
//Route::get('/logout', 'LoginController@logout');
//Route::post('/daftar', 'Auth\RegisterController@register');
//Route::get('/register', function () {
   // return view('auth/register');
//});

//Route::post('/cek-email', 'UserController@email')->name('cek-email')->middleware('guest');
//Route::get('/reset/password/{id}', 'UserController@password')->name('reset.password')->middleware('guest');
//Route::patch('/reset/password/update/{id}', 'UserController@update_password')->name('reset.password.update')->middleware('guest');

//Route::group(['middleware' =>['auth']], function() {

    //Route::prefix('admin')->group(function () {
        //Route::get('/', function() {
         //   return view('admin/dashboard');
        //})->name('home');

        //Route::prefix('user')->group(function () {
            //Route::get('/', 'UserController@index')->name('admin/users')->middleware('admin');
            //Route::get('/setting', 'UserController@create')->name('admin.users.create');
            //Route::post('/setting', 'UserController@update')->name('admin.users.update');
      //  });
    //});
    //Route::get('/profile', 'UserController@profile')->name('profile');
    //Route::put('/profile/update', 'UserController@updateProfile');
    //Route::put('/profile/guru/update', 'UserController@updateProfileGuru');
    //Route::put('/profile/siswa/update', 'UserController@updateProfileSiswa');

    //Route::middleware(['guru'])->group(function () {
        Route::get('pegawai/absen/harian', 'PegawaiController@absen')->name('absen.harian');
        Route::post('pegawai/absen/simpan', 'PegawaiController@simpan')->name('absen.simpan');
        Route::get('pegawai/jadwal/guru', 'JadwalController@guru')->name('jadwal.guru');
        Route::get('pegawai/nilai', 'NilaiController@index');
        Route::resource('pegawai/ulangan', 'UlanganController');
        Route::resource('pegawai/sikap', 'SikapController');
        Route::get('pegawai/rapot/predikat', 'RapotController@predikat');
        Route::resource('pegawai/rapot', 'RapotController');

        Route::get('pegawai/absen', 'AbsenController@index');
        Route::get('pegawai/absen/list/{id}', 'AbsenController@listAbsen');
        Route::get('pegawai/absen/list/{idJadwal}/add/{idKelas}', 'AbsenController@listSiswa');
        Route::post('pegawai/absen/save', 'AbsenController@store');

        Route::get('pegawai/listmapel', 'MapelController@listMapelByGuru');
        Route::get('pegawai/listSiswa/{id}', 'NilaiController@listSiswa');
        Route::get('pegawai/detailNilai/{idMapel}', 'NilaiController@detailNilai');
        Route::post('pegawai/inputNilai', 'NilaiController@inputNilai');
   // });

    //Route::middleware(['admin'])->group(function () {
        Route::get('admin/pegawai/index', 'PegawaiController@index');
        Route::get('admin/pegawai/create', 'PegawaiController@create');
        Route::post('admin/pegawai', 'PegawaiController@store');
        Route::get('admin/pegawai/edit/{idPegawai}', 'PegawaiController@edit');
        Route::patch('admin/pegawai/{idPegawai}', 'PegawaiController@update');
        Route::get('admin/pegawai/show/{id}', 'PegawaiController@show');
        Route::delete('admin/pegawai/destroy/{id}', 'PegawaiController@destroy');

        Route::get('admin/siswa/index', 'SiswaController@index');
        Route::get('admin/siswa/create', 'SiswaController@create');
        Route::post('admin/siswa', 'SiswaController@store');
        Route::get('admin/siswa/edit/{idSiswa}', 'SiswaController@edit');
        Route::patch('admin/siswa/{idSiswa}', 'SiswaController@update');
        Route::get('admin/siswa/show/{id}', 'SiswaController@show');
        Route::delete('admin/siswa/destroy/{id}', 'SiswaController@destroy');

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
        Route::get('admin/jadwal/show/{idKelas}/{id}', 'JadwalController@show');
        Route::get('admin/jadwal/create/{id}', 'JadwalController@create');
        Route::post('admin/jadwal', 'JadwalController@store');
        Route::get('admin/jadwal/pilihSemester/{id}', 'JadwalController@pilihSemester');
        Route::get('admin/jadwal/edit/{id}', 'JadwalController@edit');
        Route::patch('admin/jadwal/{id}', 'JadwalController@update');
        Route::delete('admin/jadwal/show/{idKelas}/{id}', 'JadwalController@destroy');

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
//    });
//});
