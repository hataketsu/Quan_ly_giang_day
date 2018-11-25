@extends('profile.profile')

@section('contentx')
    <div class="content no-padding">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Đổi mật khẩu</h3>
            </div>
            <form class="form-horizontal" method="post">
                {{csrf_field()}}
                <div class="box-body">
                    @include('web_widgets.form_element.password',["name"=>"old_pw","desc"=>"Mật khẩu cũ *"])
                    @include('web_widgets.form_element.password',["name"=>"new_pw","desc"=>"Mật khẩu mới *"])
                    @include('web_widgets.form_element.password',["name"=>"new_pw_confirmation","desc"=>"Nhập lại mật khẩu mới *"])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary center-block" style="min-width: 180px">Đổi mật khảu</button>
                </div>
            </form>
        </div>
    </div>
@endsection