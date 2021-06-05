<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\TahunAjaran;
use App\Kelas;

class Alumni extends Model
{
    protected $table = 'alumni';
    protected $primaryKey = 'idAlumni';
    protected $fillable = ['idKelas', 'idAjaran', 'nama_alumni'];

    public function alumni()
    {
        return $this->hasOne('App\Alumni'); //select * from post where user_id = 1
     }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas', 'idKelas', 'idKelas');
    }

    public function tahun_ajaran()
    {
        return $this->belongsTo('App\TahunAjaran', 'idAjaran', 'idAjaran');
    }
}
