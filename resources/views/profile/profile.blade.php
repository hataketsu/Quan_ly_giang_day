@extends('layouts.basic')

@section('content')
    <div class="content">
        <ol class="breadcrumb " style="background: white">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="/profile/{{$user->id}}">Tài khoản</a></li>
            <li class="active">{{$title}}</li>
        </ol>
        <div class="row">

            <div class="col-md-9">
                @yield('contentx')
            </div>
            <div class="col-md-3">
                @include('profile.menu')
            </div>
        </div>
    </div>
@endsection
