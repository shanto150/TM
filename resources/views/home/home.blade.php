<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>

    <link rel="icon" href="{{ url('/resources/images/appimages/lo.png') }}">
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('/resources/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet"href="{{ asset('/resources/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('/resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}" />

    {{-- datepicker --}}
    <link rel="stylesheet" href="{{ asset('/resources/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <!-- toast CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

    <link rel="stylesheet" href="{{ asset('/resources/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('/resources/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">


    <!-- Animation $ Icons -->
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/resources/css/wickedcss.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resources/css/hover-min.css') }}">

    {{-- floating levels --}}
    <link rel="stylesheet" href="{{ asset('/resources/css/floating-labels.css') }}">

    {{-- Clock --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.css">




    @stack('style')
    <style>
        @font-face {
            font-family: 'montserrat';
            src: url("{{ asset('/fonts/poppins/Poppins-ExtraBold.ttf') }}");
        }

        option {
            zoom: 1.2
        }

        .sh1 {
            display: inline-block;
            margin: 0;
            line-height: 1em;
            font-family: montserrat;
            font-weight: bolder;
            font-size: 25px;
            background: #FFFFFF;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .select2-selection--single {
            height: 36px !important;
            border-color: #ced4da !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 34px;
            position: absolute;
            top: 1px;
            right: 1px;
            width: 20px;
        }

        .select2 {
            width: 100% !important;
            padding: 0;
        }

        .circle-icon {
            width: 25px;
            height: 25px;
            background: #0069d960;
            line-height: 21px;
            text-align: center;
            vertical-align: middle;
            padding: 1px 1px 0px 0px;
            margin-top: 3px;
            border-radius: 50%;
        }

        .circle-icon i {
            color: #0069D9;
            margin-top: 3px;
            text-shadow: 1px 1px 1px #011122;
            font-size: 14px;
        }
    </style>


</head>

<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed ">

    <div class="wrapper">

        @include('layouts.top-navbar')

        @include('layouts.sidebar')

        <div class="content-wrapper" style="background-image: linear-gradient(to bottom,#7da0be,#ffffff);">
            <div class="content-header"></div>
            @yield('content')
        </div>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>

        @include('layouts.footer')

    </div>


    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('/resources/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('/resources/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/resources/plugins/jszip/jszip.min.js') }}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="{{ asset('/resources/js/adminlte.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <!-- Page specific script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
    <script src="{{ asset('/resources/js/myfunctions.js') }}"></script>

    {{-- datepicker --}}
    <script src="{{ asset('/resources/plugins/daterangepicker/daterangepicker.js') }}"></script>

    {{-- Clock --}}
    <script src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@v1.0.2-rc2/mdtimepicker.min.js"></script>

    <script src="{{ asset('/resources/plugins/select2/js/select2.full.min.js') }}"></script>

    <script>
        var url = window.location;
        $('ul.nav-sidebar a').filter(function() {
            return this.href == url;
        }).addClass('active bg-primary');

        $('ul.nav-treeview a').filter(function() {
            return this.href == url;
        }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open');

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

    @stack('script')
</body>

</html>
