<script>
    // Agregamos un evento onChange al primer select
    $('#country').on('change', function() {
        var countryId = $(this).val(); // Obtenemos el valor seleccionado

        if (countryId) {
            // Si se ha seleccionado un país, hacemos una petición Ajax para obtener las zonaes correspondientes
            $.ajax({
                url: 'direccion/ciudad/' + countryId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Limpiamos las opciones del segundo select
                    $('#state').empty();
                    $('#state').attr('disabled', false);

                    // Agregamos las nuevas opciones al segundo select
                    $('#state').append(
                        '<option value="">Seleccione un estado</option>');
                    $.each(data, function(index, state) {
                        $('#state').append('<option value="' + state.id + '">' +
                            state.name + '</option>');
                    });

                }
            });


        }
    });

    // Agregamos un evento onChange al primer select
    $('#state').on('change', function() {
        var stateId = $(this).val(); // Obtenemos el valor seleccionado

        if (stateId) {
            // Si se ha seleccionado un país, hacemos una petición Ajax para obtener las zonaes correspondientes
            $.ajax({
                url: 'direccion/zona/' + stateId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Limpiamos las opciones del segundo select
                    $('#city').empty();
                    $('#city').attr('disabled', false);

                    // Agregamos las nuevas opciones al segundo select
                    $('#city').append(
                        '<option value="">Seleccione una ciudad</option>');
                    $.each(data, function(index, city) {
                        $('#city').append('<option value="' + city.id + '">' +
                            city.name + '</option>');
                    });
                }
            });


        }
    });

    // combo-zona
    $('#city').on('change', function() {
        var cityId = $(this).val(); // Obtenemos el valor seleccionado

        if (cityId) {
            // Si se ha seleccionado un país, hacemos una petición Ajax para obtener las zonaes correspondientes
            $.ajax({
                url: 'direccion/combo-zona/' + cityId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Limpiamos las opciones del segundo select
                    $('#zone').empty();
                    $('#zone').attr('disabled', false);

                    // Agregamos las nuevas opciones al segundo select
                    $('#zone').append(
                        '<option value="">Seleccione una zona</option>');
                    $.each(data, function(index, zone) {
                        $('#zone').append('<option value="' + zone.id + '">' +
                            zone.name + '</option>');
                    });

                }
            });


        }
    });
</script>
