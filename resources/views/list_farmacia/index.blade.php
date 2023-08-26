@extends('layouts.base')
@section('content')
    <div class="card p-2">
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="row">
                        <div class="pull-left col-md-6" align="left">
                            <h3>Listado de farmacias en tu zona</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="pharmacies" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ 'Nombre' }}</th>
                            <th>{{ 'RIF' }}</th>
                            <th>{{ 'Email' }}</th>
                            <th>{{ 'Estado' }}</th>
                            <th>{{ 'Ciudad' }}</th>
                            <th>{{ 'Zona' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pharmacies as $key => $pharmacy)
                            <tr>
                                <td>{{ $pharmacy->name }}</td>
                                <td>{{ $pharmacy->rif }}</td>
                                <td>{{ $pharmacy->email }}</td>
                                <td>{{ $pharmacy->zone->state->name }}</td>
                                <td>{{ $pharmacy->zone->city->name }}</td>
                                <td>{{ $pharmacy->zone->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('list_farmacia.js')
@endsection
