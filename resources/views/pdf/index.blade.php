<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <style>
        .table tbody tr {
            padding: 2px;
        }

        .table-border th {
            border: 1 solid #dfd9d9;
        }

        .table-border td {
            border: 1 solid #dfd9d9;
        }
    </style>
</head>

<body>
    <div>
        <table>
            <thead>
                <tr>
                    <td>
                    </td>
                    <td>
                        <h3>{{ $title }}</h3>
                    </td>
                </tr>
            </thead>
        </table>
        <hr>
        <table width='100%' class="table">
            <thead>
                <tr>
                    <td width='60%' colspan="2">
                        <strong>Datos del Cliente</strong>
                    </td>
                    <td width='40%' colspan="2">
                        <strong>Datos de la Orden</strong>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width='13%'>
                        <small>{{ 'Rif: ' }}</small>
                    </td>
                    <td>
                        <small>{{ $activity->RegisterTransfer[0]->Pharmacy->rif }}</small>
                    </td>
                    <td width='13%'>
                        <small>{{ 'Pedido:' }}</small>
                    </td>
                    <td>{{ $activity->pedido }}</td>
                </tr>
                <tr>
                    <td width='13%'>
                        <small>{{ 'Razón social: ' }}</small>
                    </td>
                    <td>
                        <small>{{ $activity->RegisterTransfer[0]->Pharmacy->name }}</small>
                    </td>
                    <td width='13%'>
                        <small>{{ 'Fecha: ' }}</small>
                    </td>
                    <td>
                        <small>{{ $activity->created_at }}</small>
                    </td>
                </tr>
                <tr>
                    <td width='13%'>
                        <small>{{ 'Contacto: ' }}</small>
                    </td>
                    <td>
                        <small>{{ $activity->RegisterTransfer[0]->Pharmacy->Contact->name . ' ' . $activity->RegisterTransfer[0]->Pharmacy->Contact->last_name }}</small>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td width='13%'>
                        <small>{{ 'SICM / SADA: ' }}</small>
                    </td>
                    <td>
                        @if (isset($activity->RegisterTransfer[0]->Pharmacy->sada))
                            <small>{{ $activity->RegisterTransfer[0]->Pharmacy->sada }}</small>
                        @else
                            <small>{{ $activity->RegisterTransfer[0]->Pharmacy->sicm }}</small>
                        @endif
                    </td>
                    <td colspan="2"><strong>{{ 'Datos del vendedor' }}</strong></td>
                </tr>
                <tr>
                    <td width='13%'>
                        <small>{{ 'Teléfono: ' }}</small>
                    </td>
                    <td>
                        <small>{{ $activity->RegisterTransfer[0]->Pharmacy->telefono }}</small>
                    </td>
                    <td><small>{{ 'Cedula: ' }}</small></td>
                    <td><small>{{ auth()->user()->dni }}</small></td>
                </tr>
                <tr>
                    <td width='13%'>
                        <small>{{ 'Dirección: ' }}</small>
                    </td>
                    <td>
                        <small>{{ $activity->RegisterTransfer[0]->Pharmacy->direccion }}</small>
                    </td>
                    <td><small>{{ 'Nombre:' }}</small></td>
                    <td><small>{{ auth()->user()->name . ' ' . auth()->user()->last_name }}</small></td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td><small>{{ 'Telèfono:' }}</small></td>
                    <td><small>{{ auth()->user()->telephone }}</small></td>
                </tr>
            </tbody>
        </table>
        <br>
        <h3>{{ 'Detalles de la compra' }}</h3>
        <table width='100%' class="table-border">
            <thead>
                <tr>
                    <th>{{ 'Nro.' }}</th>
                    <th>{{ 'Producto' }}</th>
                    <th>{{ 'Cantidad' }}</th>
                    <th>{{ 'Precio Unitario' }}</th>
                    <th>{{ 'Total' }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $cantidad = 0;
                    $total = 0;
                @endphp
                @foreach ($activity->RegisterTransfer as $key => $transferencia)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $transferencia->muestra }}</td>
                        <td>{{ $transferencia->cantidad }}</td>
                        <td>{{ $transferencia->Product->price_tf }}</td>
                        <td></td>
                    </tr>
                    @php
                        $cantidad += $transferencia->cantidad;
                        $total += $transferencia->cantidad * $transferencia->Product->price_tf;
                    @endphp
                @endforeach
                <tr>
                    <th colspan="2"></th>
                    <th>{{ $cantidad }}</th>
                    <th>{{ 'TOTAL' }}</th>
                    <th>{{ $total . ' $' }}</th>
                </tr>
            </tbody>
        </table>
        <br>
        <strong>Nota</strong>
        <small>{{ $activity->observations }}</small>
    </div>
</body>

</html>
