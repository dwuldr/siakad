<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "idPegawai";
    protected $fillable = ([
        'nama_guru', 'nip', 'jk', 'tmp_lahir', 'tgl_lahir', 'alamat', 'telp', 'status', 'created_at', 'updated_at'
    ]);
    public function users(){
        return $this->hasOne('App\User');
    }
}
