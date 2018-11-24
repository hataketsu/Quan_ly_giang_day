@extends('layouts.blank')

@section('body_content')
    <body class=" hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
        <header class="main-header">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <nav class="navbar navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <a href="/" class="navbar-brand"><b>Quan ly giang day</b></a>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                        @section('left_menu')
                        @show
                    </div>
                    @include('layouts.navigation.right_nav')
                </div>
            </nav>
        </header>


        <div class="content-wrapper">
            <div class="container">
                <br>
                @yield('content')
            </div>

            <div class="container-fluid">
                @yield('content-fluid')
            </div>
        </div>
        @section('footer')
            @include('layouts.footer')
        @show


    </div>
    </body>
@endsection

