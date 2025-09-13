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
}
