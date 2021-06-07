<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'idUsers';
    protected $fillable = [
        'username', 'idPegawai', 'idSiswa','password_2', 'level',
    ];

    public function guru()
    {
        return $this->belongsToMany('App\Guru', 'idPegawai', 'idPegawai');
    }
    public function siswa()
    {
        return $this->belongsToMany('App\Siswa', 'idSiswa', 'idSiswa');
    }

    protected $hidden = [
        'password_2', 'remember_token',
    ];
}
