<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'idKelas';
    protected $fillable = ['idPegawai', 'nama_kelas' ];

    public function guru()
    {
        return $this->belongsTo('App\Guru')->withDefault();
    }

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'idJadwal', 'idJadwal');
    }

}
