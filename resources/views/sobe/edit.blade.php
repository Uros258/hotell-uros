@extends('layouts.app')

@section('content')
    <h1>Izmena sobe</h1>

    <form action="{{ route('sobe.update', $soba) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="broj_sobe" class="form-label">Broj sobe</label>
            <input type="number" name="broj_sobe" class="form-control" value="{{ $soba->broj_sobe }}" required>
        </div>

        <div class="mb-3">
            <label for="tip_sobe" class="form-label">Tip sobe</label>
            <select name="tip_sobe" class="form-select" required>
                <option value="jednokrevetna" @if($soba->tip_sobe == 'jednokrevetna') selected @endif>Jednokrevetna</option>
                <option value="dvokrevetna" @if($soba->tip_sobe == 'dvokrevetna') selected @endif>Dvokrevetna</option>
                <option value="apartman" @if($soba->tip_sobe == 'apartman') selected @endif>Apartman</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena (RSD)</label>
            <input type="number" name="cena" step="0.01" class="form-control" value="{{ $soba->cena }}" required>
        </div>

        <div class="mb-3">
            <label for="status_sobe" class="form-label">Status sobe</label>
            <select name="status_sobe" class="form-select" required>
                <option value="slobodna" @if($soba->status_sobe == 'slobodna') selected @endif>Slobodna</option>
                <option value="zauzeta" @if($soba->status_sobe == 'zauzeta') selected @endif>Zauzeta</option>
                <option value="na održavanju" @if($soba->status_sobe == 'na održavanju') selected @endif>Na održavanju</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj izmene</button>
        <a href="{{ route('sobe.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
@endsection
