<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi;
use App\Models\Cluster;
use App\Models\Project;
use App\Models\Timesheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    public function index(Request $id)
    {
        $user = Auth::user();

        // Ambil data timesheet berdasarkan user yang login
        $timesheets = Timesheet::with(['user', 'project', 'cluster'])
            ->where('ID_USER', $user->id)
            ->orderBy('TANGGAL', 'desc')
            ->paginate(10);

        $projects = Project::all();
        $clusters = Cluster::all();
        $applications = Aplikasi::all();

        $userProjects = $user->project ?? 'No Project Assigned';
        $userClusters = $user->cluster ?? 'No Cluster Assigned';
        // dd($timesheets->toArray());

        return view('pages.timesheets.table', compact('timesheets', 'user', 'projects', 'clusters', 'applications', 'userProjects', 'userClusters'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tanggal'           => 'required|date_format:Y-m-d H:i:s',
        //     'jam_masuk_oracle'  => 'required|date_format:Y-m-d H:i:s',
        //     'jam_pulang_oracle' => 'required|date_format:Y-m-d H:i:s',
        //     'total_jam'         => 'required',
        //     'shifting'          => 'nullable|integer',
        //     'status_kehadiran'  => 'nullable|string',
        //     'kegiatan'          => 'nullable|string',
        //     'id_user'           => 'required|integer',
        //     'id_project'        => 'nullable|integer',
        //     'id_cluster'        => 'nullable|integer',
        // ]);

        try {
            // Simpan ke database
            $timesheet = Timesheet::create($request->only([
                'tanggal',
                'shifting',
                'jam_masuk',
                'jam_pulang',
                'total_jam_kerja',
                'status_kehadiran',
                'kegiatan',
                'id_user',
                'id_project',
                'id_cluster'
            ]));
            $timesheet->aplikasis()->sync($request->input('aplikasi_ids', []));

            return redirect()->route('timesheet.index')->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }

        return redirect()
            ->route('timesheet.index')
            ->with('success', 'Application added successfully.');
    }

    // public function table(Request $request)
    // {
    //     // Fetch users from the database (you can customize this as needed)
    //     $timesheets = DB::table('tb_timesheet')
    //         // Apply search filter if provided
    //         ->when($request->input('id'), function ($query, $id) {
    //             return $query->where('id', 'like', '%' . $id . '%');
    //         })
    //         // Order by latest
    //         ->orderBy('id', 'asc')
    //         // Paginate results
    //         ->paginate(10);
    //     // $users = User::paginate(10);
    //     // Return the view
    //     return view('pages.timesheets.table', compact('timesheets'));
    // }
}
