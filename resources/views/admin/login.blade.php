<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
        <title>{{ ENV('APP_NAME'). " - ".$title }}</title>
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
        <link href="{{ asset('template/admin/dist/css/tabler.min.css') }}" rel="stylesheet"/>
        <link href="{{ asset('template/admin/dist/css/demo.min.css') }}" rel="stylesheet"/>
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('template/admin/dist/libs//toastr/toastr.min.css') }}">
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
    <body class="antialiased border-top-wide border-primary d-flex flex-column">
        <div class="flex-fill d-flex flex-column justify-content-center">
            <div class="container-tight py-6">
                <div class="text-center mb-4">
                    <img src="{{ asset('template/admin/static/logo.svg') }}" height="36" alt="">
                </div>
                <form class="card card-md" action="{{ route('admin.auth') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <h2 class="mb-3 text-center">Masuk ke akun anda</h2>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" required autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" class="form-control" required autocomplete="off" name="password" placeholder="Password" >
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="input-group input-group-flat">
                                <div class="g-recaptcha text-center" data-sitekey="{{ env('GOOGLE_RECHATPTCHA_SITEKEY') }}" data-callback="enableBtn"></div>
                            </div>
                            <script type="text/javascript">
                                function enableBtn(){
                                    document.getElementById("btnlogin").disabled = false;
                                }
                                document.querySelector('body').classList.add(localStorage.getItem('theme'));
                            </script>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-lg btn-primary btn-block" id="btnlogin" disabled>Masuk</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Libs JS -->
        <script src="{{ asset('template/admin/dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/admin/dist/libs/jquery/dist/jquery.min.js') }}"></script>
        <!-- Tabler Core -->
        <script src="{{ asset('template/admin/dist/js/tabler.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('template/admin/dist/libs/toastr/toastr.min.js') }}"></script>
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
            <script>
                toastr.error('{{ implode('\n', $errors->all()) }}')
            </script>
        @endif
    </body>
</html>