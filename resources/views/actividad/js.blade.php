<script type="text/javascript">
    $(document).ready(function() {
        $('#actividad').DataTable({
            dom: 'frtp',
            pageLength: 8,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        });
    });
    var j = 0;

    function RefrescaProducto() {
        var sel = $('#id_muestra').val('');
        var cantidad = $('#id_cantidad').val('');
    }

    function agregarProducto() {

        var sel = $('#id_muestra').find(':selected').val(); //Capturo el Value del Producto
        var text = $('#id_muestra').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select
        var cantidad = $('#id_cantidad').val();

        var newtr = '<tr class="item"  data-id="' + sel + '">';
        newtr = newtr + '<td hidden><input name="muestra_id[' + j + ']" value="' + sel + '" required /></td>';
        newtr = newtr + '<td><input  class="form-control" name="muestra[' + j + ']" value="' + text +
            '" required /></td>';
        newtr = newtr + '<td><input  class="form-control" name="cantidad[' + j + ']" value="' + cantidad +
            '" required /></td>';
        newtr = newtr +
            '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';

        $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected
        j++;
        RefrescaProducto(); //Refresco Productos

        $('.remove-item').off().click(function(e) {
            $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
            if ($('#ProSelected tr.item').length == 0)
                $('#ProSelected .no-item').slideDown(300);
            j--;
            RefrescaProducto();
        });
    }
    $(document).ready(function() {
        // Agregamos un evento onChange al primer select
        $('#Medico').on('change', function() {
            var MedicoId = $(this).val(); // Obtenemos el valor seleccionado
            var textmed = $('#Medico').find(':selected').text();

            if (MedicoId) {
                // Si se ha seleccionado un país, hacemos una petición Ajax para obtener las zonaes correspondientes
                $.ajax({
                    url: 'categoria/' + MedicoId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        // Limpiamos las opciones del segundo select
                        $('#id_muestra').empty();
                        $('#id_muestra').attr('disabled', false);

                        // Agregamos las nuevas opciones al segundo select
                        $('#id_muestra').append(
                            '<option value="">Seleccione una muestra</option>');
                        $.each(data, function(index, muestra) {
                            $('#id_muestra').append('<option value="' + muestra.id +
                                '">' +
                                muestra.name + '</option>');
                        });
                    }
                    // $('#id_muestra').change();
                });
            }
            $('#medico_not').val(textmed.trim());
        });
    });

    $(window).on("load", function(e) {
        var idurl = new URLSearchParams(location.search);
        var id = idurl.get('id');
        if (id != null) {
            let url = '{{ route('genera.pdf_med', ['id' => ':id']) }}';
            url = url.replace(':id', id);
            $(location).attr('href', url);
        }
    });
</script>
