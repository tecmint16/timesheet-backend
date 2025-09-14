<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    protected $table = 'TB_CLUSTER';
    protected $primaryKey = 'ID_CLUSTER';
    protected $fillable = ['NAMA_CLUSTER'];


    public function projects()
    {
        return $this->hasMany(Project::class, 'ID_CLUSTER', 'ID_CLUSTER');
    }

    // Relasi ke Project
    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project');
    }
}
