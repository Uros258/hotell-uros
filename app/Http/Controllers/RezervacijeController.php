<?php

namespace App\Http\Controllers;

use App\Models\Rezervacija;
use App\Models\Soba;
use App\Models\Status;
use Illuminate\Http\Request;

class RezervacijeController extends Controller
{
    public function index()
    {
        $rezervacije = Rezervacija::with(['korisnik', 'soba', 'status'])
            ->where('korisnik_id', auth()->id())
            ->get();

        return view('rezervacije.index', compact('rezervacije'));
    }

    public function create()
    {
        $sobe = Soba::where('status_sobe', 'slobodna')->get();
        return view('rezervacije.create', compact('sobe'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'soba_id'   => 'required|exists:sobe,id',
            'datum_od'  => 'required|date',
            'datum_do'  => 'required|date|after_or_equal:datum_od',
            'napomena'  => 'nullable|string',
        ]);

        $validated['korisnik_id'] = auth()->id();
        $validated['status_id'] = Status::where('naziv_statusa', 'Kreirana')->first()->id;

        Rezervacija::create($validated);

        return redirect()->route('rezervacije.index')->with('success', 'Rezervacija je uspešno kreirana.');
    }

    public function show($id)
    {
        $rezervacija = Rezervacija::with(['korisnik', 'soba', 'status'])->findOrFail($id);

        if (auth()->id() !== $rezervacija->korisnik_id && !auth()->user()->can('is-admin')) {
            abort(403);
        }

        return view('rezervacije.show', compact('rezervacija'));
    }

    public function edit(Rezervacija $rezervacija)
    {
        if (auth()->id() !== $rezervacija->korisnik_id && !auth()->user()->can('is-admin')) {
            abort(403);
        }

        $sobe = Soba::where('status_sobe', 'slobodna')
            ->orWhere('id', $rezervacija->soba_id)
            ->get();

        return view('rezervacije.edit', compact('rezervacija', 'sobe'));
    }

    public function update(Request $request, Rezervacija $rezervacija)
    {
        if (auth()->id() !== $rezervacija->korisnik_id && !auth()->user()->can('is-admin')) {
            abort(403);
        }

        $validated = $request->validate([
            'soba_id'   => 'required|exists:sobe,id',
            'datum_od'  => 'required|date',
            'datum_do'  => 'required|date|after:datum_od',
            'napomena'  => 'nullable|string',
        ]);

        $rezervacija->update($validated);

        return redirect()->route('rezervacije.show', $rezervacija)
                        ->with('success', 'Rezervacija je uspešno izmenjena.');
    }

    public function destroy($id)
    {
        Rezervacija::findOrFail($id)->delete();
        return redirect()->route('rezervacije.index')->with('success', 'Rezervacija obrisana.');
    }

    public function cancel(Rezervacija $rezervacija)
    {
        if (auth()->id() !== $rezervacija->korisnik_id && !auth()->user()->can('is-admin')) {
            abort(403);
        }

        if (in_array($rezervacija->status->naziv_statusa, ['Kreirana','Potvrđena'])) {
            $rezervacija->status_id = Status::where('naziv_statusa', 'Otkazana')->first()->id;
            $rezervacija->save();
            return redirect()->back()->with('success', 'Rezervacija je otkazana.');
        }

        return redirect()->back()->with('error', 'Ova rezervacija se ne može otkazati.');
    }

    public function panel()
    {
        if (!auth()->user()->can('is-admin')) {
            abort(403);
        }

        $rezervacije = Rezervacija::with(['korisnik', 'soba', 'status'])
            ->orderBy('datum_od', 'desc')
            ->get();

        return view('rezervacije.panel', compact('rezervacije'));
    }

    public function checkin(Rezervacija $rezervacija)
    {
        if (!auth()->user()->can('is-admin')) {
            abort(403);
        }

        if ($rezervacija->status->naziv_statusa === 'Potvrđena') {
            $rezervacija->status_id = Status::where('naziv_statusa', 'Prijavljen')->first()->id;
            $rezervacija->save();
            return redirect()->back()->with('success', 'Gost je uspešno prijavljen.');
        }

        return redirect()->back()->with('error', 'Check-in nije moguć za ovaj status.');
    }
}
