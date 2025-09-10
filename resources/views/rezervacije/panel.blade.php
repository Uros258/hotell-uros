@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Recepcionerski panel</h1>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Gost</th>
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
                    <td>{{ $rezervacija->korisnik->ime }} {{ $rezervacija->korisnik->prezime }}</td>
                    <td>{{ $rezervacija->datum_od }}</td>
                    <td>{{ $rezervacija->datum_do }}</td>
                    <td>{{ $rezervacija->soba->tip_sobe ?? '-' }}</td>
                    <td>{{ $rezervacija->soba->broj_sobe ?? '-' }}</td>
                    <td>{{ $rezervacija->status->naziv_statusa }}</td>
                    <td>
                        @if($rezervacija->status->naziv_statusa === 'Potvrđena')
                            <form action="{{ route('rezervacije.checkin', $rezervacija) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Prijavi gosta</button>
                            </form>
                        @endif

                        @if(in_array($rezervacija->status->naziv_statusa, ['Kreirana','Potvrđena']))
                            <form action="{{ route('rezervacije.cancel', $rezervacija) }}" method="POST" class="d-inline"
                                  onsubmit="return confirm('Da li želite da otkažete ovu rezervaciju?');">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Otkaži</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
