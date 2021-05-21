<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'idSiswa';
    protected $fillable = ['idUsers', 'idKelas', 'nis', 'nama_siswa', 'alamat', 'jk', 'tmp_lahir', 'tgl_lahir', 'telp'];

    public function users()
    {
        return $this->belongsTo('App\User', 'idUsers', 'idUsers');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas', 'idKelas');
    }
    public function nilai()
    {
        return $this->hasMany('App\Nilai', 'idNilai', 'idNilai');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran', 'idPembayaran', 'idPembayaran');
    }


}
