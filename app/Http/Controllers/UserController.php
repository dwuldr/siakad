<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guru;
use App\Siswa;
use App\Mapel;
use App\Kelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    //protected function validator(array $data)
    //{
    // return Validator::make($data, [
    //'username' => 'required|string|username|max:255|unique::users',
    //'password_2' => 'required|min:6|confirmed',
    //'level' => 'required',
    //]);
    //}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all);
        $users = new User();
        $users->username = $request->get("username");
        $users->password_2 = bcrypt($request->get("password_2"));
        $users->level = $request->get("level");
        $users->save();
        $users = User::all();
        return view("admin.users.index", ["users" => $users]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idUsers)
    {
        $users = User::findOrFail($idUsers);
        return view("admin.users.edit", compact('users'));
    }

    public function editProfile()
    {
        // return Auth::login();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUsers)
    {
        $users = User::findOrFail($idUsers);
        $users->username = $request->get("username");
        $users->password_2 = bcrypt($request->get("password_2"));
        $users->level = $request->get("level");
        $users->save();
        return redirect("users");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idUsers)
    {
        $users = user::find($idUsers);
        if (!$users) {
            return redirect()->back();
        }
        $users->delete();
        return redirect('users');
    }

    public function profile()
    {
        $data = [];
        // return session('id');
        if (session('level') == 'Guru') {
            $data = Guru::where('idUsers', session('id'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        } else if(session('level') == 'Siswa'){
            $data = Siswa::where('idUsers', session('id'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        }else{
            $data = user::where('idUsers', session('id'))->first();
            // return $data;
            return view('user.profile', compact('data'));
        }
        return session('level');
    }

    public function updateProfile(Request $request)
    {
        if ($request['password'] != null) {
            $in['password_2'] = bcrypt($request['password']);
        }
        $in['username'] = $request['username'];
        try {
            User::where('idUsers', session('id'))->update($in);
            return redirect('/profile');
        } catch (\Throwable $th) {
            //throw $th;
            return $th;
        }
        // return $request;
    }

    public function updateProfileGuru(Request $request)
    {
        // return $request;
        $in['nama_guru'] = $request['nama_guru'];
        $in['jk'] = $request['jk'];
        $in['tmp_lahir'] = $request['tmp_lahir'];
        $in['tgl_lahir'] = $request['tgl_lahir'];
        $in['alamat'] = $request['alamat'];
        $in['telp'] = $request['telp'];
        Guru::where('idUsers', session('id'))->update($in);
        return redirect('/profile');
    }

    public function updateProfileSiswa(Request $request)
    {
        // return $request;
        $in['nama_siswa'] = $request['nama_siswa'];
        $in['jk'] = $request['jk'];
        $in['tmp_lahir'] = $request['tmp_lahir'];
        $in['tgl_lahir'] = $request['tgl_lahir'];
        $in['alamat'] = $request['alamat'];
        $in['telp'] = $request['telp'];
        $in['nis'] = $request['nis'];
        Siswa::where('idUsers', session('id'))->update($in);
        return redirect('/profile');
    }
}
