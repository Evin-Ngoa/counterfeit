<div class="top-bar color-scheme-transparent">
    <div class="top-menu-controls">
        
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