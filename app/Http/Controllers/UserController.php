<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Fetch users from the database (you can customize this as needed)
        $users = DB::table('users')
            // Apply search filter if provided
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            // Order by latest
            ->orderBy('id', 'desc')
            // Paginate results
            ->paginate(10);
        // $users = User::paginate(10);
        // Return the view with users data
        return view('pages.users.index', compact('users'));
    }
}
