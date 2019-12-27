<!DOCTYPE html>
<html>
	<!-- Mirrored from light.pinsupreme.com/users_profile_big.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2019 20:15:00 GMT -->
	<head>
		<title>Admin Dashboard HTML Template</title>
		<meta charset="utf-8">
		<meta content="ie=edge" http-equiv="x-ua-compatible">
		<meta content="template language" name="keywords">
		<meta content="Tamerlan Soziev" name="author">
		<meta content="Admin dashboard html template" name="description">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<link href="favicon.png" rel="shortcut icon">
		<link href="apple-touch-icon.png" rel="apple-touch-icon">
		<!--<link href="../fast.fonts.net/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css" rel="stylesheet" type="text/css">
		<link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
		<link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
		<link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
		<link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
		<link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
		<link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
		<link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
		<link href="css/maince5a.css?version=4.4.1" rel="stylesheet">-->
		<link href="<?= asset('css/mix-asset.css') ?>" rel="stylesheet">
	</head>
	<body class="menu-position-side menu-side-left full-screen with-content-panel">
		<div class="all-wrapper with-side-panel solid-bg-all">
			<div class="search-with-suggestions-w">
				<div class="search-with-suggestions-modal">
					<div class="element-search">
						<input class="search-suggest-input" placeholder="Start typing to search..." type="text">
						<div class="close-search-suggestions"><i class="os-icon os-icon-x"></i></div>
						</input>
					</div>
					<div class="search-suggestions-group">
						<div class="ssg-header">
							<div class="ssg-icon">
								<div class="os-icon os-icon-box"></div>
							</div>
							<div class="ssg-name">Projects</div>
							<div class="ssg-info">24 Total</div>
						</div>
						<div class="ssg-content">
							<div class="ssg-items ssg-items-boxed">
								<a class="ssg-item" href="users_profile_big.html">
									<div class="item-media" style="background-image: url(img/company6.png)"></div>
									<div class="item-name">Integ<span>ration</span> with API</div>
								</a>
								<a class="ssg-item" href="users_profile_big.html">
									<div class="item-media" style="background-image: url(img/company7.png)"></div>
									<div class="item-name">Deve<span>lopm</span>ent Project</div>
								</a>
							</div>
						</div>
					</div>
					<div class="search-suggestions-group">
						<div class="ssg-header">
							<div class="ssg-icon">
								<div class="os-icon os-icon-users"></div>
							</div>
							<div class="ssg-name">Customers</div>
							<div class="ssg-info">12 Total</div>
						</div>
						<div class="ssg-content">
							<div class="ssg-items ssg-items-list">
								<a class="ssg-item" href="users_profile_big.html">
									<div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
									<div class="item-name">John Ma<span>yer</span>s</div>
								</a>
								<a class="ssg-item" href="users_profile_big.html">
									<div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
									<div class="item-name">Th<span>omas</span> Mullier</div>
								</a>
								<a class="ssg-item" href="users_profile_big.html">
									<div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
									<div class="item-name">Kim C<span>olli</span>ns</div>
								</a>
							</div>
						</div>
					</div>
					<div class="search-suggestions-group">
						<div class="ssg-header">
							<div class="ssg-icon">
								<div class="os-icon os-icon-folder"></div>
							</div>
							<div class="ssg-name">Files</div>
							<div class="ssg-info">17 Total</div>
						</div>
						<div class="ssg-content">
							<div class="ssg-items ssg-items-blocks">
								<a class="ssg-item" href="#">
									<div class="item-icon"><i class="os-icon os-icon-file-text"></i></div>
									<div class="item-name">Work<span>Not</span>e.txt</div>
								</a>
								<a class="ssg-item" href="#">
									<div class="item-icon"><i class="os-icon os-icon-film"></i></div>
									<div class="item-name">V<span>ideo</span>.avi</div>
								</a>
								<a class="ssg-item" href="#">
									<div class="item-icon"><i class="os-icon os-icon-database"></i></div>
									<div class="item-name">User<span>Tabl</span>e.sql</div>
								</a>
								<a class="ssg-item" href="#">
									<div class="item-icon"><i class="os-icon os-icon-image"></i></div>
									<div class="item-name">wed<span>din</span>g.jpg</div>
								</a>
							</div>
							<div class="ssg-nothing-found">
								<div class="icon-w"><i class="os-icon os-icon-eye-off"></i></div>
								<span>No files were found. Try changing your query...</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="layout-w">
				<!--------------------
					START - Mobile Menu
					-------------------->
				<div class="menu-mobile menu-activated-on-click color-scheme-dark">
					<div class="mm-logo-buttons-w">
						<a class="mm-logo" href="index-2.html"><img src="img/logo.png"><span>Clean Admin</span></a>
						<div class="mm-buttons">
							<div class="content-panel-open">
								<div class="os-icon os-icon-grid-circles"></div>
							</div>
							<div class="mobile-menu-trigger">
								<div class="os-icon os-icon-hamburger-menu-1"></div>
							</div>
						</div>
					</div>
					<div class="menu-and-user">
						<div class="logged-user-w">
							<div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div>
							<div class="logged-user-info-w">
								<div class="logged-user-name">Maria Gomez</div>
								<div class="logged-user-role">Administrator</div>
							</div>
						</div>
						<!--------------------
							START - Mobile Menu List
							-------------------->
						<ul class="main-menu">
							<li class="has-sub-menu">
								<a href="index-2.html">
									<div class="icon-w">
										<div class="os-icon os-icon-layout"></div>
									</div>
									<span>Dashboard</span>
								</a>
								<ul class="sub-menu">
									<li><a href="index-2.html">Dashboard 1</a></li>
									<li><a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a></li>
									<li><a href="apps_support_dashboard.html">Dashboard 3</a></li>
									<li><a href="apps_projects.html">Dashboard 4</a></li>
									<li><a href="apps_bank.html">Dashboard 5</a></li>
									<li><a href="layouts_menu_top_image.html">Dashboard 6</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="layouts_menu_top_image.html">
									<div class="icon-w">
										<div class="os-icon os-icon-layers"></div>
									</div>
									<span>Menu Styles</span>
								</a>
								<ul class="sub-menu">
									<li><a href="layouts_menu_side_full.html">Side Menu Light</a></li>
									<li><a href="layouts_menu_side_full_dark.html">Side Menu Dark</a></li>
									<li><a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="apps_pipeline.html">Side &amp; Top Dark</a></li>
									<li><a href="apps_projects.html">Side &amp; Top</a></li>
									<li><a href="layouts_menu_side_mini.html">Mini Side Menu</a></li>
									<li><a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a></li>
									<li><a href="layouts_menu_side_compact.html">Compact Side Menu</a></li>
									<li><a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a></li>
									<li><a href="layouts_menu_right.html">Right Menu</a></li>
									<li><a href="layouts_menu_top.html">Top Menu Light</a></li>
									<li><a href="layouts_menu_top_dark.html">Top Menu Dark</a></li>
									<li><a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a></li>
									<li><a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a></li>
									<li><a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a></li>
									<li><a href="layouts_menu_side_compact_click.html">Menu Inside Click</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="apps_bank.html">
									<div class="icon-w">
										<div class="os-icon os-icon-package"></div>
									</div>
									<span>Applications</span>
								</a>
								<ul class="sub-menu">
									<li><a href="apps_email.html">Email Application</a></li>
									<li><a href="apps_support_dashboard.html">Support Dashboard</a></li>
									<li><a href="apps_support_index.html">Tickets Index</a></li>
									<li><a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="apps_projects.html">Projects List</a></li>
									<li><a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="apps_full_chat.html">Chat Application</a></li>
									<li><a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="misc_chat.html">Popup Chat</a></li>
									<li><a href="apps_pipeline.html">CRM Pipeline</a></li>
									<li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="misc_calendar.html">Calendar</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-file-text"></div>
									</div>
									<span>Pages</span>
								</a>
								<ul class="sub-menu">
									<li><a href="misc_invoice.html">Invoice</a></li>
									<li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="misc_charts.html">Charts</a></li>
									<li><a href="auth_login.html">Login</a></li>
									<li><a href="auth_register.html">Register</a></li>
									<li><a href="auth_lock.html">Lock Screen</a></li>
									<li><a href="misc_pricing_plans.html">Pricing Plans</a></li>
									<li><a href="misc_error_404.html">Error 404</a></li>
									<li><a href="misc_error_500.html">Error 500</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-life-buoy"></div>
									</div>
									<span>UI Kit</span>
								</a>
								<ul class="sub-menu">
									<li><a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a></li>
									<li><a href="uikit_alerts.html">Alerts</a></li>
									<li><a href="uikit_grid.html">Grid</a></li>
									<li><a href="uikit_progress.html">Progress</a></li>
									<li><a href="uikit_popovers.html">Popover</a></li>
									<li><a href="uikit_tooltips.html">Tooltips</a></li>
									<li><a href="uikit_buttons.html">Buttons</a></li>
									<li><a href="uikit_dropdowns.html">Dropdowns</a></li>
									<li><a href="uikit_typography.html">Typography</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-mail"></div>
									</div>
									<span>Emails</span>
								</a>
								<ul class="sub-menu">
									<li><a href="emails_welcome.html">Welcome Email</a></li>
									<li><a href="emails_order.html">Order Confirmation</a></li>
									<li><a href="emails_payment_due.html">Payment Due</a></li>
									<li><a href="emails_forgot.html">Forgot Password</a></li>
									<li><a href="emails_activate.html">Activate Account</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-users"></div>
									</div>
									<span>Users</span>
								</a>
								<ul class="sub-menu">
									<li><a href="users_profile_big.html">Big Profile</a></li>
									<li><a href="users_profile_small.html">Compact Profile</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-edit-32"></div>
									</div>
									<span>Forms</span>
								</a>
								<ul class="sub-menu">
									<li><a href="forms_regular.html">Regular Forms</a></li>
									<li><a href="forms_validation.html">Form Validation</a></li>
									<li><a href="forms_wizard.html">Form Wizard</a></li>
									<li><a href="forms_uploads.html">File Uploads</a></li>
									<li><a href="forms_wisiwig.html">Wisiwig Editor</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-grid"></div>
									</div>
									<span>Tables</span>
								</a>
								<ul class="sub-menu">
									<li><a href="tables_regular.html">Regular Tables</a></li>
									<li><a href="tables_datatables.html">Data Tables</a></li>
									<li><a href="tables_editable.html">Editable Tables</a></li>
								</ul>
							</li>
							<li class="has-sub-menu">
								<a href="#">
									<div class="icon-w">
										<div class="os-icon os-icon-zap"></div>
									</div>
									<span>Icons</span>
								</a>
								<ul class="sub-menu">
									<li><a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a></li>
									<li><a href="icon_fonts_feather.html">Feather Icons</a></li>
									<li><a href="icon_fonts_themefy.html">Themefy Icons</a></li>
									<li><a href="icon_fonts_picons_thin.html">Picons Thin</a></li>
									<li><a href="icon_fonts_dripicons.html">Dripicons</a></li>
									<li><a href="icon_fonts_eightyshades.html">Eightyshades</a></li>
									<li><a href="icon_fonts_entypo.html">Entypo</a></li>
									<li><a href="icon_fonts_font_awesome.html">Font Awesome</a></li>
									<li><a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a></li>
									<li><a href="icon_fonts_metrize_icons.html">Metrize Icons</a></li>
									<li><a href="icon_fonts_picons_social.html">Picons Social</a></li>
									<li><a href="icon_fonts_batch_icons.html">Batch Icons</a></li>
									<li><a href="icon_fonts_dashicons.html">Dashicons</a></li>
									<li><a href="icon_fonts_typicons.html">Typicons</a></li>
									<li><a href="icon_fonts_weather_icons.html">Weather Icons</a></li>
									<li><a href="icon_fonts_light_admin.html">Light Admin</a></li>
								</ul>
							</li>
						</ul>
						<!--------------------
							END - Mobile Menu List
							-------------------->
						<div class="mobile-menu-magic">
							<h4>Light Admin</h4>
							<p>Clean Bootstrap 4 Template</p>
							<div class="btn-w"><a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a></div>
						</div>
					</div>
				</div>
				<!--------------------
					END - Mobile Menu
					--------------------><!--------------------
					START - Main Menu
					-------------------->
				<div class="menu-w color-scheme-light color-style-default menu-position-side menu-side-left menu-layout-mini sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
					<div class="logo-w">
						<a class="logo" href="index-2.html">
							<div class="logo-element"></div>
							<div class="logo-label">Clean Admin</div>
						</a>
					</div>
					<div class="logged-user-w avatar-inline">
						<div class="logged-user-i">
							<div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div>
							<div class="logged-user-info-w">
								<div class="logged-user-name">Maria Gomez</div>
								<div class="logged-user-role">Administrator</div>
							</div>
							<div class="logged-user-toggler-arrow">
								<div class="os-icon os-icon-chevron-down"></div>
							</div>
							<div class="logged-user-menu color-style-bright">
								<div class="logged-user-avatar-info">
									<div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div>
									<div class="logged-user-info-w">
										<div class="logged-user-name">Maria Gomez</div>
										<div class="logged-user-role">Administrator</div>
									</div>
								</div>
								<div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
								<ul>
									<li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li>
									<li><a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
									<li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li>
									<li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li>
									<li><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="menu-actions">
						<!--------------------
							START - Messages Link in secondary top menu
							-------------------->
						<div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
							<i class="os-icon os-icon-mail-14"></i>
							<div class="new-messages-count">12</div>
							<div class="os-dropdown light message-list">
								<ul>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">John Mayers</h6>
												<h6 class="message-title">Account Update</h6>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">Phil Jones</h6>
												<h6 class="message-title">Secutiry Updates</h6>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">Bekky Simpson</h6>
												<h6 class="message-title">Vacation Rentals</h6>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">Alice Priskon</h6>
												<h6 class="message-title">Payment Confirmation</h6>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!--------------------
							END - Messages Link in secondary top menu
							--------------------><!--------------------
							START - Settings Link in secondary top menu
							-------------------->
						<div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-right">
							<i class="os-icon os-icon-ui-46"></i>
							<div class="os-dropdown">
								<div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
								<ul>
									<li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
									<li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li>
									<li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li>
									<li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li>
								</ul>
							</div>
						</div>
						<!--------------------
							END - Settings Link in secondary top menu
							--------------------><!--------------------
							START - Messages Link in secondary top menu
							-------------------->
						<div class="messages-notifications os-dropdown-trigger os-dropdown-position-right">
							<i class="os-icon os-icon-zap"></i>
							<div class="new-messages-count">4</div>
							<div class="os-dropdown light message-list">
								<div class="icon-w"><i class="os-icon os-icon-zap"></i></div>
								<ul>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">John Mayers</h6>
												<h6 class="message-title">Account Update</h6>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">Phil Jones</h6>
												<h6 class="message-title">Secutiry Updates</h6>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">Bekky Simpson</h6>
												<h6 class="message-title">Vacation Rentals</h6>
											</div>
										</a>
									</li>
									<li>
										<a href="#">
											<div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div>
											<div class="message-content">
												<h6 class="message-from">Alice Priskon</h6>
												<h6 class="message-title">Payment Confirmation</h6>
											</div>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!--------------------
							END - Messages Link in secondary top menu
							-------------------->
					</div>
					<div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..." type="text"></div>
					<h1 class="menu-page-header">Page Header</h1>
					<ul class="main-menu">
						<li class="sub-header"><span>Layouts</span></li>
						<li class="selected has-sub-menu">
							<a href="index-2.html">
								<div class="icon-w">
									<div class="os-icon os-icon-layout"></div>
								</div>
								<span>Dashboard</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Dashboard</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-layout"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="index-2.html">Dashboard 1</a></li>
										<li><a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a></li>
										<li><a href="apps_support_dashboard.html">Dashboard 3</a></li>
										<li><a href="apps_projects.html">Dashboard 4</a></li>
										<li><a href="apps_bank.html">Dashboard 5</a></li>
										<li><a href="layouts_menu_top_image.html">Dashboard 6</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="layouts_menu_top_image.html">
								<div class="icon-w">
									<div class="os-icon os-icon-layers"></div>
								</div>
								<span>Menu Styles</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Menu Styles</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-layers"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="layouts_menu_side_full.html">Side Menu Light</a></li>
										<li><a href="layouts_menu_side_full_dark.html">Side Menu Dark</a></li>
										<li><a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="apps_pipeline.html">Side &amp; Top Dark</a></li>
										<li><a href="apps_projects.html">Side &amp; Top</a></li>
										<li><a href="layouts_menu_side_mini.html">Mini Side Menu</a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a></li>
										<li><a href="layouts_menu_side_compact.html">Compact Side Menu</a></li>
										<li><a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a></li>
										<li><a href="layouts_menu_right.html">Right Menu</a></li>
										<li><a href="layouts_menu_top.html">Top Menu Light</a></li>
										<li><a href="layouts_menu_top_dark.html">Top Menu Dark</a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a></li>
										<li><a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a></li>
										<li><a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a></li>
										<li><a href="layouts_menu_side_compact_click.html">Menu Inside Click</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="sub-header"><span>Options</span></li>
						<li class=" has-sub-menu">
							<a href="apps_bank.html">
								<div class="icon-w">
									<div class="os-icon os-icon-package"></div>
								</div>
								<span>Applications</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Applications</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-package"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="apps_email.html">Email Application</a></li>
										<li><a href="apps_support_dashboard.html">Support Dashboard</a></li>
										<li><a href="apps_support_index.html">Tickets Index</a></li>
										<li><a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="apps_projects.html">Projects List</a></li>
										<li><a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="apps_full_chat.html">Chat Application</a></li>
										<li><a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="misc_chat.html">Popup Chat</a></li>
										<li><a href="apps_pipeline.html">CRM Pipeline</a></li>
										<li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="misc_calendar.html">Calendar</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-file-text"></div>
								</div>
								<span>Pages</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Pages</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-file-text"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="misc_invoice.html">Invoice</a></li>
										<li><a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="misc_charts.html">Charts</a></li>
										<li><a href="auth_login.html">Login</a></li>
										<li><a href="auth_register.html">Register</a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="auth_lock.html">Lock Screen</a></li>
										<li><a href="misc_pricing_plans.html">Pricing Plans</a></li>
										<li><a href="misc_error_404.html">Error 404</a></li>
										<li><a href="misc_error_500.html">Error 500</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-life-buoy"></div>
								</div>
								<span>UI Kit</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">UI Kit</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-life-buoy"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a></li>
										<li><a href="uikit_alerts.html">Alerts</a></li>
										<li><a href="uikit_grid.html">Grid</a></li>
										<li><a href="uikit_progress.html">Progress</a></li>
										<li><a href="uikit_popovers.html">Popover</a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="uikit_tooltips.html">Tooltips</a></li>
										<li><a href="uikit_buttons.html">Buttons</a></li>
										<li><a href="uikit_dropdowns.html">Dropdowns</a></li>
										<li><a href="uikit_typography.html">Typography</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class="sub-header"><span>Elements</span></li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-mail"></div>
								</div>
								<span>Emails</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Emails</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-mail"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="emails_welcome.html">Welcome Email</a></li>
										<li><a href="emails_order.html">Order Confirmation</a></li>
										<li><a href="emails_payment_due.html">Payment Due</a></li>
										<li><a href="emails_forgot.html">Forgot Password</a></li>
										<li><a href="emails_activate.html">Activate Account</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-users"></div>
								</div>
								<span>Users</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Users</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-users"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="users_profile_big.html">Big Profile</a></li>
										<li><a href="users_profile_small.html">Compact Profile</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-edit-32"></div>
								</div>
								<span>Forms</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Forms</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-edit-32"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="forms_regular.html">Regular Forms</a></li>
										<li><a href="forms_validation.html">Form Validation</a></li>
										<li><a href="forms_wizard.html">Form Wizard</a></li>
										<li><a href="forms_uploads.html">File Uploads</a></li>
										<li><a href="forms_wisiwig.html">Wisiwig Editor</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-grid"></div>
								</div>
								<span>Tables</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Tables</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-grid"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="tables_regular.html">Regular Tables</a></li>
										<li><a href="tables_datatables.html">Data Tables</a></li>
										<li><a href="tables_editable.html">Editable Tables</a></li>
									</ul>
								</div>
							</div>
						</li>
						<li class=" has-sub-menu">
							<a href="#">
								<div class="icon-w">
									<div class="os-icon os-icon-zap"></div>
								</div>
								<span>Icons</span>
							</a>
							<div class="sub-menu-w">
								<div class="sub-menu-header">Icons</div>
								<div class="sub-menu-icon"><i class="os-icon os-icon-zap"></i></div>
								<div class="sub-menu-i">
									<ul class="sub-menu">
										<li><a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a></li>
										<li><a href="icon_fonts_feather.html">Feather Icons</a></li>
										<li><a href="icon_fonts_themefy.html">Themefy Icons</a></li>
										<li><a href="icon_fonts_picons_thin.html">Picons Thin</a></li>
										<li><a href="icon_fonts_dripicons.html">Dripicons</a></li>
										<li><a href="icon_fonts_eightyshades.html">Eightyshades</a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="icon_fonts_entypo.html">Entypo</a></li>
										<li><a href="icon_fonts_font_awesome.html">Font Awesome</a></li>
										<li><a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a></li>
										<li><a href="icon_fonts_metrize_icons.html">Metrize Icons</a></li>
										<li><a href="icon_fonts_picons_social.html">Picons Social</a></li>
										<li><a href="icon_fonts_batch_icons.html">Batch Icons</a></li>
									</ul>
									<ul class="sub-menu">
										<li><a href="icon_fonts_dashicons.html">Dashicons</a></li>
										<li><a href="icon_fonts_typicons.html">Typicons</a></li>
										<li><a href="icon_fonts_weather_icons.html">Weather Icons</a></li>
										<li><a href="icon_fonts_light_admin.html">Light Admin</a></li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
					<div class="side-menu-magic">
						<h4>Light Admin</h4>
						<p>Clean Bootstrap 4 Template</p>
						<div class="btn-w"><a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a></div>
					</div>
				</div>
				<!--------------------
					END - Main Menu
					-------------------->
				<div class="content-w">
					<!--------------------
						START - Top Bar
						-------------------->
					<div class="top-bar color-scheme-transparent">
						<!--------------------
							START - Top Menu Controls
							-------------------->
						<div class="top-menu-controls">
							<div class="element-search autosuggest-search-activator"><input placeholder="Start typing to search..." type="text"></div>
							<!--------------------
								START - Messages Link in secondary top menu
								-------------------->
							<div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
								<i class="os-icon os-icon-mail-14"></i>
								<div class="new-messages-count">12</div>
								<div class="os-dropdown light message-list">
									<ul>
										<li>
											<a href="#">
												<div class="user-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
												<div class="message-content">
													<h6 class="message-from">John Mayers</h6>
													<h6 class="message-title">Account Update</h6>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-avatar-w"><img alt="" src="img/avatar2.jpg"></div>
												<div class="message-content">
													<h6 class="message-from">Phil Jones</h6>
													<h6 class="message-title">Secutiry Updates</h6>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-avatar-w"><img alt="" src="img/avatar3.jpg"></div>
												<div class="message-content">
													<h6 class="message-from">Bekky Simpson</h6>
													<h6 class="message-title">Vacation Rentals</h6>
												</div>
											</a>
										</li>
										<li>
											<a href="#">
												<div class="user-avatar-w"><img alt="" src="img/avatar4.jpg"></div>
												<div class="message-content">
													<h6 class="message-from">Alice Priskon</h6>
													<h6 class="message-title">Payment Confirmation</h6>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!--------------------
								END - Messages Link in secondary top menu
								--------------------><!--------------------
								START - Settings Link in secondary top menu
								-------------------->
							<div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
								<i class="os-icon os-icon-ui-46"></i>
								<div class="os-dropdown">
									<div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
									<ul>
										<li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a></li>
										<li><a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a></li>
										<li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a></li>
										<li><a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a></li>
									</ul>
								</div>
							</div>
							<!--------------------
								END - Settings Link in secondary top menu
								--------------------><!--------------------
								START - User avatar and menu in secondary top menu
								-------------------->
							<div class="logged-user-w">
								<div class="logged-user-i">
									<div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div>
									<div class="logged-user-menu color-style-bright">
										<div class="logged-user-avatar-info">
											<div class="avatar-w"><img alt="" src="img/avatar1.jpg"></div>
											<div class="logged-user-info-w">
												<div class="logged-user-name">Maria Gomez</div>
												<div class="logged-user-role">Administrator</div>
											</div>
										</div>
										<div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
										<ul>
											<li><a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a></li>
											<li><a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a></li>
											<li><a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a></li>
											<li><a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a></li>
											<li><a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
										</ul>
									</div>
								</div>
							</div>
							<!--------------------
								END - User avatar and menu in secondary top menu
								-------------------->
						</div>
						<!--------------------
							END - Top Menu Controls
							-------------------->
					</div>
					<!--------------------
						END - Top Bar
						--------------------><!--------------------
						START - Breadcrumbs
						-------------------->
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
						<li class="breadcrumb-item"><a href="index-2.html">Products</a></li>
						<li class="breadcrumb-item"><span>Laptop with retina screen</span></li>
					</ul>
					<!--------------------
						END - Breadcrumbs
						-------------------->
					<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
					<div class="content-i">
						<div class="content-box">
							<div class="element-wrapper">
								<div class="user-profile">
									<div class="up-head-w" style="background-image:url(img/profile_bg1.jpg)">
										<div class="up-social"><a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a></div>
										<div class="up-main-info">
											<div class="user-avatar-w">
												<div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div>
											</div>
											<h1 class="up-header">John Mayers</h1>
											<h5 class="up-sub-header">Product Designer at Facebook</h5>
										</div>
										<svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
											<g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF">
												<path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path>
											</g>
										</svg>
									</div>
									<div class="up-controls">
										<div class="row">
											<div class="col-lg-6">
												<div class="value-pair">
													<div class="label">Status:</div>
													<div class="value badge badge-pill badge-success">Online    </div>
												</div>
												<div class="value-pair">
													<div class="label">Member Since:</div>
													<div class="value">2011</div>
												</div>
											</div>
											<div class="col-lg-6 text-right"><a class="btn btn-primary btn-sm" href="#"><i class="os-icon os-icon-link-3"></i><span>Add to Friends</span></a><a class="btn btn-secondary btn-sm" href="#"><i class="os-icon os-icon-email-forward"></i><span>Send Message</span></a></div>
										</div>
									</div>
									<div class="up-contents">
										<h5 class="element-header">Profile Statistics</h5>
										<div class="row m-b">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-sm-6 b-r b-b">
														<div class="el-tablo centered padded">
															<div class="value">3814</div>
															<div class="label">Products Sold</div>
														</div>
													</div>
													<div class="col-sm-6 b-b b-r">
														<div class="el-tablo centered padded">
															<div class="value">47.5K</div>
															<div class="label">Followers</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-sm-6 b-r">
														<div class="el-tablo centered padded">
															<div class="value">$95</div>
															<div class="label">Daily Earnings</div>
														</div>
													</div>
													<div class="col-sm-6 b-r">
														<div class="el-tablo centered padded">
															<div class="value">12</div>
															<div class="label">Products</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="padded">
													<div class="element-info-with-icon smaller">
														<div class="element-info-icon">
															<div class="os-icon os-icon-bar-chart-stats-up"></div>
														</div>
														<div class="element-info-text">
															<h5 class="element-inner-header">Monthly Revenue</h5>
															<div class="element-inner-desc">Calculated every month</div>
														</div>
													</div>
													<div class="el-chart-w">
														<canvas height="130" id="liteLineChart" width="300"></canvas>
													</div>
												</div>
											</div>
										</div>
										<div class="os-tabs-w">
											<div class="os-tabs-controls">
												<ul class="nav nav-tabs bigger">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_overview">Activity</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab_sales">Daily Sales</a></li>
												</ul>
												<ul class="nav nav-pills smaller d-none d-md-flex">
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Today</a></li>
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#">7 Days</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">14 Days</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Last Month</a></li>
												</ul>
											</div>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_overview">
													<div class="timed-activities padded">
														<div class="timed-activity">
															<div class="ta-date"><span>21st Jan, 2017</span></div>
															<div class="ta-record-w">
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>11:55</strong> am</div>
																	<div class="ta-activity">Created a post called <a href="#">Register new symbol</a> in Rogue</div>
																</div>
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>2:34</strong> pm</div>
																	<div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
																</div>
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>7:12</strong> pm</div>
																	<div class="ta-activity">Added <a href="#">John Silver</a> as a friend</div>
																</div>
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>9:39</strong> pm</div>
																	<div class="ta-activity">Started following user <a href="#">Ben Mosley</a></div>
																</div>
															</div>
														</div>
														<div class="timed-activity">
															<div class="ta-date"><span>3rd Feb, 2017</span></div>
															<div class="ta-record-w">
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>9:32</strong> pm</div>
																	<div class="ta-activity">Added <a href="#">John Silver</a> as a friend</div>
																</div>
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>5:14</strong> pm</div>
																	<div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
																</div>
															</div>
														</div>
														<div class="timed-activity">
															<div class="ta-date"><span>21st Jan, 2017</span></div>
															<div class="ta-record-w">
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>11:55</strong> am</div>
																	<div class="ta-activity">Created a post called <a href="#">Register new symbol</a> in Rogue</div>
																</div>
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>2:34</strong> pm</div>
																	<div class="ta-activity">Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category</div>
																</div>
																<div class="ta-record">
																	<div class="ta-timestamp"><strong>9:39</strong> pm</div>
																	<div class="ta-activity">Started following user <a href="#">Ben Mosley</a></div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="tab_sales">
													<div class="el-tablo">
														<div class="label">Unique Visitors</div>
														<div class="value">12,537</div>
													</div>
													<div class="el-chart-w">
														<canvas height="150px" id="lineChart" width="600px"></canvas>
													</div>
												</div>
												<div class="tab-pane" id="tab_conversion"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--------------------
								START - Color Scheme Toggler
								-------------------->
							<div class="floated-colors-btn second-floated-btn">
								<div class="os-toggler-w">
									<div class="os-toggler-i">
										<div class="os-toggler-pill"></div>
									</div>
								</div>
								<span>Dark </span><span>Colors</span>
							</div>
							<!--------------------
								END - Color Scheme Toggler
								--------------------><!--------------------
								START - Demo Customizer
								-------------------->
							<div class="floated-customizer-btn third-floated-btn">
								<div class="icon-w"><i class="os-icon os-icon-ui-46"></i></div>
								<span>Customizer</span>
							</div>
							<div class="floated-customizer-panel">
								<div class="fcp-content">
									<div class="close-customizer-btn"><i class="os-icon os-icon-x"></i></div>
									<div class="fcp-group">
										<div class="fcp-group-header">Menu Settings</div>
										<div class="fcp-group-contents">
											<div class="fcp-field">
												<label for="">Menu Position</label>
												<select class="menu-position-selector">
													<option value="left">Left</option>
													<option value="right">Right</option>
													<option value="top">Top</option>
												</select>
											</div>
											<div class="fcp-field">
												<label for="">Menu Style</label>
												<select class="menu-layout-selector">
													<option value="compact">Compact</option>
													<option value="full">Full</option>
													<option value="mini">Mini</option>
												</select>
											</div>
											<div class="fcp-field with-image-selector-w">
												<label for="">With Image</label>
												<select class="with-image-selector">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
											<div class="fcp-field">
												<label for="">Menu Color</label>
												<div class="fcp-colors menu-color-selector">
													<div class="color-selector menu-color-selector color-bright selected"></div>
													<div class="color-selector menu-color-selector color-dark"></div>
													<div class="color-selector menu-color-selector color-light"></div>
													<div class="color-selector menu-color-selector color-transparent"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="fcp-group">
										<div class="fcp-group-header">Sub Menu</div>
										<div class="fcp-group-contents">
											<div class="fcp-field">
												<label for="">Sub Menu Style</label>
												<select class="sub-menu-style-selector">
													<option value="flyout">Flyout</option>
													<option value="inside">Inside/Click</option>
													<option value="over">Over</option>
												</select>
											</div>
											<div class="fcp-field">
												<label for="">Sub Menu Color</label>
												<div class="fcp-colors">
													<div class="color-selector sub-menu-color-selector color-bright selected"></div>
													<div class="color-selector sub-menu-color-selector color-dark"></div>
													<div class="color-selector sub-menu-color-selector color-light"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="fcp-group">
										<div class="fcp-group-header">Other Settings</div>
										<div class="fcp-group-contents">
											<div class="fcp-field">
												<label for="">Full Screen?</label>
												<select class="full-screen-selector">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
											<div class="fcp-field">
												<label for="">Show Top Bar</label>
												<select class="top-bar-visibility-selector">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
											<div class="fcp-field">
												<label for="">Above Menu?</label>
												<select class="top-bar-above-menu-selector">
													<option value="yes">Yes</option>
													<option value="no">No</option>
												</select>
											</div>
											<div class="fcp-field">
												<label for="">Top Bar Color</label>
												<div class="fcp-colors">
													<div class="color-selector top-bar-color-selector color-bright selected"></div>
													<div class="color-selector top-bar-color-selector color-dark"></div>
													<div class="color-selector top-bar-color-selector color-light"></div>
													<div class="color-selector top-bar-color-selector color-transparent"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--------------------
								END - Demo Customizer
								--------------------><!--------------------
								START - Chat Popup Box
								-------------------->
							<div class="floated-chat-btn"><i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span></div>
							<div class="floated-chat-w">
								<div class="floated-chat-i">
									<div class="chat-close"><i class="os-icon os-icon-close"></i></div>
									<div class="chat-head">
										<div class="user-w with-status status-green">
											<div class="user-avatar-w">
												<div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div>
											</div>
											<div class="user-name">
												<h6 class="user-title">John Mayers</h6>
												<div class="user-role">Account Manager</div>
											</div>
										</div>
									</div>
									<div class="chat-messages">
										<div class="message">
											<div class="message-content">Hi, how can I help you?</div>
										</div>
										<div class="date-break">Mon 10:20am</div>
										<div class="message">
											<div class="message-content">Hi, my name is Mike, I will be happy to assist you</div>
										</div>
										<div class="message self">
											<div class="message-content">Hi, I tried ordering this product and it keeps showing me error code.</div>
										</div>
									</div>
									<div class="chat-controls">
										<input class="message-input" placeholder="Type your message here..." type="text">
										<div class="chat-extra"><a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a></div>
									</div>
								</div>
							</div>
							<!--------------------
								END - Chat Popup Box
								-------------------->
						</div>
						<!--------------------
							START - Sidebar
							-------------------->
						<div class="content-panel">
							<div class="content-panel-close"><i class="os-icon os-icon-close"></i></div>
							<!--------------------
								START - Support Agents
								-------------------->
							<div class="element-wrapper">
								<h6 class="element-header">Support Agents</h6>
								<div class="element-box-tp">
									<div class="profile-tile">
										<a class="profile-tile-box" href="users_profile_small.html">
											<div class="pt-avatar-w"><img alt="" src="img/avatar1.jpg"></div>
											<div class="pt-user-name">John Mayers</div>
										</a>
										<div class="profile-tile-meta">
											<ul>
												<li>Last Login:<strong>Online Now</strong></li>
												<li>Tickets:<strong><a href="apps_support_index.html">12</a></strong></li>
												<li>Response Time:<strong>2 hours</strong></li>
											</ul>
											<div class="pt-btn"><a class="btn btn-success btn-sm" href="apps_full_chat.html">Send Message</a></div>
										</div>
									</div>
									<div class="profile-tile">
										<a class="profile-tile-box" href="users_profile_small.html">
											<div class="pt-avatar-w"><img alt="" src="img/avatar3.jpg"></div>
											<div class="pt-user-name">Ben Gossman</div>
										</a>
										<div class="profile-tile-meta">
											<ul>
												<li>Last Login:<strong>Offline</strong></li>
												<li>Tickets:<strong><a href="apps_support_index.html">9</a></strong></li>
												<li>Response Time:<strong>3 hours</strong></li>
											</ul>
											<div class="pt-btn"><a class="btn btn-secondary btn-sm" href="apps_full_chat.html">Send Message</a></div>
										</div>
									</div>
								</div>
							</div>
							<!--------------------
								END - Support Agents
								-------------------->
							<div class="element-wrapper">
								<h6 class="element-header">Team Members</h6>
								<div class="element-box-tp">
									<div class="input-search-w"><input class="form-control rounded bright" placeholder="Search team members..." type="search"></div>
									<div class="users-list-w">
										<div class="user-w with-status status-green">
											<div class="user-avatar-w">
												<div class="user-avatar"><img alt="" src="img/avatar1.jpg"></div>
											</div>
											<div class="user-name">
												<h6 class="user-title">John Mayers</h6>
												<div class="user-role">Account Manager</div>
											</div>
											<div class="user-action">
												<div class="os-icon os-icon-email-forward"></div>
											</div>
										</div>
										<div class="user-w with-status status-green">
											<div class="user-avatar-w">
												<div class="user-avatar"><img alt="" src="img/avatar2.jpg"></div>
											</div>
											<div class="user-name">
												<h6 class="user-title">Ben Gossman</h6>
												<div class="user-role">Administrator</div>
											</div>
											<div class="user-action">
												<div class="os-icon os-icon-email-forward"></div>
											</div>
										</div>
										<div class="user-w with-status status-red">
											<div class="user-avatar-w">
												<div class="user-avatar"><img alt="" src="img/avatar3.jpg"></div>
											</div>
											<div class="user-name">
												<h6 class="user-title">Phil Nokorin</h6>
												<div class="user-role">HR Manger</div>
											</div>
											<div class="user-action">
												<div class="os-icon os-icon-email-forward"></div>
											</div>
										</div>
										<div class="user-w with-status status-green">
											<div class="user-avatar-w">
												<div class="user-avatar"><img alt="" src="img/avatar4.jpg"></div>
											</div>
											<div class="user-name">
												<h6 class="user-title">Jenny Miksa</h6>
												<div class="user-role">Lead Developer</div>
											</div>
											<div class="user-action">
												<div class="os-icon os-icon-email-forward"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--------------------
							END - Sidebar
							-------------------->
					</div>
				</div>
			</div>
			<div class="display-type"></div>
		</div>
		<script src="<?= asset('js/mix-asset.js') ?>"></script>
		<script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','../www.google-analytics.com/analytics.js','ga');
			
			ga('create', 'UA-42863888-9', 'auto');
			ga('send', 'pageview');
		</script>
	</body>
	<!-- Mirrored from light.pinsupreme.com/users_profile_big.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 09 Nov 2019 20:15:00 GMT -->
</html>