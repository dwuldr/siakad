<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'idPegawai';
    protected $fillable = ['idUsers', 'nip', 'nama_guru', 'jk',
    'tmp_lahir', 'tgl_lahir', 'alamat', 'telp'];

    public function users()
    {
        return $this->belongsTo('App\User', 'idUsers');
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'idJadwal', 'idJadwal');
    }

    public function nilai()
    {
        return $this->hasMany('App\Nilai', 'idNilai', 'idNilai');
    }

    public function kelas()
    {
        return $this->hasMany('App\Kelas', 'idKelas', 'idKelas');
    }
}
