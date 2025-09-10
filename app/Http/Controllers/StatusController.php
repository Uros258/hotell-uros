<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::all();
        return view('statuses.index', compact('statuses'));
    }

    public function create()
    {
        return view('statuses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv_statusa' => 'required|string|unique:statuses',
        ]);

        Status::create($validated);

        return redirect()->route('statuses.index')->with('success', 'Status created successfully.');
    }

    public function show($id)
    {
        $status = Status::findOrFail($id);
        return view('statuses.show', compact('status'));
    }

    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('statuses.edit', compact('status'));
    }

    public function update(Request $request, $id)
    {
        $status = Status::findOrFail($id);

        $validated = $request->validate([
            'naziv_statusa' => 'required|string|unique:statuses,naziv_statusa,' . $status->id,
        ]);

        $status->update($validated);

        return redirect()->route('statuses.index')->with('success', 'Status updated successfully.');
    }

    public function destroy($id)
    {
        Status::findOrFail($id)->delete();
        return redirect()->route('statuses.index')->with('success', 'Status deleted successfully.');
    }
}
