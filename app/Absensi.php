<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $primaryKey = 'idAbsensi';
    protected $table = 'absensi';
    protected $fillable = ['idJadwal', 'tgl', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\Jadwal', 'idJadwal');
    }

    public function absensi_detail()
    {
        return $this->hasMany('App\AbsensiDetail', 'idDetail', 'idDetail');
    }
}
