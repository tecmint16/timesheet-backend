<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aplikasi;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = Aplikasi::orderBy('ID_APLIKASI', 'asc');

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

        Aplikasi::create([
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

        Aplikasi::where('ID_APLIKASI', $id)
            ->update([
                'NAMA_APLIKASI' => $request->NAMA_APPLICATION,
            ]);

        return redirect()
            ->route('application.index')
            ->with('success', 'Application updated successfully.');
    }

    public function destroy($id)
    {
        Aplikasi::where('ID_APLIKASI', $id)->delete();
        return redirect()
            ->route('application.index')
            ->with('success', 'Application deleted successfully.');
    }
}
