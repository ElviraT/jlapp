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
            @include('message')
            <div class="table-responsive">
                <table id="medicos" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>{{ 'Nombre' }}</th>
                            <th>{{ 'Especialidad' }}</th>
                            <th>{{ 'Estado' }}</th>
                            <th>{{ 'Ciudad' }}</th>
                            <th>{{ 'Zona' }}</th>
                            <th>{{ 'Acción' }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicals as $medical)
                            <tr>
                                <td>{{ $medical->name . ' ' . $medical->last_name }}</td>
                                <td>{{ $medical->Specialty->name }}</td>
                                <td>{{ $medical->zone->state->name }}</td>
                                <td>{{ $medical->zone->city->name }}</td>
                                <td>{{ $medical->zone->name }}</td>
                                <td>
                                    <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#medicoModal"
                                        data-record-id="{{ $medical->id }}" href="#add_medico">
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
    @include('list_medical.js')
@endsection
<!-- Modal -->
<div class="modal fade" id="medicoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ver/Actualizar Medico</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('medico.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <input type="hidden" name="id" id="modal_add_medico_id" value="0">
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Nombre' }}</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    placeholder="Ingrese el nombre" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Apellido' }}</label>
                                <input type="text" name="last_name" class="form-control" id="last_name"
                                    placeholder="Ingrese el Apellido" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Email' }}</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Ingrese el Email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Matricula' }}</label>
                                <input type="text" name="matricula" class="form-control" id="matricula"
                                    placeholder="Ingrese el Matricula" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>{{ 'Número de colegio' }}</label>
                                <input type="text" name="numero_colegio" class="form-control" id="numero_colegio"
                                    placeholder="Ingrese el Número de colegio" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="especialidad">{{ 'Especialidad' }}</label>
                                <select id="idSpecialty" name="idSpecialty" class="js-example-basic form-control"
                                    style="width: 100%">
                                    <option></option>
                                    @foreach ($specialities as $speciality)
                                        <option value="{{ $speciality->id }}">{{ $speciality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="zona">{{ 'Zona' }}</label>
                                <select id="idZone" name="idZone" class="js-example-basic form-control"
                                    style="width: 100%">
                                    <option></option>
                                    @foreach ($zones as $zone)
                                        <option value="{{ $zone->id }}">
                                            {{ $zone->city->name . ' - ' . $zone->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="modalidad">{{ 'Modalidad' }}</label>
                                <select id="idModality" name="idModality" class="js-example-basic form-control"
                                    style="width: 100%">
                                    <option></option>
                                    @foreach ($modalities as $modality)
                                        <option value="{{ $modality->id }}">{{ $modality->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                {{-- LUNES --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="monday" value="1" id="lunes"
                                                data-toggle="toggle" data-on="Lunes" data-off="lunes" data-size="sm"
                                                data-width="90" data-height="30">
                                        </div>
                                        <div id="div_lunes" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Mon"
                                                        placeholder="Hora inicio" id="hlui" />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Mon"
                                                        placeholder="Hora fin" id="hluf" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE LUNES --}}
                                {{-- MARTES --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="tuesday" value="1" id="martes"
                                                data-toggle="toggle" data-on="Martes" data-off="martes"
                                                data-width="90" data-height="30" data-size="xs">
                                        </div>
                                        <div id="div_martes" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Tue"
                                                        placeholder="Hora inicio" id='hmai' />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Tue"
                                                        placeholder="Hora fin" id='hmaf' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE MARTES --}}
                                {{-- MIERCOLES --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="wednesday" value="1" id="miercoles"
                                                data-toggle="toggle" data-on="Miércoles" data-off="miércoles"
                                                data-width="90" data-height="30" data-size="xs">
                                        </div>
                                        <div id="div_miercoles" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Wed"
                                                        placeholder="Hora inicio" id="hmii" />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Wed"
                                                        placeholder="Hora fin" id="hmif" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE MIERCOLES --}}
                                {{-- JUEVES --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="thursday" value="1" id="jueves"
                                                data-toggle="toggle" data-on="Jueves" data-off="jueves"
                                                data-width="90" data-height="30" data-size="xs">
                                        </div>
                                        <div id="div_jueves" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Thu"
                                                        placeholder="Hora inicio" id="hjui" />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Thu"
                                                        placeholder="Hora fin" id="hjuf" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE JUEVES --}}
                                {{-- VIERNES --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="friday" value="1" id="viernes"
                                                data-toggle="toggle" data-on="Viernes" data-off="viernes"
                                                data-width="90" data-height="30" data-size="xs">
                                        </div>
                                        <div id="div_viernes" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Fri"
                                                        placeholder="Hora inicio" id="hvii" />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Fri"
                                                        placeholder="Hora fin" id="hvif" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE VIERNES --}}
                                {{-- SABADO --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="saturday" value="1" id="sabado"
                                                data-toggle="toggle" data-on="Sábado" data-off="sábado"
                                                data-width="90" data-height="30" data-size="xs">
                                        </div>
                                        <div id="div_sabado" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Sat"
                                                        placeholder="Hora inicio" id="hsai" />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Sat"
                                                        placeholder="Hora fin" id="hsaf" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE SABADO --}}
                                {{-- DOMINGO --}}
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 mt-3">
                                            <input type="checkbox" name="sunday" value="1" id="domingo"
                                                data-toggle="toggle" data-on="Domingo" data-off="domingo"
                                                data-width="90" data-height="30" data-size="xs">
                                        </div>
                                        <div id="div_domingo" class="col-md-9 mt-2" style="display: none">
                                            <div class="row">
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="start_time_Sun"
                                                        placeholder="Hora inicio" id="hdoi" />
                                                </div>
                                                <div class='col-md-6'>
                                                    <input type='text' class="form-control" name="end_time_Sun"
                                                        placeholder="Hora fin" id="hdof" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- FIN DE DOMINGO --}}
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Dirección</label>
                                <textarea name="direccion" id="direccion" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3" id="check" hidden>
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
