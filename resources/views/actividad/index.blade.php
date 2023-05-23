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
                                    <td>{{ $activity->idMedico }}</td>
                                    <td>{{ $activity->created_at }}</td>
                                    <td></td>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#actividad').DataTable({
                dom: 'Bfrtp',
                pageLength: 5,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            });
        });
    </script>
@endsection
<!-- Modal -->
<div class="modal fade" id="ActivityModal" tabindex="-1" role="dialog" aria-labelledby="ActivityModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
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
                                        <option value="{{ $medico->id }}">{{ $medico->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <strong class="mb-3">
                                    <h3>Muestras Medicas</h3>
                                </strong>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label>{{ 'Muestra' }}</label>
                                        <select id="idProduct" name="idProduct" class="input-app" style="width: 100%">
                                            <option></option>
                                            @foreach ($muestras as $muestra)
                                                <option value="{{ $muestra->id }}">{{ $muestra->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>{{ 'Cantidad' }}</label>
                                        <input type="number" id="cantidad" name="cantidad">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <button type="button" class="btn btn-primary btn-sm">Agregar</button>
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
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
