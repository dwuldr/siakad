<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Mapel;
use App\Kelas;
use App\Guru;
use App\Semester;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'idJadwal';
    protected $fillable = ['idMapel', 'idKelas', 'idSemester','idPegawai', 'hari', 'jam_mulai', 'jam_selesai'];

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

    public function pegawai()
    {
        return $this->belongsTo('App\Pegawai', 'idPegawai', 'idPegawai');
    }

    public function semester()
    {
        return $this->belongsTo('App\Semester', 'idSemester', 'idSemester');
    }
}
