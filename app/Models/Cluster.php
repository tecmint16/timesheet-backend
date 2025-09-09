<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'TB_CLUSTER';
    protected $primaryKey = 'ID_CLUSTER';
    protected $fillable = ['ID_CLUSTER', 'NAMA_CLUSTER'];
}
