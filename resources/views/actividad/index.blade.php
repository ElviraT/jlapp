@extends('layouts.base')
@section('content')
    <div class="card p-3">
        <div class="row">
            <div class="col-md-12">
                <h4>Registro de actividades</h4>
            </div>
            <div class="pull-right col-md-12 mb-2" align="right">
                <a class="btn btn-success rounded-circle" data-toggle="modal" data-target="#ActivityModal"
                    href="#add_activity"><i class="fas fa-plus"></i></a>
            </div>
            @include('message')
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="actividad" class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ 'Medico' }}</th>
                                <th>{{ 'Fecha' }}</th>
                                <th>{{ 'Muestra' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->Medical->name . ' ' . $activity->Medical->last_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($activity->created_at)) }}</td>
                                    <td>
                                        @foreach ($activity->MedicalSample as $muestra)
                                            {{ $muestra->Product->name . '-' . $muestra->cantidad }}{{ ', ' }}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('actividad.js')
@endsection
<!-- Modal -->
<div class="modal fade" id="ActivityModal" tabindex="-1" role="dialog" aria-labelledby="ActivityModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="ActivityModalLabel">Agregar Registro de Actividades</h5>
            </div>
            <form action="{{ route('actividad.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="zona">{{ 'Medico' }}</label>
                                <select id="idMedico" name="idMedico" class="input-app" style="width: 100%">
                                    <option></option>
                                    @foreach ($medicos as $medico)
                                        <option value="{{ $medico->id }}">
                                            {{ $medico->name . ' ' . $medico->last_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <strong class="mb-3">
                                    <h3>Muestras Medicas</h3>
                                </strong>
                                <hr>
                                <div class="row p-2 mb-3" style="border: 1px solid #999797">
                                    <div class="col-md-6 mb-3">
                                        <label>{{ 'Muestra' }}</label>
                                        <select id="id_muestra" name="idProduct" class="input-app" style="width: 100%">
                                            <option></option>
                                            @foreach ($muestras as $muestra)
                                                <option value="{{ $muestra->id }}">{{ $muestra->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{ 'Cantidad' }}</label>
                                        <input type="number" id="id_cantidad" name="cantidad">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-primary btn-sm"
                                            onclick="agregarProducto()">Agregar</button>
                                    </div>
                                    <div class="col-md-12">
                                        <table id="TablaPro" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th hidden>id</th>
                                                    <th>Muestra</th>
                                                    <th>Cantidad</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ProSelected">
                                                <!--Ingreso un id al tbody-->
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Observación</label>
                                <textarea name="observation" id="observation" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="guardar" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
