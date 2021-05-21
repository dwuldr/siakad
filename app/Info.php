<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $primaryKey = 'idInfo';
    protected $fillable = ['tgl', 'pengumuman'];

}
