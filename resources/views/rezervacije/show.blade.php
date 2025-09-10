@extends('layouts.app')

@section('content')
    <h1>Detalji rezervacije</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Gost:</strong> {{ $rezervacija->korisnik->ime }} {{ $rezervacija->korisnik->prezime }}</p>
            <p><strong>Soba:</strong> {{ $rezervacija->soba->tip_sobe ?? '-' }} (Broj: {{ $rezervacija->soba->broj_sobe ?? '-' }})</p>
            <p><strong>Datum od:</strong> {{ $rezervacija->datum_od }}</p>
            <p><strong>Datum do:</strong> {{ $rezervacija->datum_do }}</p>
            <p><strong>Status:</strong> {{ $rezervacija->status->naziv_statusa ?? '-' }}</p>
            <p><strong>Napomena:</strong> {{ $rezervacija->napomena ?? '-' }}</p>
        </div>
    </div>

    <div class="mt-3">
        @if(in_array($rezervacija->status->naziv_statusa, ['Kreirana','Potvrđena']))
