@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Moje rezervacije</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Datum od</th>
                <th>Datum do</th>
                <th>Tip sobe</th>
                <th>Broj sobe</th>
                <th>Status</th>
                <th>Akcije</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rezervacije as $rezervacija)
                <tr>
                    <td>{{ $rezervacija->id }}</td>
                    <td>{{ $rezervacija->datum_od }}</td>
                    <td>{{ $rezervacija->datum_do }}</td>
                    <td>{{ $rezervacija->soba->tip_sobe ?? '-' }}</td>
                    <td>{{ $rezervacija->soba->broj_sobe ?? '-' }}</td>
                    <td>{{ $rezervacija->status->naziv_statusa ?? '-' }}</td>
                    <td>
                        <a href="{{ route('rezervacije.show', $rezervacija) }}" class="btn btn-info btn-sm">Detalji</a>

                        @if(in_array($rezervacija->status->naziv_statusa, ['Kreirana','Potvrđena']))
                            <form action="{{ route('rezervacije.cancel', $rezervacija) }}" method="POST" class="d-in
