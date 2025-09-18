<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aplikasi extends Model
{
    protected $table = 'TB_APLIKASI';
    protected $primaryKey = 'ID_APLIKASI';
    protected $fillable = [
        'NAMA_APLIKASI',
    ];

    public function projects()
    {
        return $this->hasMany(Project::class, 'ID_APLIKASI', 'ID_APLIKASI');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'tb_aplikasi_user', 'id_aplikasi', 'id_user');
    }

    public function timesheets()
    {
        return $this->belongsToMany(User::class, 'tb_aplikasi_timesheet', 'id_aplikasi', 'id_timesheet');
    }
}
