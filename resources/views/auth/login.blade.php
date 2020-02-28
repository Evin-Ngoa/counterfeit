<!DOCTYPE html>
<html>

<head>
    <!-- <title>Admin Dashboard HTML Template</title> -->
    <title>@yield('title', 'Book Counterfiet Login')</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Evingtone Ngoa" name="author">
    <meta content="Book Counterfeit" name="description">
    <meta content="width=device-width,initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- CSS -->
    @include('layout.css')
    <style>
        @media (max-width: 1250px) {

            body,
            body.auth-wrapper .all-wrapper {
                padding: 20px;
            }
        }
    </style>

</head>

<body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
        <div class="auth-box-w">
            <div class="logo-w">
                <a href="index-2.html"><img alt="" src="/img/logo-big.png"></a>
            </div>
            <h4 class="auth-header">Login Form</h4>
            <form action="#">
                <div class="form-group">
                    <label for="">Username</label>
                    <input class="form-control" placeholder="Enter your username">
                    <div class="pre-icon os-icon os-icon-user-male-circle"></div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" placeholder="Enter your password" type="password">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary">Log me in</button>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">Remember Me</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>