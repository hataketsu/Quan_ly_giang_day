@extends('layouts.blank')

@section('body_content')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>Quản lý giảng dạy</b></a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Đăng nhập để bắt đầu phiên làm việc</p>
            {!! BootForm::horizontal() !!}
            {!! BootForm::email() !!}
            {!! BootForm::password('password','Mật khẩu') !!}
            {!! BootForm::checkbox('remember','Ghi nhớ') !!}
            {!! BootForm::submit('Đăng nhập') !!}
            {!! BootForm::close() !!}
        </div>
    </div>
    </body>

@endsection
