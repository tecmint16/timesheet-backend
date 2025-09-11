<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = DB::table('TB_APLIKASI')->orderBy('ID_APLIKASI', 'asc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ID_APLIKASI', 'like', "%{$search}%")
                    ->orWhere('NAMA_APLIKASI', 'like', "%{$search}%");
            });
        }
        $applications = $query->get();

        return view('pages.applications.table', compact('applications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA_APPLICATION' => 'required',
        ]);

        DB::table('TB_APLIKASI')->insert([
            'NAMA_APLIKASI' => $request->NAMA_APPLICATION,
        ]);

        return redirect()
            ->route('application.index')
            ->with('success', 'Application added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NAMA_APPLICATION' => 'required',
        ]);

        DB::table('TB_APLIKASI')
            ->where('ID_APLIKASI', $id)
            ->update([
                'NAMA_APLIKASI' => $request->NAMA_APPLICATION,
            ]);

        return redirect()
            ->route('application.index')
            ->with('success', 'Application updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('TB_APLIKASI')->where('ID_APLIKASI', $id)->delete();
        return redirect()
            ->route('application.index')
            ->with('success', 'Application deleted successfully.');
    }
}
