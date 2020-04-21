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
                        <!-- CUSTOMER NAMES-->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <div class="row" id="individualNameField">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""> First Name</label>
                                    <input class="form-control" name="firstName" id="firstName" placeholder="Enter First Name" type="text">
                                    <!-- <div class="pre-icon os-icon os-icon-users"></div> -->
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

                        <!-- ADMIN | PUBLISHER | DISTRIBUTOR NAME -->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR)
                        <div class="form-group" id="businessNameField">
                            <label for=""> Business Name</label>
                            <input class="form-control" name="name" id="name" data-error="Your Name cannot be null address is invalid" placeholder="Enter Business Name" type="text" value="{{ \App\User::getParticipantNames() }}">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="email"> Email address</label>
                            <input class="form-control" name="email" id="email" data-error="Your email address is invalid" placeholder="Enter email" required="required" type="email" value="{{ \App\User::loggedInUserEmail() }}">
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
                                    <input class="form-control" data-match-error="Passwords don&#39;t match" placeholder="Confirm Password" required="required" type="password">
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
                                                <option >{{ \App\User::getParticipantAddCountry() }} </option>
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
                                        <input class="form-control" data-error="Please input your county / province" placeholder="County" required="required" value="{{ \App\User::getParticipantAddCounty() }}">
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
                            <button class="btn btn-primary" type="button"> Update Profile</button>
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