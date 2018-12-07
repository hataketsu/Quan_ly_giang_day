<div class="box box-solid">
    <div class="box-header with-border">
        <h3 class="box-title"><strong>
                Tài khoản</strong>
        </h3>
    </div>

    <div class="box-body no-padding">
        <ul class="nav nav-pills nav-stacked">
            <li><a href="/profile/"><i class="fa fa-info"></i>Thông tin cá nhân</a></li>
            <li><a href="/profile/change_avatar"><i class="fa fa-image"></i>Đổi ảnh đại diện</a>
            </li>
            <li><a href="/profile/change_pw"><i class="fa fa-user-secret"></i>Đổi mật khẩu</a>
            </li>
            @if(Auth::user()->role=='giang_vien')
                <li><a href="/giang_vien/{{Auth::user()->giang_vien_id}}/edit"><i class="fa fa-info"></i>Đổi thông tin
                        giảng viên </a>
                </li>
            @endif
        </ul>
    </div>
</div>