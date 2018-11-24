@extends('layouts.default')

@section('content')
    <div class="content pad">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Đăng ký</h3></div>

                    <div class="box-body">
                        {!! BootForm::horizontal() !!}
                        {!! BootForm::text('name','Họ và tên') !!}
                        {!! BootForm::email('email','Địa chỉ E-Mail') !!}
                        {!! BootForm::password('password','Mật khẩu') !!}
                        {!! BootForm::password('password_confirmation','Nhập lại mật khẩu') !!}
                        {!! BootForm::submit('Đăng ký') !!}
                        {!! BootForm::close() !!}
                        <br>
                        <p class="text-center">Đã có tài khoản? <a href="/login">Đăng nhập</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
