<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timesheets = Timesheet::where("user_id", Auth::id())->get();
        return view('timesheets.index', compact('timesheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('timesheets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'difficulties' => 'nullable|string',
            'next_plan' => 'nullable|string',
        ]);

        Timesheet::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'difficulties' => $request->difficulties,
            'next_plan' => $request->next_plan,
        ]);

        return redirect()->route('timesheets.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view('timesheets.show', compact('timesheet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        return view('timesheets.edit', compact('timesheet'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->delete();

        return redirect()->route('timesheets.index');
    }
}
