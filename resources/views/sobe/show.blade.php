@extends('layouts.app')

@section('content')
    <h1>Detalji sobe</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Broj sobe:</strong> {{ $soba->broj_sobe }}</p>
            <p><strong>Tip sobe:</strong> {{ $soba->tip_sobe }}</p>
            <p><strong>Cena:</strong> {{ number_format($soba->cena, 2) }} RSD</p>
            <p><strong>Status:</strong> {{ $soba->status_sobe }}</p>
        </div>
    </div>

    <a href="{{ route('sobe.index') }}" class="btn btn-secondary mt-3">Nazad</a>
@endsection
