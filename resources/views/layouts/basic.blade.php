@extends('layouts.blank')
@section('body_content')
    <body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="/" class="logo">
                <span class="logo-mini"><b>QLGD</b></span>
                <span class="logo-lg"><b>Quản lý giảng dạy</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            @include('profile.profile_box')
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @include('layouts.left_menu')
        <div class="content-wrapper">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>

    <script>
        $(document).ready(function () {
            $('.sidebar-menu').tree()
        })
    </script>
    </body>
@endsection