@extends('layouts.base')
@section('content')
    <div class="card p-1">
        <div class="row mt-1">
            <form action="{{ route('farmacia.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <input type="hidden" name="id" id="modal_add_pharmacy_id" value="0">
                            <div class="col-md-4 mb-3">
                                <label>{{ 'Nombre' }}</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'RIF' }}</label>
                                <input type="text" name="rif" id="rif" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'SADA' }}</label>
                                <input type="text" name="sada" id="sada" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'SICM' }}</label>
                                <input type="text" name="sicm" id="sicm" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'DICM' }}</label>
                                <input type="text" name="dicm" id="dicm" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>{{ 'Teléfono' }}</label>
                                <input type="text" name="telefono" id="telefono" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="zona">{{ 'Zona' }}</label>
                                <select id="idZone" name="idZone" class="input-app" style="width: 100%">
                                    <option></option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- DATOS DE CONTACTO --}}
                            <div class="col-12">
                                <div class="card p-2">
                                    <center><strong>Datos de contacto</strong></center>
                                    <div class="row">
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Nombre' }}</label>
                                            <input type="text" name="namec" id="namec" required>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Apellido' }}</label>
                                            <input type="text" name="last_name" id="last_name" required>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Teléfono 1' }}</label>
                                            <input type="text" name="telephone" id="telephone" required>
                                        </div>
                                        <div class="col-md-6 mt-2 mb-3">
                                            <label>{{ 'Teléfono 2' }}</label>
                                            <input type="text" name="telephone2" id="telephone2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Dirección</label>
                                <textarea name="direccion" id="direccion" rows="3"></textarea>
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
                <div class="col-12 mt-2 mb-3" align='center'>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
