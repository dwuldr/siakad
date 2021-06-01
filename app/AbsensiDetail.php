<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsensiDetail extends Model
{
    protected $table = 'absensi_detail';
    protected $fillable = ['idAbsensi', 'idSiswa', 'sakit', 'ijin', 'alpha', 'created_at', 'updated_at'];
}
