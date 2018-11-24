<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="/uploads/{{Auth::user()->avatar}}" class="user-image" alt="User Image">
    <span class="hidden-xs">{{Auth::user()->name}}</span>
</a>
<ul class="dropdown-menu">
    <li class="user-header">
        <img src="/uploads/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">

        <p>
            {{Auth::user()->name}} - Admin
            <small>Tham gia từ: {{(new Date(Auth::user()->created_at))->format('l j-m-Y')}}</small>
        </p>
    </li>
    <li class="user-footer">
        <div class="pull-left">
            <a href="/profile" class="btn btn-default btn-flat">Tài khoản</a>
        </div>
        <div class="pull-right">
            <a href="/logout" class="btn btn-default btn-flat">Đăng xuất</a>
        </div>
    </li>
</ul>