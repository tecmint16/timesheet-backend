<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timesheet extends Model
{

    use HasFactory;

    protected $table = 'tb_timesheet';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'tanggal',
        'shifting',
        'jam_masuk',
        'jam_pulang',
        'total_jam_kerja',
        'status_kehadiran',
        'kegiatan',
        'id_user',
        'id_project',
        'id_cluster',
    ];

    protected $casts = [
        'tanggal'    => 'datetime:Y-m-d H:i:s',
        'jam_masuk'  => 'datetime:Y-m-d H:i:s',
        'jam_pulang' => 'datetime:Y-m-d H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'id_project', 'id_project');
    }

    public function cluster()
    {
        return $this->belongsTo(Cluster::class, 'id_cluster', 'id_cluster');
    }

    public function aplikasis()
    {
        return $this->belongsToMany(Aplikasi::class, 'tb_aplikasi_timesheet', 'id_timesheet', 'id_aplikasi');
    }
}
