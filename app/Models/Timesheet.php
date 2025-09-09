<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Timesheet extends Model
{

    use HasFactory;

    protected $table = 'TB_TIMESHEET';
    protected $primaryKey = 'ID';
    public $timestamps = false;

    protected $fillable = [
        'TANGGAL',
        'SHIFTING',
        'JAM_MASUK',
        'JAM_PULANG',
        'TOTAL_JAM_KERJA',
        'STATUS_KEHADIRAN',
        'PROJECT',
        'KODE_PROJECT',
        'CLUSTER',
        'APLIKASI',
        'KEGIATAN',
        'ID_USER',
        'ID_PROJECT',
    ];

    protected $casts = [
        'TANGGAL'    => 'datetime:Y-m-d H:i:s',
        'JAM_MASUK'  => 'datetime:Y-m-d H:i:s',
        'JAM_PULANG' => 'datetime:Y-m-d H:i:s',
    ];
}
