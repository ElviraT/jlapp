@extends('layouts.base')
@section('content')
    <div class="card p-2">
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="row">
                        <div class="pull-left col-md-6" align="left">
                            <h3>Listado de Medicos en tu zona</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="medicos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ 'Nombre' }}</th>
                            <th>{{ 'Especialidad' }}</th>
                            <th>{{ 'Email' }}</th>
                            <th>{{ 'Estado' }}</th>
                            <th>{{ 'Ciudad' }}</th>
                            <th>{{ 'Zona' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicals as $medical)
                            <tr>
                                <td>{{ $medical->name . ' ' . $medical->last_name }}</td>
                                <td>{{ $medical->Specialty->name }}</td>
                                <td>{{ $medical->email }}</td>
                                <td>{{ $medical->zone->state->name }}</td>
                                <td>{{ $medical->zone->city->name }}</td>
                                <td>{{ $medical->zone->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('list_medical.js')
@endsection
