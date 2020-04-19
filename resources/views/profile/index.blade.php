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
            <div class="user-profile compact">
                <div class="up-head-w" style="background-image:url(img/profile_bg1.jpg)">
                    <div class="up-social"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a></div>
                    <div class="up-main-info">
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                        <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                        <h6 class="up-sub-header">{{ \App\User::getUserRole() }}</h6>
                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                        <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                        <h6 class="up-sub-header">{{ \App\User::getUserRole() }}</h6>
                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
                        <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                        <h6 class="up-sub-header">{{ \App\User::getUserRole() }}</h6>
                        @elseif(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <h2 class="up-header">{{ \App\User::getParticipantNames() }}</h2>
                        <h6 class="up-sub-header">{{ \App\User::getUserRole() }}</h6>
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
                        <div class="col-sm-6 text-right"><a class="btn btn-primary btn-sm" href="#"><i class="os-icon os-icon-link-3"></i><span>Add to Friends</span></a></div>
                    </div>
                </div>
                <div class="up-contents">
                    <div class="m-b">
                        <div class="row m-b">
                            <div class="col-sm-6 b-r b-b">
                                <div class="el-tablo centered padded-v">
                                    <div class="value">25</div>
                                    <div class="label">Products Sold</div>
                                </div>
                            </div>
                            <div class="col-sm-6 b-b">
                                <div class="el-tablo centered padded-v">
                                    <div class="value">315</div>
                                    <div class="label">Friends</div>
                                </div>
                            </div>
                        </div>
                        <div class="padded">
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
                            <div class="os-progress-bar primary">
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
                            <div class="os-progress-bar primary">
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
        </div>
        <div class="col-sm-7">
            <div class="element-wrapper">
                <div class="element-box">
                    <form id="formValidate">
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
                        <div class="form-group">
                            <label for=""> Email address</label>
                            <input class="form-control" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email">
                            <div class="help-block form-text with-errors form-control-feedback"></div>
                        </div>
                        
                        <!-- CUSTOMER NAMES-->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <div class="row">
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
                        @endif

                        <!-- ADMIN NAME -->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
                        <div class="form-group" id="businessNameField">
                            <label for=""> Business Name</label>
                            <input class="form-control" name="name" id="name" placeholder="Enter Business Name" type="text">
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""> Password</label>
                                    <input class="form-control" data-minlength="6" placeholder="Password" required="required" type="password">
                                    <div class="help-block form-text text-muted form-control-feedback">Minimum of 6 characters</div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input class="form-control" data-match-error="Passwords don&#39;t match" placeholder="Confirm Password" required="required" type="password">
                                    <div class="help-block form-text with-errors form-control-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""> Regular select</label>
                            <select class="form-control">
                                <option value="New York">New York</option>
                                <option value="California">California</option>
                                <option value="Boston">Boston</option>
                                <option value="Texas">Texas</option>
                                <option value="Colorado">Colorado</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for=""> Multiselect</label>
                            <select class="form-control select2" multiple="true">
                                <option selected="true">New York</option>
                                <option selected="true">California</option>
                                <option>Boston</option>
                                <option>Texas</option>
                                <option>Colorado</option>
                            </select>
                        </div>
                        <fieldset class="form-group">
                            <legend><span>Section Example</span></legend>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> First Name</label>
                                        <input class="form-control" data-error="Please input your First Name" placeholder="First Name" required="required">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input class="form-control" data-error="Please input your Last Name" placeholder="Last Name" required="required">
                                        <div class="help-block form-text with-errors form-control-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> Date of Birth</label>
                                        <input class="single-daterange form-control" placeholder="Date of birth" value="04/12/1978">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Twitter Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">@</div>
                                            </div>
                                            <input class="form-control" placeholder="Twitter Username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Date Range Picker</label>
                                <input class="multi-daterange form-control" value="03/31/2017 - 04/06/2017">
                            </div>
                            <div class="form-group">
                                <label> Example textarea</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </fieldset>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">I agree to terms and conditions</label>
                        </div>
                        <div class="form-buttons-w">
                            <button class="btn btn-primary" type="submit"> Submit</button>
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