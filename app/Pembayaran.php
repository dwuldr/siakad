<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'idPembayaran';
    protected $fillable = ['idSiswa', 'tgl', 'jenis_bayar', 'jumlah_bayar'];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa', 'idSiswa', 'idSiswa');
    }

}
