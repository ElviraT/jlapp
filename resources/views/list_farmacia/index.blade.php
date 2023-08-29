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
            @include('message')
            <div class="table-responsive">
                <table id="pharmacies" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ 'Nombre' }}</th>
                            <th>{{ 'RIF' }}</th>
                            <th>{{ 'Estado' }}</th>
                            <th>{{ 'Ciudad' }}</th>
                            <th>{{ 'Zona' }}</th>
                            <th>{{ 'Acción' }}</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pharmacies as $key => $pharmacy)
                            <tr>
                                <td>{{ $pharmacy->name }}</td>
                                <td>{{ $pharmacy->rif }}</td>
                                <td>{{ $pharmacy->zone->state->name }}</td>
                                <td>{{ $pharmacy->zone->city->name }}</td>
                                <td>{{ $pharmacy->zone->name }}</td>
                                <td>
                                    <a type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#pharmacyModal" data-record-id="{{ $pharmacy->id }}" href="#pharmacy"
                                        data-toggle="tooltip" data-placement="bottom" title="Editar">
                                        <i class="far fa-edit"></i>
                                    </a>
                                </td>
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
<!-- Modal -->
<div class="modal fade" id="pharmacyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver/Actualizar Farmacia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('farmacia.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <input type="hidden" name="id" id="modal_add_pharmacy_id" value="0">
                            <div class="col-md-4 mb-3">
                                <label>{{ 'Nombre' }}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Ingrese el nombre" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'RIF' }}</label>
                                <input type="text" name="rif" class="form-control" id="rif"
                                    placeholder="Ingrese el RIF" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'Email' }}</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Ingrese el Email" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'SADA' }}</label>
                                <input type="text" name="sada" class="form-control" id="sada"
                                    placeholder="Ingrese el SADA" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'SICM' }}</label>
                                <input type="text" name="sicm" class="form-control" id="sicm"
                                    placeholder="Ingrese el SICM" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'Teléfono' }}</label>
                                <input type="text" name="telefono" class="form-control" id="telefono"
                                    placeholder="Ingrese el Teléfono" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="zona">{{ 'Zona' }}</label>
                                <select id="idZone" name="idZone" class="js-example-basic form-control"
                                    style="width: 100%">
                                    <option></option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->id }}">
                                            {{ $zone->city->name . ' - ' . $zone->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- DATOS DE CONTACTO --}}
                            <div class="col-12">
                                <div class="card p-2" style="border: 1px solid #999797">
                                    <center><strong>Datos de contacto</strong></center>
                                    <div class="row">
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Nombre' }}</label>
                                            <input type="text" name="namec" class="form-control" id="namec"
                                                placeholder="Ingrese el Nombre" required>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Apellido' }}</label>
                                            <input type="text" name="last_name" class="form-control"
                                                id="last_name" placeholder="Ingrese el Apellido" required>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Teléfono 1' }}</label>
                                            <input type="text" name="telephone" class="form-control"
                                                id="telephone" placeholder="Ingrese el Teléfono 1" required>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Teléfono 2' }}</label>
                                            <input type="text" name="telephone2" class="form-control"
                                                id="telephone2" placeholder="Ingrese el Teléfono 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Dirección</label>
                                <textarea name="direccion" id="direccion" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12" id="check" hidden>
                                <label>{{ 'Estatus' }}</label><br>
                                <input type="checkbox" name="status" id="status_check" data-toggle="toggle"
                                    data-style="ios" data-on="Activo" data-off="Inactivo" data-onstyle="success"
                                    data-offstyle="danger" data-width="90" data-height="30">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
