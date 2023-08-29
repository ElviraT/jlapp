@extends('layouts.base')
@section('content')
    <div class="card p-1">
        @include('message')
        <div class="row mt-1">
            <form action="{{ route('farmacia.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <input type="hidden" name="id" id="modal_add_pharmacy_id" value="0">
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Nombre' }}</label>
                                <input type="text" name="name" id="name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'RIF' }}</label>
                                <input type="text" name="rif" id="rif" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'SADA' }}</label>
                                <input type="text" name="sada" id="sada" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'SICM' }}</label>
                                <input type="text" name="sicm" id="sicm" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Email' }}</label>
                                <input type="email" name="email" id="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Teléfono' }}</label>
                                <input type="text" name="telefono" id="telefono" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country">{{ 'País' }}</label>
                                <select id="country" name="idCountry" class="input-app" style="width: 100%">
                                    <option></option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">{{ 'Estado' }}</label>
                                <select id="state" name="idState" class="input-app" style="width: 100%" disabled>
                                    <option></option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">{{ 'Ciudad' }}</label>
                                <select id="city" name="idCity" class="input-app" style="width: 100%" disabled>
                                    <option></option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="zona">{{ 'Zona' }}</label>
                                <select id="zone" name="idZone" class="input-app" style="width: 100%" disabled>
                                    <option></option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->id }}">
                                            {{ $zone->city->name . ' - ' . $zone->name }}
                                        </option>
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
@section('js')
    @include('farmacia.js')
@endsection
