<script type="text/javascript">
    $(document).ready(function() {
        $('#pharmacies').DataTable({
            dom: 'Bfrtp',
            pageLength: 5,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        });
    });

    $('#pharmacyModal').on('show.bs.modal', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        if (data.recordId != undefined) {
            modal.addClass('loading');
            $('#modal_add_pharmacy_id').val(data.recordId);
            $.getJSON('farmacia/' + data.recordId, function(data) {
                var pharma = data[0];
                var contact = data[1];

                $('#name', modal).val(pharma.name);
                $('#rif', modal).val(pharma.rif);
                $('#sada', modal).val(pharma.sada);
                $('#sicm', modal).val(pharma.sicm);
                $('#email', modal).val(pharma.email);
                $('#telefono', modal).val(pharma.telefono);
                $('#direccion', modal).val(pharma.direccion);
                $('#idZone', modal).val(pharma.idZone).trigger('change.select2');
                $('#check').attr('hidden', false);
                if (pharma.status == 1) {
                    $('#status_check').bootstrapToggle('on');
                }
                $('#namec').val(contact.name);
                $('#last_name').val(contact.last_name);
                $('#telephone').val(contact.telephone);
                $('#telephone2').val(contact.telephone2);
                modal.removeClass('loading');
            });
        }
    });
    $('#pharmacyModal').on('hidden.bs.modal', function(e) {
        $('#name').val('');
        $('#rif').val('');
        $('#sada').val('');
        $('#sicm').val('');
        $('#dicm').val('');
        $('#telefono').val('');
        $('#direccion').val('');
        $('#idZone').val('').trigger('change.select2');
        $('#check').attr('hidden', true);
        $('#status_check').bootstrapToggle('on');
        $('#namec').val('');
        $('#last_name').val('');
        $('#telephone').val('');
        $('#telephone2').val('');

    });
</script>
