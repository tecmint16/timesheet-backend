<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Cluster;
use App\Models\Aplikasi;

class UserController extends Controller
{
    public function index(Request $id)
    {
        $users = User::with(['project.cluster', 'project.aplikasi'])
            ->orderBy('id', 'asc')
            ->paginate(10)
            ->withQueryString();

        $projects = Project::all();
        $clusters = Cluster::all();
        $applications = Aplikasi::all();

        return view('pages.users.index', compact('users', 'projects', 'clusters', 'applications'));
    }

    public function store(Request $request)
    {
        $user = User::create($request->only(['name', 'email', 'phone', 'id_project', 'id_cluster']));
        $user->aplikasis()->sync($request->input('aplikasi_ids', []));
        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_project' => 'required|exists:tb_project,id_project',
            'id_cluster' => 'required|exists:tb_cluster,id_cluster',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email', 'phone', 'id_project', 'id_cluster']));
        $user->aplikasis()->sync($request->input('aplikasi_ids', []));
        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }
}
