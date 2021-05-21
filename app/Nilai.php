<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'idNilai';
    protected $fillable = ['idMapel', 'idGuru', 'idSiswa', 'nilai_harian', 'nilai_uts', 'nilai_uas'];

    public function mapel()
    {
        return $this->belongsTo('App\Mapel', 'idMapel', 'idMapel');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru', 'idGuru', 'idGuru');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }

}
