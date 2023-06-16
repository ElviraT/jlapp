<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/icon.png') }}">

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap4-toggle.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- stilos personalizados --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    @yield('css')

</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- ========== Menu ========== -->
        @include('layouts.menu_left')
        <!-- ========== Left menu End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- ========== Topbar Start ========== -->
            @include('layouts.menu_top')
            <!-- ========== Topbar End ========== -->

            <div class="content">
                <!-- Start Content-->
                <div class="container-fluid p-0">
                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- end row -->
                </div> <!-- container -->
            </div> <!-- content -->

            <!-- Footer Start -->
            @yield('footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Theme Settings -->
    @include('layouts.config_theme')

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script src="{{ asset('assets/js/moment.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap4-toggle.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var valor = $('#rol').val();
            if (valor == 'Visitador') {
                $('#predeterminado').bootstrapToggle('on');
            } else {
                $('#predeterminado').bootstrapToggle('off');
            }

            $("#predeterminado").on('change', function(e) {
                var rol = ''
                if ($(this).is(":checked")) {
                    rol = 'Visitador';
                } else {
                    rol = 'Promotor';
                }
                let url = '{{ route('cambio.rol', ['rol' => ':rol']) }}';
                url = url.replace(':rol', rol);
                $.getJSON(url, function(data) {
                    if (data == 'success') {
                        $(location).attr('href', '{{ route('dashboard') }}');
                    }
                })
            })
            window.setTimeout(function() {
                $(".alert-block").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 5000);
        })

        $(document).ready(function() {
            var pageRefresh = 60000; //1 m
            setInterval(function() {
                refresh();
            }, pageRefresh);
        });

        // Functions

        function refresh() {
            $('#div_notify').load(location.href + " #div_notify");
        }
    </script>

    @yield('js')

</body>

</html>
