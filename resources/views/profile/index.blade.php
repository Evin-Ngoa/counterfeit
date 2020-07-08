@extends('layout.app')

@section('title', 'User Profile')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Profile</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row">
        <div class="col-sm-5">
            <!-- Upload Stats -->
            <div class="user-profile compact">
                @if(\App\User::getUserProfile(\App\User::getUserRole(),\App\User::loggedInUserEmail()) == "None")
                <div class="up-head-w" style="background-image:url(img/profile_bg1.jpg)">
                    @else
                    <div class="up-head-w" style="background-image:url({{\App\User::getUserProfile(\App\User::getUserRole(),\App\User::loggedInUserEmail())}})">
                        @endif
                        <div class="up-social" style="display:none;"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a></div>
                        <div class="up-main-info">
                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                            <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                            <h6 class="up-sub-header">{{ \App\User::getUserRole() }} - @ {{ \App\User::getParticipantUserName() }}</h6>
                            @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                            <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                            <h6 class="up-sub-header">{{ \App\User::getUserRole() }} - @ {{ \App\User::getParticipantUserName() }}</h6>
                            @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                            <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                            <h6 class="up-sub-header">{{ \App\User::getUserRole() }} - @ {{ \App\User::getParticipantUserName() }}</h6>
                            @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                            <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                            <h6 class="up-sub-header">{{ \App\User::getUserRole() }} - @ {{ \App\User::getParticipantUserName() }}</h6>
                            @endif
                        </div>
                        <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
                                <path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="up-controls">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="value-pair">
                                    <div class="label">Status:</div>
                                    <div class="value badge badge-pill badge-success">Online</div>
                                </div>
                            </div>
                            <div class="col-sm-6 text-right" style="display:none;"><a class="btn btn-primary btn-sm" href="#"><i class="os-icon os-icon-link-3"></i><span>Add to Friends</span></a></div>
                        </div>
                    </div>
                    <div class="up-contents">
                        <div class="m-b">
                            <div class="row m-b">
                                <div class="col-sm-4 b-r b-b">
                                    <div class="el-tablo centered padded-v">
                                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                                        <div class="value">{{ $booksPubCount }}</div>
                                        <div class="label">Books Registered</div>
                                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                                        <div class="value">{{ $shipmentsActiveCount }}</div>
                                        <div class="label">Active Shipments</div>
                                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                        <div class="value">{{ $ordersActiveCount }}</div>
                                        <div class="label">Active Orders</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4 b-b">
                                    <div class="el-tablo centered padded-v">
                                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                                        <div class="value">{{ $shipmentsCount }}</div>
                                        <div class="label">DELIVERED</div>
                                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                                        <div class="value">{{ $shipmentsDeliveredCount }}</div>
                                        <div class="label">Delivered Shipments</div>
                                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                                        <div class="value">{{ $deliveredOrdersCount }}</div>
                                        <div class="label">Delivered Orders</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-4 b-b">
                                    <div class="el-tablo centered padded-v">
                                        <div class="value">{{ $points }}</div>
                                        <div class="label">Points</div>
                                    </div>
                                </div>
                            </div>
                            <div class="padded" style="display: none;">
                                <div class="os-progress-bar primary">
                                    <div class="bar-labels">
                                        <div class="bar-label-left"><span>Profile Completion</span><span class="positive">+10</span></div>
                                        <div class="bar-label-right"><span class="info">72/100</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 80%">
                                            <div class="bar-level-3" style="width: 30%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-progress-bar primary" style="display: none;">
                                    <div class="bar-labels">
                                        <div class="bar-label-left"><span>Status Unlocked</span><span class="positive">+5</span></div>
                                        <div class="bar-label-right"><span class="info">45/100</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 30%">
                                            <div class="bar-level-3" style="width: 10%"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="os-progress-bar primary" style="display: none;">
                                    <div class="bar-labels">
                                        <div class="bar-label-left"><span>Followers</span><span class="negative">-12</span></div>
                                        <div class="bar-label-right"><span class="info">74/100</span></div>
                                    </div>
                                    <div class="bar-level-1" style="width: 100%">
                                        <div class="bar-level-2" style="width: 80%">
                                            <div class="bar-level-3" style="width: 60%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upload Profile -->
                <div class="element-box" style="margin-top: 30px;">
                    <h5 class="form-header">Profile Image Upload</h5>
                    <div id="msgAlertUpload"></div>
                    <!-- <div class="form-desc">DropzoneJS is an open source library that provides drag’n’drop file uploads with image previews. <a href="http://www.dropzonejs.com/" target="_blank">Learn More here</a></div> -->
                    <form action="/upload/profile/pic/" class="dropzone" id="my-awesome-dropzone">
                        <div class="dz-message">
                            <div>
                                <h4>Drop Image here or click to upload.</h4>
                                <!-- <input type="file" class="form-control-file" name="avatar" id="avatar" aria-describedby="fileHelp"> -->
                                <div class="text-muted">(Only picture of size 1MB and below and .png |.jpg | .jpeg are only allowed)</div>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Upload Profile 2 -->
                <div class="profile-tile" style="margin-top: 30px;border-bottom: 0px;display:none;">
                    <a class="profile-tile-box" href="users_profile_small.html" style="width:100%;">
                        <div class="pt-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
                        <div class="pt-user-name">John Mayers</div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary btn-profile-pic" type="button" value="Update Profile"> Update Profile</button>
                        </div>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="element-wrapper">
                    <div class="element-box">
                        <form id="frmProfile">
                            <div class="alert alert-danger" id="add-error-profile-bag" style="display: none;">
                                <ul id="add-profile-errors">
                                </ul>
                            </div>
                            <div id="msgAlertProfile"></div>
                            <div class="element-info">
                                <div class="element-info-with-icon">
                                    <div class="element-info-icon">
                                        <div class="os-icon os-icon-wallet-loaded"></div>
                                    </div>
                                    <div class="element-info-text">
                                        <h5 class="element-inner-header">Profile Settings</h5>
                                        <div class="element-inner-desc">Ensure you update correct information. <a href="http://1000hz.github.io/bootstrap-validator/" target="_blank">Learn more about Bootstrap Validator</a></div>
                                    </div>
                                </div>
                            </div>
                            <!-- CUSTOMER NAMES-->
                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                            <div class="row" id="individualNameField">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> First Name</label>
                                        <input class="form-control" name="firstNameCustomer" id="firstNameCustomer" placeholder="Enter First Name" type="text" value="{{ \App\User::getParticipantFirstName() }}">
                                        <!-- <div class="pre-icon os-icon os-icon-users"></div> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name" type="text" value="{{ \App\User::getParticipantLastName() }}">
                                    </div>
                                </div>
                            </div>
                            @endif

                            <!-- ADMIN | PUBLISHER | DISTRIBUTOR NAME -->
                            @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                            <div class="form-group" id="businessNameField">
                                <label for=""> Business Name</label>
                                <input class="form-control" name="firstName" id="firstName" data-error="Your Name cannot be null address is invalid" placeholder="Enter Business Name" type="text" value="{{ \App\User::getParticipantNames() }}">
                            </div>
                            @endif
                            <div class="form-group">
                                <label for="email"> Email address</label>
                                <input class="form-control" name="email" id="email" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email" value="{{ \App\User::loggedInUserEmail() }}">
                                <input class="form-control" name="role" id="role" required="required" type="hidden" value="{{ \App\User::getUserRole() }}">
                                <input class="form-control" name="accountBalance" id="accountBalance" required="required" type="hidden" value="0">
                                <input class="form-control" name="memberId" id="memberId" required="required" type="hidden" value="{{ \App\User::getParticipantMemberID() }}">
                                <input class="form-control" name="userName" id="userName" required="required" type="hidden" value="{{ \App\User::getParticipantUserName() }}">
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input class="form-control" name="telephone" id="telephone" data-error="Please input your Telephone Number" placeholder="Enter Telephone" required="required" type="text" value="{{ \App\User::getParticipantTelephone() }}">
                                <div class="help-block form-text with-errors form-control-feedback"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="secret"> Password</label>
                                        <input class="form-control" data-minlength="6" placeholder="Password" name="secret" id="secret" required="required" type="password" value="{{ \App\User::getParticipantSecret() }}">
                                        <div class="help-block form-text text-muted form-control-feedback">Minimum of 6 characters</div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input class="form-control" data-match-error="Passwords don&#39;t match" data-match="#secret" placeholder="Confirm Password" type="password">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <legend><span>Business Address</span></legend>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" id="country" class="form-control">
                                                @if(\App\User::getParticipantAddCountry()=='-select country-')
                                                <option>{{ \App\User::getParticipantAddCountry() }} </option>
                                                @else
                                                <option value="{{ \App\User::getParticipantAddCountry() }}" selected>{{ \App\User::getParticipantAddCountry() }}</option>
                                                @endif
                                                <option value="KENYA">KENYA</option>
                                                <option value="TANZANIA">TANZANIA</option>
                                                <option value="UGANDA">UGANDA</option>
                                                <option value="RWANDA">RWANDA</option>
                                                <option value="BURUNDI">BURUNDI</option>
                                                <option value="SOUTH SUDAN">SOUTH SUDAN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">County / Province</label>
                                            <input class="form-control" data-error="Please input your county / province" placeholder="County" name="county" id="county" required="required" value="{{ \App\User::getParticipantAddCounty() }}">
                                            <div class="help-block form-text with-errors form-control-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="street">Postal Address</label>
                                            <input class="form-control" name="street" id="street" placeholder="Postal Address" value="{{ \App\User::getParticipantAddPostal() }}">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-buttons-w">
                                <button class="btn btn-primary btn-profile" type="button" value="Update Profile"> Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('content-panel')
    <div class="content-panel" style="display: none;">
        <div class="element-wrapper">
            <h6 class="element-header">Quick Links</h6>
            <div class="element-box-tp">
                <div class="el-buttons-list full-width"><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-delivery-box-2"></i><span>Create New Product</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-window-content"></i><span>Customer Comments</span></a><a class="btn btn-white btn-sm" href="#"><i class="os-icon os-icon-wallet-loaded"></i><span>Store Settings</span></a></div>
            </div>
        </div>
    </div>
    @endsection

    @section('footer_scripts')
    <script type="text/javascript">
        window.onload = function() {
            // https://1000hz.github.io/bootstrap-validator/#validator-usage
            $('#frmProfile').validator();
            $("#add-error-profile-bag").hide();
        }

        // acceptedFiles: image / png, image / jpg, image / jpeg,
        //     dictFileTooBig: "That image is too large. We only allow 2MB or smaller.",
        // maxFiles: 1,
        Dropzone.options.myAwesomeDropzone = {
            paramName: "avatar", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            dictFileTooBig: "That image is too large. We only allow 1MB or smaller.",
            maxFiles: 1,
            acceptedFiles: ".jpeg, .jpg, .png",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", "{{ csrf_token() }}");
            },
            success: function(file, response) {
                // alert(JSON.stringify(response));

                var respHtml = '';
                var message = response.message;
                var success = response.success;
                console.log("Response Upload " + message + " Success " + success);
                if (success) {
                    respHtml = '<div class="alert alert-success" style="color: #fff;">' +
                        message +
                        '</div>';
                } else {
                    respHtml = '<div class="alert alert-danger" style="color: #fff;">' +
                        message +
                        '</div>';
                }

                $("#msgAlertUpload").html(respHtml);

                setTimeout(function() {
                    window.location.reload(1);
                }, 2000);

            }
        };
    </script>
    @endsection