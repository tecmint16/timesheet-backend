<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'TB_PROJECT';
    protected $primaryKey = 'ID_PROJECT';
    protected $fillable = [
        'KODE_PROJECT',
        'NAMA_PROJECT',
        'ID_CLUSTER',
        'ID_APLIKASI'
    ];

    public function clusters()
    {
        return $this->hasMany(Cluster::class, 'id_project');
    }

    // Relasi ke Cluster
    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'ID_CLUSTER', 'ID_CLUSTER');
    }

    // Relasi ke Aplikasi
    public function aplikasi()
    {
        return $this->belongsTo(Aplikasi::class, 'ID_APLIKASI', 'ID_APLIKASI');
    }

    // Relasi ke User
    public function users()
    {
        return $this->hasMany(User::class, 'ID_PROJECT', 'ID_PROJECT');
    }
}
