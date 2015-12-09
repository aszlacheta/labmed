@extends('layouts.master')

@section('content')

    <h1>Lista dostępnych materiałów biologicznych</h1>
    <p class="lead">Poniżej znajdziesz wszystkie istniejące materiały biologiczne.</p>
    <hr>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>rodzaj_komorek</th>
            <th>rodzaj_tkanki</th>
            <th>nazwa</th>
            <th>data_zamrozenia</th>
            <th>temperatura_przechowywania</th>
            <th>sposob_utrwalenia</th>
            <th>obserwacje</th>
            <th>rodzaj_probowki</th>
            <th>stezenie</th>
            <th>objetosc_probki</th>
            <th>data_gwarancji</th>
            <th>lokalizacja</th>
            <th>fk_asortyment</th>
            <th>fk_typ</th>
        </tr>
        </thead>
        <tbody>
        @foreach($material_biologiczny as $material)
            <tr>
                <td>{{ $material->id }}</td>
                <td>{{ $material->rodzaj_komorek }}</td>
                <td>{{ $material->rodzaj_tkanki }}</td>
                <td>{{ $material->nazwa }}</td>
                <td>{{ $material->data_zamrozenia }}</td>
                <td>{{ $material->temperatura_przechowywania }}</td>
                <td>{{ $material->sposob_utrwalenia }}</td>
                <td>{{ $material->obserwacje }}</td>
                <td>{{ $material->rodzaj_probowki }}</td>
                <td>{{ $material->stezenie }}</td>
                <td>{{ $material->objetosc_probki }}</td>
                <td>{{ $material->data_gwarancji }}</td>
                <td>{{ $material->lokalizacja }}</td>
                <td>{{ $material->fk_asortyment }}</td>
                <td>{{ $material->materialBiologicznyTyp->nazwa }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <hr>


@stop