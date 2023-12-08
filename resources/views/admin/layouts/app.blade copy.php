<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('page-title','Dashboard') | {{config('app.name')}}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugin/datatables/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugin/datatables/dataTables.bootstrap5.min.css">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/css/ebazar.style.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    <div id="ebazar-layout" class="theme-blue">

        <!-- sidebar -->
        @include('admin.layouts.sidebar')

        <!-- main body area -->
        <div class="main">
            @include('admin.layouts.navigation')
            @yield('content')
        </div>

    </div>
    @include('admin.layouts.setting_modal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <!-- Jquery Core Js -->
    <script src="{{ asset('admin') }}/assets/bundles/libscripts.bundle.js"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('admin') }}/assets/bundles/apexcharts.bundle.js"></script>
    <script src="{{ asset('admin') }}/assets/bundles/dataTables.bundle.js"></script>

    <!-- Jquery Page Js -->
    <script src="{{ asset('admin') }}/assets/js/template.js"></script>
    <script src="{{ asset('admin') }}/assets/js/page/index.js"></script>
    

    <script>
        $('#myDataTable')
        .addClass( 'nowrap')
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
    </script>
</body>
</html>
