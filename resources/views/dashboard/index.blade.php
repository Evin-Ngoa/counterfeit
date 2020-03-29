@extends('layout.app')

@section('title', 'Welcome Dashboard')

@section('breadcrumb')
<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('book.index') }}">Home</a></li>
    <li class="breadcrumb-item"><span>Dashboard</span></li>
</ul>
@endsection

@section('content-box')
<div class="content-box">
    <div class="row pt-4">
        <div class="col-sm-12">
            <div class="element-wrapper">
                <h6 class="element-header">{{ $role }} Dashboard</h6>
                <div class="element-content">
                    <div class="row">
                        <!-- Orders Customer-->
                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo" href="{{ route('order.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
                                <div class="label">Orders</div>
                                <div class="value">{{ $orderCount }}</div>
                                <!-- <div class="trending trending-up-basic"><span>12%</span><i class="os-icon os-icon-arrow-up2"></i></div> -->
                            </a>
                        </div>
                        @endif

                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Verify Count</div>
                                <div class="value">$457</div>
                                <div class="trending trending-down-basic"><span>12%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>
                        @endif

                        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
                        <div class="col-sm-3 col-xxxl-3">
                            <a class="element-box el-tablo" href="#">
                                <div class="label">Total Points</div>
                                <div class="value">125</div>
                                <div class="trending trending-down-basic"><span>9%</span><i class="os-icon os-icon-arrow-down"></i></div>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection