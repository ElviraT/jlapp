@extends('layouts.base')
@section('content')
    <div class="card p-1">
        <div class="row mt-1">
            <form action="{{ route('cliente.store') }}" method="post">
                @csrf
                <div class="col-12 mb-2">
                    <label>Rif: *</label>
                    <input type="text" name="rif" required>
                </div>
                <div class="col-12 mb-2">
                    <label>Razón social: *</label>
                    <input type="text" name="razon_social" required>
                </div>
                <div class="col-12 mb-2">
                    <label>Contacto: *</label>
                    <input type="text" name="contacto" required>
                </div>
                <div class="col-12 mb-2">
                    <label>SICM/SADA: *</label>
                    <input type="text" name="sicm_sada" required>
                </div>
                <div class="col-12 mb-2">
                    <label> Segmento: *</label>
                    <select class="input-app" name="segmento">
                        <option selected></option>
                        <option value="cs">Centro de salud</option>
                        <option value="dg">Drogueria</option>
                        <option value="tf">Transferencia</option>
                    </select>
                </div>
                <div class="col-12 mb-2">
                    <label>Correo electrónico: *</label>
                    <input type="email" name="correo" required>
                </div>
                <div class="col-12 mb-2">
                    <label>Teléfono: *</label>
                    <input type="text" name="telefono" required>
                </div>
                <div class="col-12 mb-2">
                    <label>Direccón: *</label>
                    <input type="text" name="direccion" required>
                </div>

                <div class="col-12 mt-2 mb-3" align='center'>
                    <button type="button" class="btn btn-danger">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
