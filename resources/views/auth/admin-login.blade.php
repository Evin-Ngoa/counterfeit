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
            <h4 class="auth-header" style="margin-bottom: 0rem;">ADMINISTRATOR</h4>
            <form id="frmLogin">
                <div class="alert alert-danger" id="add-error-login-bag" style="display: none;">
                    <ul id="add-login-errors">
                    </ul>
                </div>
                <div id="msgAlert"></div>
                <div class="form-group">
                    <label for=""> Email address</label>
                    <input class="form-control" data-error="Your email address is invalid" name="email" id="email" placeholder="Enter email" type="email" required>
                    <input class="form-check-input" name="participant" type="hidden" id="Admin" value="Admin">
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

    <script src="{{ asset ("vendor/jquery/dist/jquery.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/popper.js/dist/umd/popper.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/moment/moment.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/chart.js/dist/Chart.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("vendor/select2/dist/js/select2.full.min.js") }}"></script>
    <script src="{{ asset ("vendor/jquery-bar-rating/dist/jquery.barrating.min.js") }}"></script>
    <script src="{{ asset ("vendor/ckeditor/ckeditor.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap-validator/dist/validator.min.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap-daterangepicker/daterangepicker.js") }}"></script>
    <script src="{{ asset ("vendor/ion.rangeSlider/js/ion.rangeSlider.min.js") }}"></script>
    <script src="{{ asset ("vendor/dropzone/dist/dropzone.js") }}"></script>
    <script src="{{ asset ("vendor/editable-table/mindmup-editabletable.js") }}"></script>
    <script src="{{ asset ("vendor/datatables.net/js/jquery.dataTables.min.js") }}"></script>
    <script src="{{ asset ("vendor/datatables.net-bs/js/dataTables.bootstrap.min.js") }}"></script>
    <script src="{{ asset ("vendor/fullcalendar/dist/fullcalendar.min.js") }}"></script>
    <script src="{{ asset ("vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js") }}"></script>
    <script src="{{ asset ("vendor/tether/dist/js/tether.min.js") }}"></script>
    <script src="{{ asset ("vendor/slick-carousel/slick/slick.min.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/util.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/alert.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/button.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/carousel.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/collapse.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/dropdown.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/modal.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/tab.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/tooltip.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap/js/dist/popover.js") }}"></script>
    <script src="{{ asset ("vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js") }}"></script>
    <script src="{{ asset ("js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ asset ("js/demo_customizer5739.js") }}"></script>
    <script src="{{ asset ("js/main5739.js") }}"></script>
    <script src="{{ asset ("js/api.js") }}"></script>
    <script src="{{ asset ("js/helper-api.js") }}"></script>

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