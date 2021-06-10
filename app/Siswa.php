<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'idSiswa';
    protected $fillable = ['idKelas', 'nis', 'nama_siswa', 'alamat', 'jk', 'tmp_lahir', 'tgl_lahir', 'telp', 'nama_ortu', 'status_2'];

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas');
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
