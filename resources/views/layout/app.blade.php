<!DOCTYPE html>
<html>

<head>
    <!-- <title>Admin Dashboard HTML Template</title> -->
    <title>@yield('title', config('app.name', 'en'))</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
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

</head>

<body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">

        <div class="layout-w">
            <!-- Loader -->
            <div class="bookshelf_wrapper" id="loader">
                <ul class="books_list">
                    <li class="book_item first"></li>
                    <li class="book_item second"></li>
                    <li class="book_item third"></li>
                    <li class="book_item fourth"></li>
                    <li class="book_item fifth"></li>
                    <li class="book_item sixth"></li>
                </ul>
                <div class="shelf"></div>
            </div>

            <!-- Mobile Sidebar -->
            @include('layout.mob-sidebar')

            <!-- Web Sidebar -->
            @include('layout.sidebar')

            <div class="content-w">
                <!-- Topbar -->
                @include('layout.top-bar')
                @yield('breadcrumb')
                <div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
                <div class="content-i">
                    @yield('content-box')

                    <!-- @yield('content-panel') -->

                </div>
            </div>
        </div>
        <div class="display-type"></div>
    </div>
    <!-- JS -->
    @include('layout.js')
    @yield('footer_scripts')
</body>

</html>