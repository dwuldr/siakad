<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return session('level');
        // return 'gagal';
        $cek = Auth::login(User::find(session('idUsers')));
        // return $cek;
        if ($cek) {
            return redirect('/login')->with('message', 'Session berakhir!');
        }else {
            if (session('level') == "Admin") {

                return view('admin/dashboard');
            } else if (session('level') == "Guru") {
                return view('guru/dashboard');
            } else if (session('level') == "Siswa") {
                return view('siswa/dashboard');
            }
        }
    }
}
