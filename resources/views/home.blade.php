@extends('layouts.basic')

@section('content')
    <section class="content ">
        <ol class="breadcrumb " style="background: white">
            <li class="active><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        </ol>

        <div class="row">
            <div class="col-md-3">
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{\App\Mon_hoc::query()->count()}}</h3>

                        <p>Môn học</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-book"></i>
                    </div>
                    <a href="/mon_hoc" class="small-box-footer">
                        Quản lý <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
