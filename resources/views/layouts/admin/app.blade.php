<!--

=========================================================
* Volt Free - Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>ProjectKel1 - Pelanggan </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets-admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets-admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets-admin/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Start CSS -->
    @include('layouts.admin.css');
    <!-- End CSS -->
</head>

<style>
    .alert-success {
        background-color: #9fc579;
        color: var(--tertiary-color);
        border-left: 5px solid var(--tertiary-color);
        border-radius: 8px;
    }
</style>

<body>
    <!-- Sidebar Start -->
    @include('layouts.admin.sidebar');
    <!-- Sidebar End -->

    <main class="content">
        <!-- Header Start -->
        @include('layouts.admin.header');
        <!-- Header End -->

        <!-- Main Content Start -->
        @yield('content');
        <!-- Main Content End -->

        <!-- Footer Start -->
        @include('layouts.admin.footer');
        <!-- Footer End -->

        <!-- JS Start -->
        @include('layouts.admin.js');
        <!-- JS End -->
    </main>
</body>

</html>
