<!DOCTYPE html>
<html>

<head>
    <!-- <title>Admin Dashboard HTML Template</title> -->
    <title>@yield('title', 'Book Counterfiet Login')</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="Counterfeit Book Recogntition" name="keywords">
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
            <div class="logo-w" style="padding: 5%;">
                <a href="#"><img alt="" src="/img/logo-big.png"></a>
            </div>
            <h4 class="auth-header" style="margin-bottom: 0rem;">Login Form</h4>
            <form id="frmLogin">
                <div class="alert alert-danger" id="add-error-login-bag" style="display: none;">
                    <ul id="add-login-errors">
                    </ul>
                </div>
                <div id="msgAlert"></div>
                <div class="form-group row">
                    <label class="col-sm-12 col-form-label">Select User Type You Registered With:</label>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input checked="" class="form-check-input" name="participant" type="radio" id="Customer" value="Customer">Customer / BookShop
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" name="participant" type="radio" id="Distributor" value="Distributor">Distributor
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" name="participant" type="radio" id="Publisher" value="Publisher">Publisher
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> Email address</label>
                    <input class="form-control" data-error="Your email address is invalid" name="email" id="email" placeholder="Enter email" type="email" required>
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="secret" id="secret" class="form-control" placeholder="Enter your password">
                    <div class="pre-icon os-icon os-icon-fingerprint"></div>
                </div>
                <div class="buttons-w">
                    <button class="mr-2 mb-2 btn btn-outline-primary btn-login" type="button">
                        <i class="os-icon os-icon-log-in"></i> Submit Log In
                    </button>

                    <button class="mr-2 mb-2 btn btn-outline-primary" type="button" onclick="window.location.href ='/auth/register'">
                        <i class="os-icon os-icon-user-plus"></i> Register
                    </button>
                </div>
                <div class="buttons-w" style="display: none;">
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox">Remember Me</label>
                    </div>
                </div>
            </form>
        </div>
    </div>

   
    <script src="{{ asset ("js/app-bc.js") }}"></script>

    <script>
        Api.init();
    </script>
    <script>
        window.onload = function() {
            var userType = $("input[name='participant']").val();

            console.log("LEAD =>" + userType);

            $('#frmLogin').validator();
        }
    </script>
</body>

</html>