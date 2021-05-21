<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password_2' => bcrypt($data['password']),
            'level' => $data['level'],
        ]);
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
        if(!$users) {
            return redirect()->back();
        }
        $users->delete();
        return redirect('users');
    }

    public function profile()
    {
        return view('user.profile');
    }

}
