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
</script>
