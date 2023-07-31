<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="/admin/vendors/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="/admin/vendors/css/vendor.bundle.base.css"/>
    <link rel="stylesheet" href="/admin/vendors/jvectormap/jquery-jvectormap.css"/>
    <link rel="stylesheet" href="/admin/vendors/flag-icon-css/css/flag-icon.min.css"/>
    <link rel="stylesheet" href="/admin/vendors/owl-carousel-2/owl.carousel.min.css"/>
    <link rel="stylesheet" href="/admin/vendors/owl-carousel-2/owl.theme.default.min.css"/>
    <link rel="stylesheet" href="/admin/css/style.css"/>
    <link rel="shortcut icon" href="/admin/images/favicon.png" />
    <style>
        .myAlert {
            position: fixed;
            bottom: 2%;
            right: 2%;
            z-index: 100000;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @if (session()->has('message'))
            <div class="alert alert-success myAlert">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            </div>
        @endif
        @include('layouts.admin.sidebar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.admin.header')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('layouts.admin.footer')
            </div>
        </div>
    </div>

    {{-- Personal JS --}}

    {{-- <script>
        function myAlertTop() {
            $(".myAlert").show();
            setTimeout(() => {
                $(".myAlert").hide();
            }, 2000);
        }
    </script> --}}

    <script src="/admin/vendors/js/vendor.bundle.base.js"></script>

    <script src="/admin/vendors/chart.js/Chart.min.js"></script>
    <script src="/admin/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="/admin/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="/admin/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/admin/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="/admin/js/off-canvas.js"></script>
    <script src="/admin/js/hoverable-collapse.js"></script>
    <script src="/admin/js/misc.js"></script>
    <script src="/admin/js/settings.js"></script>
    <script src="/admin/js/todolist.js"></script>
    <script src="/admin/js/dashboard.js"></script>
</body>

</html>
