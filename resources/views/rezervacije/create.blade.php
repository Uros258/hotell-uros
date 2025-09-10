@extends('layouts.app')

@section('content')
    <h1>Kreiraj rezervaciju</h1>

    <form action="{{ route('rezervacije.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="soba_id" class="form-label">Soba</label>
            <select name="soba_id" class="form-select" required>
                @foreach($sobe as $soba)
                    <option value="{{ $soba->id }}">
                        {{ $soba->tip_sobe }} - {{ $soba->broj_sobe }} ({{ number_format($soba->cena, 2) }} RSD)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="datum_od" class="form-label">Datum od (dolazak)</label>
            <input type="date" name="datum_od" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="datum_do" class="form-label">Datum do (odlazak)</label>
            <input type="date" name="datum_do" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="napomena" class="form-label">Napomena (opciono)</label>
            <textarea name="napomena" class="form-control" rows="3"></textarea>
        </d
