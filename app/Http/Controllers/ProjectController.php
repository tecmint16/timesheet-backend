<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('tb_project')->orderBy('id_project', 'asc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('KODE_PROJECT', 'like', "%{$search}%")
                    ->orWhere('NAMA_PROJECT', 'like', "%{$search}%");
            });
        }
        $projects = $query->get();

        return view('pages.projects.table', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'KODE_PROJECT' => 'required|unique:tb_project,KODE_PROJECT',
            'NAMA_PROJECT' => 'required',
        ]);

        DB::table('tb_project')->insert([
            'KODE_PROJECT' => $request->KODE_PROJECT,
            'NAMA_PROJECT' => $request->NAMA_PROJECT,
        ]);

        return redirect()
            ->route('project.index')
            ->with('success', 'Project added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NAMA_PROJECT' => 'required',
        ]);

        DB::table('tb_project')
            ->where('id_project', $id)
            ->update([
                'NAMA_PROJECT' => $request->NAMA_PROJECT,
            ]);

        return redirect()->route('project.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('tb_project')->where('id_project', $id)->delete();
        return redirect()->route('project.index')->with('success', 'Project deleted successfully.');
    }
}
