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
                                    <td>{{ $activity->Pharmacy->name }}</td>
                                    <td>
                                        @if ($activity->jornada == 1)
                                            <input type="checkbox" name="status" data-toggle="toggle" data-style="ios"
                                                data-on="Si" data-off="No" data-onstyle="success" data-offstyle="default"
                                                checked disabled data-size="mini">
                                        @else
                                            <input type="checkbox" name="status" data-toggle="toggle" data-style="ios"
                                                data-off="No" disabled data-size="mini" data-offstyle="warning">
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y', strtotime($activity->created_at)) }}</td>
                                    @if (isset($activity->RegisterWorkingday))
                                        <td>
                                            {{ $activity->RegisterWorkingday->desde . '-' . $activity->RegisterWorkingday->hasta }}{{ ', ' }}
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if (isset($activity->RegisterTransfer))
                                        <td>
                                            @foreach ($activity->RegisterTransfer as $muestra)
                                                {{ $muestra->Product->name . '-' . $muestra->cantidad }}{{ ', ' }}
                                            @endforeach
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
<!-- Modal Actividad -->
<div class="modal fade" id="Activity_logModal" tabindex="-1" role="dialog" aria-labelledby="Activity_logModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="ActivityModalLabel">Agregar Registro de Actividades</h5>
            </div>
            <form action="{{ route('farmacia.actividad.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <input type="hidden" id="id_muestra">
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
                                            <div class="input-group">
                                                <input type="text" id="name_muestra" class="input-app" readonly>
                                                <div class="input-group-btn">
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#CatalogoModal">{{ 'Catálogo' }}</button>
                                                </div>
                                            </div>
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
                                                        <th hidden>idphar</th>
                                                        <th>Medicina</th>
                                                        <th>Cantidad</th>
                                                        <th>Farmaceutica</th>
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
                    <button type="submit" id="guardar" class="btn btn-primary"
                        onclick="enviar_pdf()">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Modal catálogo --}}
<div class="modal fade" id="CatalogoModal" tabindex="-1" role="dialog" aria-labelledby="Catalogo_ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content p-2">
            <div class="modal-header">
                <h5 class="modal-title" id="CatalogoModalLabel">Agregar Medicina</h5>
                <button type="button" class="close btn btn-light" data-dismiss="modal"
                    aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12" style="border: 1px solid #999797">
                    <div class="row p-3">
                        <table id="TablaCatalogo" class="table table-hover" style="width: 100%">
                            <thead>
                                <tr>
                                    <th hidden>id</th>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!--Ingreso un id al tbody-->
                                @foreach ($muestras as $muestra)
                                    <tr style="cursor: hand">
                                        <td hidden>{{ $muestra->id }}</td>
                                        <td><img class="img-fluid img-drogueria"
                                                src="{{ env('APP_URL_WEB') . $muestra->img }}"></td>
                                        <td>{{ $muestra->name }}</td>
                                        <td>{{ $muestra->price_tf }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@section('js')
    @include('actividad_log.js')
@endsection
