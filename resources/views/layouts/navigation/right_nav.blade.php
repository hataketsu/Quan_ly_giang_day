<!-- Navbar Right Menu -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        @if(Auth::check())

            @if(Auth::user()->is_admin)
                <li>
                    <a href="/admin/" title="Quản lý"><i class="fa fa-gears"></i></a>
                </li>
            @endif
            {{--@include('layouts.navigation.right.notifications')--}}
        <!-- User Account Menu -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
{{--                    <img src="{{Auth::user()->get_avatar()}}" class="user-image" alt="User Image">--}}
                    <span class="hidden-xs">{{Auth::user()->name}}</span>
                </a>
{{--                @include('layouts.navigation.right.user.panel',["user" => \Auth::user()])--}}
            </li>
        @else
            <li>
                <a href="/login">@lang('auth.login')</a>
            </li>
            <li>
                <a href="/register">@lang('auth.signup')</a>
            </li>
        @endif
    </ul>
</div>
<!-- /.navbar-custom-menu -->
