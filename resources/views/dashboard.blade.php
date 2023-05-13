@extends('layouts.base')
@section('content')
    <div class="tab-content pt-0">
        @include('vista_menu_inferior.index')
    </div>
@endsection
@section('footer')
    @include('layouts.footer')
@endsection
@section('js')
    <script>
        $(function() {
            var valor = $('#rol').val();
            if (valor == 'Visitador') {
                $('#predeterminado').bootstrapToggle('on');
            }
        })

        $("#predeterminado").on("change", function(e) {
            var rol = ''
            if ($(this).is(":checked")) {
                rol = 'Visitador';
            } else {
                rol = 'Promotor';
            }
            $.getJSON('cambio-rol/' + rol, function(data) {
                if (data == 'success') {
                    location.reload();
                }
            })
        })
    </script>
@endsection
