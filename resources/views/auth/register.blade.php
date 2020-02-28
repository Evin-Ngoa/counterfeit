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
                <a href="#"><img alt="" src="/img/logo-big.png"></a>
            </div>
            <h4 class="auth-header">Create new account</h4>
            <form action="#">
                <div class="form-group">
                    <label for=""> Email address</label>
                    <input class="form-control" placeholder="Enter email" type="email">
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> Password</label>
                            <input class="form-control" placeholder="Password" type="password">
                            <div class="pre-icon os-icon os-icon-fingerprint"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input class="form-control" placeholder="Password" type="password">
                        </div>
                    </div>
                </div>
                <div class="buttons-w">
                    <button class="btn btn-primary">Register Now</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>