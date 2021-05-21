<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\UserInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class login extends Controller
{
    function Login(Request $request){
        $user_data = [
          'user' => $request->get('username'),
          'password' => $request->get('password'),
        ];

        $datas = DB::table('users')->get();
        $status = false;
        $password = Hash::make($user_data['password']);
        foreach($datas as $data){
          if($user_data['user']==$data->username ){
            if (Hash::check($user_data['password'], $data->password_2)) {
              $status = true;
              $id = $data->idUsers;
              $data_user = [
                'user' => $data->username,
                'password' => $data->password_2,
                'role' => $data->level,
              ];
              Auth::login(User::find($id));
            }
          }
        }

        if($status == true){
          if($data_user['role']=="Admin"){
            return view('admin/dashboard',['user'=>$data_user['user']]);
          }
          else if($data_user['role']=="Guru"){
            return view('guru/dashboard',['user'=>$data_user['user']]);
          }
          else if($data_user['role']=="Siswa"){
            return view('siswa/dashboard',['user'=>$data_user['user']]);
          }
        }else{
          return redirect()->route('login');
        }
    }
}
