<script type="text/javascript">
    $(function() {
        $('#hlui').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hluf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $("#hlui").on("dp.change", function(e) {
            $('#hluf').data("DateTimePicker").minDate(e.date);
        });
        $("#hluf").on("dp.change", function(e) {
            $('#hlui').data("DateTimePicker").maxDate(e.date);
        });
        $('#hmai').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hmaf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $("#hmai").on("dp.change", function(e) {
            $('#hmaf').data("DateTimePicker").minDate(e.date);
        });
        $("#hmaf").on("dp.change", function(e) {
            $('#hmai').data("DateTimePicker").maxDate(e.date);
        });
        $('#hmii').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hmif').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $("#hmii").on("dp.change", function(e) {
            $('#hmif').data("DateTimePicker").minDate(e.date);
        });
        $("#hmif").on("dp.change", function(e) {
            $('#hmii').data("DateTimePicker").maxDate(e.date);
        });
        $('#hjui').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hjuf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $("#hjui").on("dp.change", function(e) {
            $('#hjuf').data("DateTimePicker").minDate(e.date);
        });
        $("#hjuf").on("dp.change", function(e) {
            $('#hjui').data("DateTimePicker").maxDate(e.date);
        });
        $('#hvii').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hvif').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $("#hvii").on("dp.change", function(e) {
            $('#hvif').data("DateTimePicker").minDate(e.date);
        });
        $("#hvif").on("dp.change", function(e) {
            $('#hvii').data("DateTimePicker").maxDate(e.date);
        });
        $('#hsai').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hsaf').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $("#hsai").on("dp.change", function(e) {
            $('#hsaf').data("DateTimePicker").minDate(e.date);
        });
        $("#hsaf").on("dp.change", function(e) {
            $('#hsai').data("DateTimePicker").maxDate(e.date);
        });
        $('#hdoi').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
        });
        $('#hdof').datetimepicker({
            useCurrent: false,
            format: 'hh:mm',
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
