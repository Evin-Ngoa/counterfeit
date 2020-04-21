<div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
    <div class="logo-w">
        <a class="logo" href="#">
            <div class="logo-element"></div>
            <div class="logo-label">Book Counterfeit</div>
        </a>
    </div>
    <div class="logged-user-w avatar-inline">
        <div class="logged-user-i">
            <div class="avatar-w"><img alt="" src="/img/avatar1.jpg"></div>
            <div class="logged-user-info-w">
                <div class="logged-user-name">{ user.name }</div>
                <div class="logged-user-role">{ user.role }</div>
            </div>
            <div class="logged-user-toggler-arrow">
                <div class="os-icon os-icon-chevron-down"></div>
            </div>
            <div class="logged-user-menu color-style-bright">
                <div class="logged-user-avatar-info">
                    <div class="avatar-w"><img alt="" src="/img/avatar1.jpg"></div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">{ user.name }</div>
                        <div class="logged-user-role">{ user.role }</div>
                    </div>
                </div>
                <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                <ul>
                    <!-- <li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li> -->
                    <li><a href="{{ route('profile.index') }}"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                    <li><a href="#" onclick="event.preventDefault();UnSetToken();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                    <!-- <li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li> -->
                    <!-- <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li> -->
                    <!-- <li><a href="#" onclick="event.preventDefault();UnSetToken();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li> -->
                </ul>
            </div>
        </div>
    </div>

    <h1 class="menu-page-header">Page Header</h1>
    <ul class="main-menu">
    <li class="sub-header"><span>Menu</span></li>
        <li class="selected {!! classActivePath('dashboard') !!}">
            <a href="{{ route('dashboard.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-grid-circles"></div>
                </div><span>Dashboard</span>
            </a>
        </li>
        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER)
        <li class="selected {!! classActivePath('book') !!}">
            <a href="{{ route('book.view', ['id' => \App\User::loggedInUserEmail()]) }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-book"></div>
                </div><span>Book</span>
            </a>
        </li>
        @endif
        
        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
        <li class="selected {!! classActivePath('book') !!}">
            <a href="{{ route('book.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-book"></div>
                </div><span>Book</span>
            </a>
        </li>
        @endif

        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
        <li class="selected {!! classActivePath('verify') !!}">
            <a href="{{ route('verify.form') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-share-2"></div>
                </div><span>Verify Book</span>
            </a>
        </li>
        @endif


        <li class="sub-header"><span>Activities</span></li>
        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
        <li class="selected {!! classActivePath('order') !!}">
            <a href="{{ route('order.view',  ['id' => \App\User::loggedInUserEmail()])}}">
                <div class="icon-w">
                    <div class="os-icon os-icon-mail-14"></div>
                </div><span>Orders</span>
            </a>
        </li>
        @endif
        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::PUBLISHER || \App\User::getUserRole()==\App\Http\Traits\UserConstants::DISTRIBUTOR || \App\User::getUserRole()==\App\Http\Traits\UserConstants::CUSTOMER)
        <li class="selected {!! classActivePath('shipment') !!}">
            <a href="{{ route('shipment.view',  ['id' => \App\User::loggedInUserEmail()]) }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-globe"></div>
                </div><span>Shipments</span>
            </a>
        </li>
        @endif
        @if(\App\User::getUserRole()==\App\Http\Traits\UserConstants::ADMIN)
        <li class="selected {!! classActivePath('shipment') !!}">
            <a href="{{ route('shipment.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-globe"></div>
                </div><span>Shipments</span>
            </a>
        </li>
        <li class="sub-header"><span>Users</span></li>
        <li class="selected {!! classActivePath('publisher') !!}">
            <a href="{{ route('publisher.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-newspaper"></div>
                </div><span>Publishers</span>
            </a>
        </li>
        <li class="selected {!! classActivePath('distributor') !!}">
            <a href="{{ route('distributor.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-truck"></div>
                </div><span>Distributors</span>
            </a>
        </li>
        <li class="selected {!! classActivePath('customer') !!}">
            <a href="{{ route('customer.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-ui-93"></div>
                </div><span>Customers</span>
            </a>
        </li>
        
        <li class="sub-header"><span>Audit</span></li>
        <li class="selected {!! classActivePath('transaction') !!}">
            <a href="{{ route('transaction.index') }}">
                <div class="icon-w">
                    <div class="os-icon os-icon-repeat"></div>
                </div><span>Transactions</span>
            </a>
        </li>
        @endif
    </ul>
    <div class="side-menu-magic">
        <h4>Dedication</h4>
        <p>Joseph Tola Mwawasi</p>
        <div class="btn-w"><a class="btn btn-white btn-rounded" href="#">Rest Brother</a></div>
    </div>
</div>