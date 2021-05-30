<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\UserInterface;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    //   function Login(Request $request){

    //       $user_data= array(
    //         'user' => $request->get('name'),
    //         'password' => $request->get('password'),
    //       );
    //       $data = DB::select('SELECT * FROM users');
    //       $datas = 0;
    //       $ez = Hash::make($user_data['password']);
    //       foreach($data as $dat){
    //         if($user_data['user']==$dat->username ){
    //           if (Hash::check($user_data['password'], $dat->password_2)) {
    //             $datas=1;
    //             $data_user=array(
    //               'user' => $dat->username,
    //               'password' => $dat->password_2,
    //               'role' => $dat->level,
    //               );
    //           }
    //         }
    //       }
    //       if($datas == 1){
    //         if($data_user['role']=="Admin"){
    //            return view('admin/dashboard',['user'=>$data_user['user']]);
    //         }
    //         else if($data_user['role']=="Guru"){
    //            return view('guru/dashboard',['user'=>$data_user['user']]);
    //         }
    //         else if($data_user['role']=="Siswa"){
    //            return view('siswa/dashboard',['user'=>$data_user['user']]);
    //         }
    //       }
    //       else{
    //         return redirect()->route('login');
    //       }
    //   }

    public function logout()
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        } elseif (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }

        return redirect('/');
    }
}
