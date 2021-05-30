<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'password_2' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        ($data['password_2']);
        return User::create([
            'username' => $data['username'],
            'password_2' => $data['password_2'],
            'level' => $data['level'],
        ]);
    }

    protected function redirectTo()
    {
        return route('home');
    }

    public function register(Request $request)
    {
        // return $request;
        $request->validate([
            'nama_siswa' => 'required',
            'telp' => 'required',
            'jk' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'username' => 'required',
            'password_2' => 'required',
        ]);

        try {
            $user = User::create([
                'username' => $request['username'],
                'password_2' => bcrypt($request['password_2']),
                'level' => 'Siswa',
            ]);
            $id = User::orderBy('idUsers', 'DESC')->first();
            // return $id;
            Siswa::create([
                'idUsers' => $id->idUsers,
                'nama_siswa' => $request['nama_siswa'],
                'telp' => $request['telp'],
                'tmp_lahir' => $request['tmp_lahir'],
                'tgl_lahir' => $request['tgl_lahir'],
                'jk' => $request['jk'],
                'nama_ortu' => $request['nama_ortu'],
                'alamat' => $request['alamat'],
                'status' => 'Pendaftar',
            ]);
            return redirect('/register');
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
    }
}
