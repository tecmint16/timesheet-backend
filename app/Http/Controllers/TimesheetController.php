<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimesheetController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->input('bulan', date('m')); // default bulan sekarang
        $tahun = date('Y'); // default tahun sekarang
        // Pastikan kolom tanggal di database, misal: TANGGAL
        $countHadir = DB::table('tb_timesheet')
            ->where('STATUS_KEHADIRAN', 'Hadir')
            ->whereMonth('TANGGAL', $bulan)
            ->whereYear('TANGGAL', $tahun)
            ->count();
        $countIzin = DB::table('tb_timesheet')
            ->where('STATUS_KEHADIRAN', 'Izin')
            ->whereMonth('TANGGAL', $bulan)
            ->whereYear('TANGGAL', $tahun)
            ->count();
        $countSakit = DB::table('tb_timesheet')
            ->where('STATUS_KEHADIRAN', 'Sakit')
            ->whereMonth('TANGGAL', $bulan)
            ->whereYear('TANGGAL', $tahun)
            ->count();
        $countAlpa = DB::table('tb_timesheet')
            ->where('STATUS_KEHADIRAN', 'Alpa')
            ->whereMonth('TANGGAL', $bulan)
            ->whereYear('TANGGAL', $tahun)
            ->count();
        $countShifting2 = DB::table('tb_timesheet')
            ->where('SHIFTING', '2')
            ->whereMonth('TANGGAL', $bulan)
            ->whereYear('TANGGAL', $tahun)
            ->count();
        $countShifting3 = DB::table('tb_timesheet')
            ->where('SHIFTING', '3')
            ->whereMonth('TANGGAL', $bulan)
            ->whereYear('TANGGAL', $tahun)
            ->count();
        $totalKehadiran = $countHadir + $countIzin + $countSakit + $countAlpa;

        return view('pages.timesheets.index', [
            'countHadir' => $countHadir,
            'countIzin' => $countIzin,
            'countSakit' => $countSakit,
            'countAlpa' => $countAlpa,
            'totalKehadiran' => $totalKehadiran,
            'countShifting2' => $countShifting2,
            'countShifting3' => $countShifting3,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }

    public function table(Request $request)
    {
        // Fetch users from the database (you can customize this as needed)
        $timesheets = DB::table('tb_timesheet')
            // Apply search filter if provided
            ->when($request->input('id'), function ($query, $id) {
                return $query->where('id', 'like', '%' . $id . '%');
            })
            // Order by latest
            ->orderBy('id', 'asc')
            // Paginate results
            ->paginate(10);
        // $users = User::paginate(10);
        // Return the view
        return view('pages.timesheets.table', compact('timesheets'));
    }
}
