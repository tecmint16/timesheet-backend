<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cluster;

class ClusterController extends Controller
{
    public function index(Request $request)
    {
        $query = Cluster::orderBy('ID_CLUSTER', 'asc');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ID_CLUSTER', 'like', "%{$search}%")
                    ->orWhere('NAMA_CLUSTER', 'like', "%{$search}%");
            });
        }
        $clusters = $query->get();

        return view('pages.clusters.table', compact('clusters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'NAMA_CLUSTER' => 'required',
        ]);

        Cluster::create([
            'NAMA_CLUSTER' => $request->NAMA_CLUSTER,
        ]);

        return redirect()
            ->route('cluster.index')
            ->with('success', 'Cluster added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NAMA_CLUSTER' => 'required',
        ]);

        Cluster::where('ID_CLUSTER', $id)
            ->update([
                'NAMA_CLUSTER' => $request->NAMA_CLUSTER,
            ]);

        return redirect()
            ->route('cluster.index')
            ->with('success', 'Cluster updated successfully.');
    }

    public function destroy($id)
    {
        Cluster::where('ID_CLUSTER', $id)->delete();
        return redirect()
            ->route('cluster.index')
            ->with('success', 'Cluster deleted successfully.');
    }
}
