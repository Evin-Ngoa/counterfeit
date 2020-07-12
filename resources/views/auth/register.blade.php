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
                                <input checked="" class="form-check-input" onclick="javascript:checkUser();" name="participant" type="radio" id="Customer" value="Customer">Customer / BookShop
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
                            <input class="form-control" name="firstNameCustomer" id="firstNameCustomer" placeholder="Enter First Name" type="text">
                            <div class="pre-icon os-icon os-icon-users"></div>
                            <input type="hidden" name="memberId" id="memberId" class="form-control" value="">
                            <!-- <input type="hidden" name="secret" id="secret" class="form-control" value="secretmy"> -->
                            <input type="hidden" name="accountBalance" id="accountBalance" class="form-control" value="0">
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
                    <input class="form-control" name="firstName" id="firstName" placeholder="Enter Business Name" type="text">
                    <div class="pre-icon os-icon os-icon-briefcase"></div>
                </div>
                <div class="row" id="usernameField">
                    
                </div>
                <!-- <div class="form-group">
                    <label for=""> Username</label>
                    <input class="form-control" name="userName" id="userName" data-error="Please input your Username" placeholder="Enter Username" type="text">
                    <div class="pre-icon os-icon os-icon-at-sign"></div>
                    <div class="help-block form-text with-errors form-control-feedback"></div>
                </div> -->
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

    <!-- Js -->
    <script src="{{ asset ("js/app-bc.js") }}"></script>

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

        // If customer is retailer, enable name disable 
        // first and last name
        function enableName(bool){
            console.log("Value Passed = " + bool);
            if(bool == "1"){
                $("#businessNameField").show();
                $("#individualNameField").hide();
            }else{
                $("#businessNameField").hide();
                $("#individualNameField").show();
            }
        }

        function checkUser() {
            var usernameHtml = '<div class="col-sm-12">'
                        +'<div class="form-group">'
                        +'<label for="userName">Username</label>'
                        +'<div class="pre-icon os-icon os-icon-at-sign"></div>'
                        +'<input class="form-control" name="userName" id="userName" data-error="Please input your Username" placeholder="Enter Username" type="text">'
                        +'</div>'
                        +'</div>';
            var usernameRetailerHtml = '<div class="col-sm-6">'
            +'<div class="form-group">'
            +'<label for="userName">Username</label>'
            +'<div class="pre-icon os-icon os-icon-at-sign"></div>'
            +'<input class="form-control" name="userName" id="userName" data-error="Please input your Username" placeholder="Enter Username" type="text">'
            +'</div>'
            +'</div>'
            +'<div class="col-sm-6">'
            +'<div class="form-group">'
            +'<label for="isRetailer">Are You A BookShop?</label>'
            +'<select name="isRetailer" onchange="enableName(this.value)" id="isRetailer" class="form-control" data-error="Please input your Username">'
            +'<option value="">- Select -</option>'
            +'<option value="1">Yes</option>'
            +'<option value="0">No</option>'
            +'</select>'
            +'</div>'
            +'</div>';
            if (document.getElementById('Customer').checked) {
               
                $("#businessNameField").hide();
                $("#individualNameField").show();
                $("#usernameField").html(usernameRetailerHtml);
            }
            if (document.getElementById('Distributor').checked) {
                $("#businessNameField").show();
                $("#individualNameField").hide();
                $("#usernameField").html(usernameHtml);
            }
            if (document.getElementById('Publisher').checked) {
                $("#businessNameField").show();
                $("#individualNameField").hide();
                $("#usernameField").html(usernameHtml);
            }

        }
    </script>
</body>

</html>