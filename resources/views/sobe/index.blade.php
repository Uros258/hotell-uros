@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Lista soba</h1>

    <a href="{{ route('sobe.create') }}" class="btn btn-primary mb-3">Dodaj novu sobu</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Broj sobe</th>
                <th>Tip sobe</th>
                <th>Cena (RSD)</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sobe as $soba)
                <tr>
                    <td>{{ $soba->id }}</td>
                    <td>{{ $soba->broj_sobe }}</td>
                    <td>{{ $soba->tip_sobe }}</td>
                    <td>{{ number_format($soba->cena, 2) }}</td>
                    <td>{{ $soba->status_sobe }}</td>
                    <td>
                        <a href="{{ route('sobe.show', $soba) }}" class="btn btn-info btn-sm">Prikaži</a>
                        <a href="{{ route('sobe.edit', $soba) }}" class="btn btn-warning btn-sm">Izmeni</a>
                        <form action="{{ route('sobe.destroy', $soba) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Da li ste sigurni da želite da obrišete sobu?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Obriši</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
