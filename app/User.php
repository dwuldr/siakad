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
        'idSiswa', 'idPegawai', 'username', 'password_2', 'level',
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'idPegawai');
    }
    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa');
    }

    protected $hidden = [
        'password_2', 'remember_token',
    ];
}
