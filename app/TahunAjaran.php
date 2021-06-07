<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = 'tahun_ajaran';
    protected $primaryKey = 'idAjaran';
    protected $fillable = ['tahun_akademik', 'semester', 'status'];

}
