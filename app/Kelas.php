<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'idKelas';
<<<<<<< HEAD
    protected $fillable = ['nama_kelas' ];
=======
    protected $fillable = ['idPegawai', 'nama_kelas' ];
>>>>>>> 98abfdc9c06625c14c9c5d66b49f450d721c4adc


    public function jadwal()
    {
        return $this->hasMany('App\Jadwal', 'idJadwal', 'idJadwal');
    }

}
