<!DOCTYPE html>
<html>

<head>
    <!-- <title>Admin Dashboard HTML Template</title> -->
    <title>@yield('title', 'Book Counterfiet Register')</title>
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
        <div class="auth-box-w" style="max-width: 650px;">
            <div class="logo-w" style="padding: 5%;">
                <a href="#"><img alt="" src="/img/logo-big.png"></a>
            </div>
            <h4 class="auth-header" style="margin-bottom: 0px;">Create new account</h4>
            <form id="frmRegister">
                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger"><b>Error!</b> Testing 123</div>
                    </div>
                </div> -->
                <div class="alert alert-danger" id="add-error-reg-bag" style="display: none;">
                    <ul id="add-reg-errors">
                    </ul>
                </div>
                <div id="msgAlert"></div>
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Choose User Type</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input checked="" class="form-check-input" onclick="javascript:checkUser();" name="participant" type="radio" id="Customer" value="Customer">Customer
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" onclick="javascript:checkUser();" name="participant" type="radio" id="Distributor" value="Distributor">Distributor
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" onclick="javascript:checkUser();" name="participant" type="radio" id="Publisher" value="Publisher">Publisher
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row" id="individualNameField">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> First Name</label>
                            <input class="form-control" name="firstName" id="firstName" placeholder="Enter First Name" type="text">
                            <div class="pre-icon os-icon os-icon-users"></div>
                            <input type="hidden" name="memberId" id="memberId" class="form-control" value="">
                            <!-- <input type="hidden" name="secret" id="secret" class="form-control" value="secretmy"> -->
                            <input type="hidden" name="accountBalance" id="accountBalance" class="form-control" value="56000">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Last Name</label>
                            <input class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name" type="text">
                        </div>
                    </div>
                </div>
                <div class="form-group" id="businessNameField">
                    <label for=""> Business Name</label>
                    <input class="form-control" name="name" id="name" placeholder="Enter Business Name" type="text">
                    <div class="pre-icon os-icon os-icon-briefcase"></div>
                </div>
                <div class="form-group">
                    <label for=""> Username</label>
                    <input class="form-control" name="userName" id="userName" data-error="Please input your Username" placeholder="Enter Username" type="text">
                    <div class="pre-icon os-icon os-icon-at-sign"></div>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for=""> Telephone</label>
                    <input class="form-control" name="telephone" id="telephone" data-error="Please input your Telephone Number" placeholder="Enter Telephone" type="text" required>
                    <div class="pre-icon os-icon os-icon-phone-call"></div>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
                <div class="form-group">
                    <label for=""> Email address</label>
                    <input class="form-control" data-error="Your email address is invalid" name="email" id="email" placeholder="Enter email" type="email" required>
                    <div class="pre-icon os-icon os-icon-email-2-at2"></div>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for=""> Password</label>
                            <input class="form-control" data-minlength="6" placeholder="Password" type="password" name="secret" id="secret" required="required">
                            <div class="pre-icon os-icon os-icon-fingerprint"></div>
                            <div class="help-block form-text text-muted form-control-feedback">Minimum of 6 characters</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input class="form-control" data-match-error="Passwords don&#39;t match" data-match="#secret" placeholder="Confirm Password" type="password" id="confirm_password" required="required">
                            <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                    </div>
                </div>

                <div class="buttons-w">
                    <button class="mr-2 mb-2 btn btn-outline-primary btn-register" type="button">
                        <!-- <button class="mr-2 mb-2 btn btn-outline-primary btn-register" type="submit"> -->
                        <i class="os-icon os-icon-user-plus"></i> Register Now
                    </button>
                    <button class="mr-2 mb-2 btn btn-outline-primary" type="button" onclick="window.location.href ='/auth/login'">
                        <i class="os-icon os-icon-log-out"></i> Back To Login
                    </button>
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

    <script type="text/javascript">
        window.onload = function() {
            var userType = $("input[name='participant']").val();

            console.log("LEAD =>" + userType);
            checkUser();

            // https://1000hz.github.io/bootstrap-validator/#validator-usage
            $('#frmRegister').validator();
            $("#add-error-reg-bag").hide();
        }

        function checkUser() {

            if (document.getElementById('Customer').checked) {
                $("#businessNameField").hide();
                $("#individualNameField").show();
            }
            if (document.getElementById('Distributor').checked) {
                $("#businessNameField").show();
                $("#individualNameField").hide();
            }
            if (document.getElementById('Publisher').checked) {
                $("#businessNameField").show();
                $("#individualNameField").hide();
            }

        }
    </script>
</body>

</html>