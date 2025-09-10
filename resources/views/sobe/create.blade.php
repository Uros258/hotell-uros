@extends('layouts.app')

@section('content')
    <h1>Dodaj sobu</h1>

    <form action="{{ route('sobe.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="broj_sobe" class="form-label">Broj sobe</label>
            <input type="number" name="broj_sobe" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tip_sobe" class="form-label">Tip sobe</label>
            <select name="tip_sobe" class="form-select" required>
                <option value="jednokrevetna">Jednokrevetna</option>
                <option value="dvokrevetna">Dvokrevetna</option>
                <option value="apartman">Apartman</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="cena" class="form-label">Cena (RSD)</label>
            <input type="number" name="cena" step="0.01" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status_sobe" class="form-label">Status sobe</label>
            <select name="status_sobe" class="form-select" required>
                <option value="slobodna">Slobodna</option>
                <option value="zauzeta">Zauzeta</option>
                <option value="na održavanju">Na održavanju</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Sačuvaj</button>
        <a href="{{ route('sobe.index') }}" class="btn btn-secondary">Nazad</a>
    </form>
@endsection
