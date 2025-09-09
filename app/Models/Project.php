<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'TB_PROJECT';
    protected $primaryKey = 'ID_PROJECT';
    protected $fillable = ['ID_PROJECT', 'KODE_PROJECT', 'NAMA_PROJECT'];
}
