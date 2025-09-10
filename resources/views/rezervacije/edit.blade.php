@extends('layouts.app')

@section('content')
    <h1>Izmeni rezervaciju</h1>

    <form action="{{ route('rezervacije.update', $rezervacija) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="soba_id" class="form-label">Soba</label>
            <select name="soba_id" class="form-select" required>
                @foreach($sobe as $soba)
                    <option value="{{ $soba->id }}" 
                        @if($rezervacija->soba_id == $soba->id) selected @endif>
                        {{ $soba->tip_sobe }} - {{ $soba->broj_sobe }} ({{ number_format($soba->cena, 2) }} RSD)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="datum_od" class="form-label">Datum od (dolazak)</label>
            <input type="date" name="datum_od" class="form-control" 
                   value="{{ $rezervacija->datum_od }}" required>
        </div>

        <div class="mb-3">
            <label for="datum_do" class="form-label">Datum do (odlazak)</label>
            <input type="date" name="datum_do" class="form-control" 
                   value="{{ $rezervacija->datum_do }}" required>
        </div>

        <div class="mb-3">
            <label for="napomena" class="form-label">Napomena</label>
            <textarea name="napomena" class="form-control" rows="3">{{ $rezervacija->napomena }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj izmene</button>
        <a href="{{ route('rezervacije.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
@endsection
