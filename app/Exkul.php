<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Exkul extends Model
{
    protected $table = 'exkul';
    protected $primaryKey = 'idExkul';
    protected $fillable = ['nama_exkul', 'hari', 'waktu'];
}
