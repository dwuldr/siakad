<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Mapel;
use App\Kelas;
use App\Guru;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'idJadwal';
    protected $fillable = ['idMapel', 'idKelas', 'idPegawai', 'hari', 'jam_mulai', 'jam_selesai'];

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal'); //select * from post where user_id = 1
     }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'idMapel', 'idMapel');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas', 'idKelas');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru', 'idPegawai', 'idPegawai');
    }
}
