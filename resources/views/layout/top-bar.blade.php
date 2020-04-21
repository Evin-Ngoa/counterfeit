<div class="top-bar color-scheme-transparent">
    <div class="top-menu-controls">
        <div class="element-search autosuggest-search-activator">
            <input placeholder="Start typing to search...">
        </div>
        <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-mail-14"></i>
            <div class="new-messages-count">12</div>
            <div class="os-dropdown light message-list">
                <ul>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w"><img alt="" src="/img/avatar.png"></div>
                            <div class="message-content">
                                <h6 class="message-from">John Mayers</h6>
                                <h6 class="message-title">Account Update</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w"><img alt="" src="/img/avatar2.jpg"></div>
                            <div class="message-content">
                                <h6 class="message-from">Phil Jones</h6>
                                <h6 class="message-title">Secutiry Updates</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w"><img alt="" src="/img/avatar3.jpg"></div>
                            <div class="message-content">
                                <h6 class="message-from">Bekky Simpson</h6>
                                <h6 class="message-title">Vacation Rentals</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="user-avatar-w"><img alt="" src="/img/avatar4.jpg"></div>
                            <div class="message-content">
                                <h6 class="message-from">Alice Priskon</h6>
                                <h6 class="message-title">Payment Confirmation</h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left"><i class="os-icon os-icon-ui-46"></i>
            <div class="os-dropdown">
                <div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
                <ul>
                    <li><a href="{{ route('profile.index') }}"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
                    <!-- <li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li> -->
                    <!-- <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li> -->
                    <!-- <li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li> -->
                </ul>
            </div>
        </div>
        <div class="logged-user-w">
            <div class="logged-user-i">
                @if(\App\User::getUserProfile(\App\User::getUserRole(),\App\User::loggedInUserEmail()) == "None")
                <div class="avatar-w"><img alt="" src="/img/avatar.png"></div>
                @else
                <div class="avatar-w"><img alt="" src="{{\App\User::getUserProfile(\App\User::getUserRole(),\App\User::loggedInUserEmail())}}"></div>
                @endif
                <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                        @if(\App\User::getUserProfile(\App\User::getUserRole(),\App\User::loggedInUserEmail()) == "None")
                        <div class="avatar-w"><img alt="" src="/img/avatar.png"></div>
                        @else
                        <div class="avatar-w"><img alt="" src="{{\App\User::getUserProfile(\App\User::getUserRole(),\App\User::loggedInUserEmail())}}"></div>
                        @endif
                        <div class="logged-user-info-w">
                            <div class="logged-user-name">{ user.name }</div>
                            <div class="logged-user-role">{ user.role }</div>
                        </div>
                    </div>
                    <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                    <ul>
                        <!-- <li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li> -->
                        <li><a href="{{ route('profile.index') }}"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
                        <!-- <li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li> -->
                        <!-- <li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li> -->

                        <li><a href="#" onclick="event.preventDefault();UnSetToken();"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>