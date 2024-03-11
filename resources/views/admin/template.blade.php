<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ ($pageName ?? 'Dashboard') . ' | Admin Panel - ' . $site_name }}</title>

        <!-- Favicon icon -->
        <x-favicon />

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">

        @stack('style')

        <style>
            .new-message {
                background-color: aliceblue;
            }
        </style>
    </head>
    <body class="hold-transition layout-top-nav layout-navbar-fixed layout-fixed text-sm">
        <div class="wrapper">

            <!-- Preloader -->
            @include('admin.partials.preloader')

            <!-- Navbar -->
            @include('admin.partials.navbar-menu')
            <!-- /.navbar -->

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper pt-3">
                <!-- Content Header (Page header) -->
                <div class="content-header pt-4">
                    <div class="container">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                @yield('header')
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    @yield('breadcrumb')
                                </ol>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        @yield('content')
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Logout Modal -->
            <x-widgets.modal.logout />
            <!-- Main Footer -->
            <footer class="main-footer float-button button-0">
                <!-- To the right -->
                <div class="float-right d-none d-sm-inline">
                    @include('version')
                </div>
                <!-- Default to the left -->
                <x-copyright />
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>

        <!-- App Js -->
        <script src="{{ asset('assets/admin/js/app.js') }}"></script>

        @stack('script')
    </body>
</html>
