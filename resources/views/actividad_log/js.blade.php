<script>
    $(document).ready(function() {
        $("#jornada").on('change', function(e) {
            if ($(this).is(":checked")) {
                $('#transferencia').attr('hidden', true);
                $('#Rjornada').attr('hidden', false);
            } else {
                $('#transferencia').attr('hidden', false);
                $('#Rjornada').attr('hidden', true);
            }
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
        var pharsel = $('#idPharmacyT').find(':selected').val(); //Capturo el Value del Producto
        var phartext = $('#idPharmacyT').find(':selected')
            .text(); //Capturo el Nombre del Producto- Texto dentro del Select
        var cantidad = $('#id_cantidad').val();

        var newtr = '<tr class="item"  data-id="' + sel + '">';
        newtr = newtr + '<td hidden><input name="muestra_id[' + j + ']" value="' + sel + '" required /></td>';
        newtr = newtr + '<td hidden><input name="idPharmacyT[' + j + ']" value="' + pharsel + '" required /></td>';
        newtr = newtr + '<td><input  class="form-control" name="muestra[' + j + ']" value="' + text +
            '" required /></td>';
        newtr = newtr + '<td><input  class="form-control" name="cantidad[' + j + ']" value="' + cantidad +
            '" required /></td>';
        newtr = newtr + '<td><input  class="form-control" name="pharmat[' + j + ']" value="' + phartext +
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

    $(window).on("load", function(e) {
        var idurl = new URLSearchParams(location.search);
        var id = idurl.get('id');
        if (id != null) {
            let url = '{{ route('genera.pdf', ['id' => ':id']) }}';
            url = url.replace(':id', id);
            $(location).attr('href', url);
        }
    });
</script>
