<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>{{ $title." - ".ENV('APP_NAME') }}</title>
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <meta name="msapplication-TileColor" content="#206bc4"/>
        <meta name="theme-color" content="#206bc4"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes"/>
        <meta name="HandheldFriendly" content="True"/>
        <meta name="MobileOptimized" content="320"/>
        <meta name="robots" content="noindex,nofollow,noarchive"/>
        <link rel="icon" href="{{ asset('template/admin/favicon.ico') }}" type="image/x-icon"/>
        <link rel="shortcut icon" href="{{ asset('template/admin/favicon.ico') }}" type="image/x-icon"/>
        <!-- CSS files -->
        <link rel="stylesheet" href="{{ asset('template/admin/dist/libs/fontawesome-free/css/all.min.css') }}">
        <link href="{{ asset('template/admin/dist/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('template/admin/dist/css/tabler.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('template/admin/dist/css/demo.min.css') }}" rel="stylesheet"/>
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('template/admin/dist/libs/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('template/admin/dist/libs//toastr/toastr.min.css') }}">
        <script src="{{ asset('template/admin/dist/libs/jquery/dist/jquery.min.js') }}"></script>
    </head>
    <body class="antialiased">
        @include('admin.layouts.sidebar')
        <div class="page">
            <div class="content">
                <div class="container-fluid">
                    <!-- Page title -->
                    <div class="page-header">
                        <div class="row align-items-center">
                            <div class="col-12 d-flex">
                                <h2 class="page-title">
                                    {{ $title }}
                                </h2>
                                <div class="nav-item dropdown d-none d-lg-block" style="margin-left: auto">
                                    @include('admin.layouts.profile')
                                </div>
                            </div>
                        </div>
                    </div>
                    @yield('content')
                </div>
                @include('admin.layouts.footer')
                {{-- Modal --}}
                <div class="modal modal-blur fade show" id="modal-keluar" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-modal="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Keluar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin akan keluar dari sistem?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white mr-auto" data-dismiss="modal">Batal</button>
                                <a href="{{ route('admin.logout') }}" type="button" class="btn btn-primary">Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal modal-blur" id="modal-loading" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-modal="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Sedang memuat data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <img src="{{ asset('loading.gif') }}" alt="Loading gif" width="20%">
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal --}}
            </div>
        </div>
        <!-- Libs JS -->
        <script src="{{ asset('template/admin/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/admin/dist/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
        <script src="{{ asset('template/admin/dist/libs/jqvmap/dist/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('template/admin/dist/libs/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('template/admin/dist/libs/peity/jquery.peity.min.js') }}"></script>
        <!-- Tabler Core -->
        <script src="{{ asset('template/admin/dist/js/tabler.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('template/admin/dist/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/admin/dist/libs/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('template/admin/dist/libs/toastr/toastr.min.js') }}"></script>
        <script>
        $(function () {
            $('.datatable').DataTable();
        });
        </script>
        @yield('js')
        @yield('modal')

        @if (session('notif'))
            @if (session('type') == 'success')
                <script>
                    toastr.success('{{ session('notif') }}')
                </script>
            @else
                <script>
                    toastr.error('{{ session('notif') }}')
                </script>
            @endif
        @endif
        @if (!$errors->isEmpty())
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
            <script>
                toastr.error('<ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul>')
            </script>
        @endif
    </body>
</html>