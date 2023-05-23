@extends('layouts.base')
@section('content')
    <div class="card p-3">
        <div class="row">
            <div class="col-md-12">
                <h4>Registro de actividades</h4>
            </div>
            <div class="pull-right col-md-12 mb-2" align="right">
                <a class="btn btn-success rounded-circle" data-toggle="modal" data-target="#Activity_logModal"
                    href="#add_activity_log"><i class="fas fa-plus"></i></a>
            </div>
            @include('message')
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="actividad" class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ 'Farmacia' }}</th>
                                <th>{{ 'Jornada' }}</th>
                                <th>{{ 'Fecha' }}</th>
                                <th>{{ 'Hora' }}</th>
                                <th>{{ 'Transferencia' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $activity->Medical->name }}</td>
                                    <td>
                                        @if ($activity->jornada == 1)
                                            <input type="checkbox" name="status" data-toggle="toggle" data-style="ios"
                                                data-on="Activo" data-off="Inactivo" data-onstyle="success"
                                                data-offstyle="danger" checked disabled data-width="90" data-height="30">
                                        @else
                                            <input type="checkbox" name="status" data-toggle="toggle" data-style="ios"
                                                data-on="Activo" data-off="Inactivo" data-onstyle="success"
                                                data-offstyle="danger" disabled data-width="90" data-height="30">
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($activity->created_at)) }}</td>
                                    <td>{{ date('h:m', strtotime($activity->created_at)) }}</td>
                                    <td>
                                        {{-- @foreach ($activity->MedicalSample as $muestra)
                                            {{ $muestra->Product->name . '-' . $muestra->cantidad }}{{ ', ' }}
                                        @endforeach --}}
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
    @include('actividad_log.js')
@endsection
<!-- Modal -->
<div class="modal fade" id="Activity_logModal" tabindex="-1" role="dialog" aria-labelledby="Activity_logModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="ActivityModalLabel">Agregar Registro de Actividades</h5>
            </div>
            <form action="{{ route('farmacia.actividad.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="zona">{{ 'Farmacia' }}</label>
                                <select id="idPharmacy" name="idPharmacy" class="input-app" style="width: 100%">
                                    <option></option>
                                    @foreach ($farmacias as $farmacia)
                                        <option value="{{ $farmacia->id }}">{{ $farmacia->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>{{ 'Jornada' }}</label><br>
                                <input type="checkbox" name="jornada" value="1" id="jornada" data-toggle="toggle"
                                    data-on="Si" data-off="No" data-size="sm" data-width="30">
                            </div>
                            <div class="col-md-12">
                                <div id="transferencia">
                                    <strong class="mb-3">
                                        <h3>Registrar Transferencia</h3>
                                    </strong>
                                    <hr>
                                    <div class="row p-2 mb-3" style="border: 1px solid #999797">
                                        <div class="col-md-6 mb-3">
                                            <label>{{ 'Medicina' }}</label>
                                            <select id="id_muestra" name="idProduct" class="input-app"
                                                style="width: 100%">
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
                                        <div class="col-md-6 mb-3">
                                            <label>{{ 'Farmaceutica' }}</label>
                                            <select id="idPharmacyT" name="idPharmacyT" class="input-app"
                                                style="width: 100%">
                                                <option></option>
                                                @foreach ($farmacias as $farmacia)
                                                    <option value="{{ $farmacia->id }}">{{ $farmacia->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
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
                                <div id="Rjornada" hidden>
                                    <strong class="mb-3">
                                        <h3>Registrar Jornada</h3>
                                    </strong>
                                    <hr>
                                    <div class="row p-2 mb-3" style="border: 1px solid #999797">
                                        <div class="col-md-6 mb-3">
                                            <label>{{ 'Desde' }}</label>
                                            <input type="time" name="desde" id="desde" class="input-app">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label>{{ 'Hasta' }}</label>
                                            <input type="time" name="hasta" id="hasta" class="input-app">
                                        </div>
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
