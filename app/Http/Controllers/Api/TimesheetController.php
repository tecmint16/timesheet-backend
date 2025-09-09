<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Timesheet;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function index()
    {
        return response()->json(Timesheet::all());
    }

    public function show($id)
    {
        $timesheet = Timesheet::find($id);
        if (!$timesheet) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($timesheet);
    }

    public function store(Request $request)
    {
        $timesheet = Timesheet::create($request->all());
        return response()->json($timesheet, 201);
    }

    public function update(Request $request, $id)
    {
        $timesheet = Timesheet::find($id);
        if (!$timesheet) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $timesheet->update($request->all());
        return response()->json($timesheet);
    }

    public function destroy($id)
    {
        $timesheet = Timesheet::find($id);
        if (!$timesheet) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        $timesheet->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
