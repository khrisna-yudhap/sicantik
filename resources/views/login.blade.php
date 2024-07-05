<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta19
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $title }}</title>

    <!-- CSS files -->
    <link href="{{ asset('assets/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/demo.min.css') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('assets/admin-dist/js/demo-theme.min.js') }}"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">

            <div class="card card-md" style="border-radius: 50px;">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <object data="{{ asset('assets/img/logo-sicantik.png') }}" width="250"></object>

                        <div class="welcomer-title">
                            <h2 class="mt-4 mb-0">Admin Area Login</h2>
                            <small>Harap login untuk masuk ke dashboard</small>
                        </div>
                        <hr>
                    </div>
                    @if ($errors->any())
                        <h4 class="text-danger">Terjadi Kesalahan!</h4>
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" autocomplete="off" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                placeholder="admin@admin.com" autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label class="form-label">
                                Password
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" class="form-control" placeholder="password"
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-teal w-100">Sign in</button>
                        </div>
                        <br><br>
                        <object data="{{ asset('assets/img/logo-kemenkes-color.png') }}" width="150"></object>
                    </form>
                </div>


            </div>

        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src=" {{ asset('assets/js/tabler.min.js') }} " defer></script>
    <script src=" {{ asset('assets/js/demo.min.js') }} " defer></script>
</body>

</html>
