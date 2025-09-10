<?php

namespace App\Http\Controllers;

use App\Models\Soba;
use Illuminate\Http\Request;

class SobeController extends Controller
{
    public function index()
    {
        $sobe = Soba::all();
        return view('sobe.index', compact('sobe'));
    }

    public function create()
    {
        return view('sobe.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'status_sobe' => 'required|string|max:255',
            'tip_sobe'    => 'required|string|max:255',
            'broj_sobe'   => 'required|integer|unique:sobe',
            'cena'        => 'required|numeric|min:0',
        ]);

        Soba::create($validated);

        return redirect()->route('sobe.index')->with('success', 'Room created successfully.');
    }

    public function show($id)
    {
        $soba = Soba::findOrFail($id);
        return view('sobe.show', compact('soba'));
    }

    public function edit($id)
    {
        $soba = Soba::findOrFail($id);
        return view('sobe.edit', compact('soba'));
    }

    public function update(Request $request, $id)
    {
        $soba = Soba::findOrFail($id);

        $validated = $request->validate([
            'status_sobe' => 'required|string|max:255',
            'tip_sobe'    => 'required|string|max:255',
            'broj_sobe'   => 'required|integer|unique:sobe,broj_sobe,' . $soba->id,
            'cena'        => 'required|numeric|min:0',
        ]);

        $soba->update($validated);

        return redirect()->route('sobe.index')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        Soba::findOrFail($id)->delete();
        return redirect()->route('sobe.index')->with('success', 'Room deleted successfully.');
    }
}
