<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TimesheetController extends Controller
{

    public function index()
    {
        $timesheets = Timesheet::where("user_id", Auth::id())->get();
        return view('timesheets.index', compact('timesheets'));
    }

    public function create()
    {
        return view('timesheets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'difficulties' => 'nullable|string',
            'next_plan' => 'nullable|string',
        ]);

        Timesheet::create([
            'user_id' => 1,
            'date' => $request->date,
            'difficulties' => $request->difficulties,
            'next_plan' => $request->next_plan,
        ]);

        return redirect()->route('timesheets.index');
    }

    public function show(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view('timesheets.show', compact('timesheet'));
    }
    public function edit(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view('timesheets.edit', compact('timesheet'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'date' => 'required|date',
            'difficulties' => 'nullable|string',
            'next_plan' => 'nullable|string',
        ]);

        $timesheet = Timesheet::findOrFail($id);
        $timesheet->update([
            'date' => $request->date,
            'difficulties' => $request->difficulties,
            'next_plan' => $request->next_plan,
        ]);

        return redirect()->route('timesheets.show', $timesheet->id);
    }

    public function destroy(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->delete();

        return redirect()->route('timesheets.index');
    }
}
