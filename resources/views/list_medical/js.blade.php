<script type="text/javascript">
    $(document).ready(function() {
        $('#medicos').DataTable({
            dom: 'Bfrtp',
            pageLength: 5,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
        });
    });

    $('#medicoModal').on('show.bs.modal', function(e) {
        var modal = $(e.delegateTarget),
            data = $(e.relatedTarget).data();
        if (data.recordId != undefined) {
            modal.addClass('loading');
            $('#modal_add_medico_id').val(data.recordId);
            $.getJSON('medico/' + data.recordId, function(data) {
                var medical = data[0];
                var horario = data[1];
                $('#name', modal).val(medical.name);
                $('#last_name', modal).val(medical.last_name);
                $('#email', modal).val(medical.email);
                $('#direccion', modal).val(medical.direccion);
                $('#matricula', modal).val(medical.matricula);
                $('#numero_colegio', modal).val(medical.numero_colegio);
                $('#idZone', modal).val(medical.idZone).trigger('change.select2');
                $('#idSpecialty', modal).val(medical.idSpecialty).trigger('change.select2');
                $('#idModality', modal).val(medical.idModality).trigger('change.select2');
                $('#check').attr('hidden', false);
                if (medical.status == 1) {
                    $('#status_check').bootstrapToggle('on');
                }
                if (horario.monday == 1) {
                    $('#lunes').bootstrapToggle('on');
                    $('#hlui', modal).val(horario.start_time_Mon);
                    $('#hluf', modal).val(horario.end_time_Mon);
                }
                if (horario.tuesday == 1) {
                    $('#martes').bootstrapToggle('on');
                    $('#hmai', modal).val(horario.start_time_Tue);
                    $('#hmaf', modal).val(horario.end_time_Tue);
                }
                if (horario.wednesday == 1) {
                    $('#miercoles').bootstrapToggle('on');
                    $('#hmii', modal).val(horario.start_time_Wed);
                    $('#hmif', modal).val(horario.end_time_Wed);
                }
                if (horario.thursday == 1) {
                    $('#jueves').bootstrapToggle('on');
                    $('#hjui', modal).val(horario.start_time_Thu);
                    $('#hjuf', modal).val(horario.end_time_Thu);
                }
                if (horario.friday == 1) {
                    $('#viernes').bootstrapToggle('on');
                    $('#hvii', modal).val(horario.start_time_Fri);
                    $('#hvif', modal).val(horario.end_time_Fri);
                }
                if (horario.saturday == 1) {
                    $('#sabado').bootstrapToggle('on');
                    $('#hsai', modal).val(horario.start_time_Sat);
                    $('#hsaf', modal).val(horario.end_time_Sat);
                }
                if (horario.sunday == 1) {
                    $('#domingo').bootstrapToggle('on');
                    $('#hdoi', modal).val(horario.start_time_Sun);
                    $('#hdof', modal).val(horario.end_time_Sun);
                }
                modal.removeClass('loading');
            });
        }
    });
    $('#medicoModal').on('hidden.bs.modal', function(e) {
        $('#name').val('');
        $('#last_name').val('');
        $('#direccion').val('');
        $('#matricula').val('');
        $('#numero_colegio').val('');
        $('#idZone').val('').trigger('change.select2');
        $('#idSpecialty').val('').trigger('change.select2');
        $('#idModality').val('').trigger('change.select2');
        $('#check').attr('hidden', true);
        $('#status_check').bootstrapToggle('on');
        $('#lunes').bootstrapToggle('off');
        $('#martes').bootstrapToggle('off');
        $('#miercoles').bootstrapToggle('off');
        $('#jueves').bootstrapToggle('off');
        $('#viernes').bootstrapToggle('off');
        $('#sabado').bootstrapToggle('off');
        $('#domingo').bootstrapToggle('off');
        $('#hlui').val('');
        $('#hluf').val('');
        $('#hmai').val('');
        $('#hmaf').val('');
        $('#hmii').val('');
        $('#hmif').val('');
        $('#hjui').val('');
        $('#hjuf').val('');
        $('#hvii').val('');
        $('#hvif').val('');
        $('#hsai').val('');
        $('#hsaf').val('');
        $('#hdoi').val('');
        $('#hdof').val('');
    });

    $(function() {
        $('#hlui').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hluf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hlui").on("dp.change", function(e) {
            $('#hluf').data("DateTimePicker").minDate(e.date);
        });
        $("#hluf").on("dp.change", function(e) {
            $('#hlui').data("DateTimePicker").maxDate(e.date);
        });
        $('#hmai').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hmaf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hmai").on("dp.change", function(e) {
            $('#hmaf').data("DateTimePicker").minDate(e.date);
        });
        $("#hmaf").on("dp.change", function(e) {
            $('#hmai').data("DateTimePicker").maxDate(e.date);
        });
        $('#hmii').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hmif').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hmii").on("dp.change", function(e) {
            $('#hmif').data("DateTimePicker").minDate(e.date);
        });
        $("#hmif").on("dp.change", function(e) {
            $('#hmii').data("DateTimePicker").maxDate(e.date);
        });
        $('#hjui').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hjuf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hjui").on("dp.change", function(e) {
            $('#hjuf').data("DateTimePicker").minDate(e.date);
        });
        $("#hjuf").on("dp.change", function(e) {
            $('#hjui').data("DateTimePicker").maxDate(e.date);
        });
        $('#hvii').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hvif').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hvii").on("dp.change", function(e) {
            $('#hvif').data("DateTimePicker").minDate(e.date);
        });
        $("#hvif").on("dp.change", function(e) {
            $('#hvii').data("DateTimePicker").maxDate(e.date);
        });
        $('#hsai').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hsaf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hsai").on("dp.change", function(e) {
            $('#hsaf').data("DateTimePicker").minDate(e.date);
        });
        $("#hsaf").on("dp.change", function(e) {
            $('#hsai').data("DateTimePicker").maxDate(e.date);
        });
        $('#hdoi').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $('#hdof').datetimepicker({
            useCurrent: false,
            format: 'hh:mm A',
        });
        $("#hdoi").on("dp.change", function(e) {
            $('#hdof').data("DateTimePicker").minDate(e.date);
        });
        $("#hdof").on("dp.change", function(e) {
            $('#hdoi').data("DateTimePicker").maxDate(e.date);
        });
    });
    $(function() {
        $('#lunes').change(function() {
            var lu = $(this).prop('checked');
            if (lu == true) {
                document.getElementById('div_lunes').style.display = 'block';
                $('#hlui').attr('required', true);
                $('#hluf').attr('required', true);
            } else {
                document.getElementById('div_lunes').style.display = 'none';
                $('#hlui').attr('required', false);
                $('#hluf').attr('required', false);
            }
        });
        $('#martes').change(function() {
            var ma = $(this).prop('checked');
            if (ma == true) {
                document.getElementById('div_martes').style.display = 'block';
                $('#hmai').attr('required', true);
                $('#hmaf').attr('required', true);
            } else {
                document.getElementById('div_martes').style.display = 'none';
                $('#hmai').attr('required', false);
                $('#hmaf').attr('required', false);
            }
        });
        $('#miercoles').change(function() {
            var mi = $(this).prop('checked');
            if (mi == true) {
                document.getElementById('div_miercoles').style.display = 'block';
                $('#hmii').attr('required', true);
                $('#hmif').attr('required', true);
            } else {
                document.getElementById('div_miercoles').style.display = 'none';
                $('#hmii').attr('required', false);
                $('#hmif').attr('required', false);
            }
        });
        $('#jueves').change(function() {
            var ju = $(this).prop('checked');
            if (ju == true) {
                document.getElementById('div_jueves').style.display = 'block';
                $('#hjui').attr('required', true);
                $('#hjuf').attr('required', true);
            } else {
                document.getElementById('div_jueves').style.display = 'none';
                $('#hjui').attr('required', false);
                $('#hjuf').attr('required', false);
            }
        });
        $('#viernes').change(function() {
            var vi = $(this).prop('checked');
            if (vi == true) {
                document.getElementById('div_viernes').style.display = 'block';
                $('#hvii').attr('required', true);
                $('#hvif').attr('required', true);
            } else {
                document.getElementById('div_viernes').style.display = 'none';
                $('#hvii').attr('required', false);
                $('#hvif').attr('required', false);
            }
        });
        $('#sabado').change(function() {
            var sa = $(this).prop('checked');
            if (sa == true) {
                document.getElementById('div_sabado').style.display = 'block';
                $('#hsai').attr('required', true);
                $('#hsaf').attr('required', true);
            } else {
                document.getElementById('div_sabado').style.display = 'none';
                $('#hsai').attr('required', false);
                $('#hsaf').attr('required', false);
            }
        });
        $('#domingo').change(function() {
            var dom = $(this).prop('checked');
            if (dom == true) {
                document.getElementById('div_domingo').style.display = 'block';
                $('#hdoi').attr('required', true);
                $('#hdof').attr('required', true);
            } else {
                document.getElementById('div_domingo').style.display = 'none';
                $('#hdoi').attr('required', false);
                $('#hdof').attr('required', false);
            }
        });
    });
</script>
