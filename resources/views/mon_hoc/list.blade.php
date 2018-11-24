@extends('layouts.basic')
@section('content')
    <div class="content">
        <ol class="breadcrumb " style="background: white">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li class="active">{{$title}}</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="box-title">Quan ly mon hoc</div>
                    </div>
                    <div class="box-body">
                        <ul>
                            @foreach($items as $item)
                                <li>{{$item->name}}</li>
                                <a href="/mon_hoc/{{$item->id}}/delete" class="btn btn-danger">Xoa</a>
                                <a href="/mon_hoc/{{$item->id}}/edit" class="btn btn-primary">Sua</a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

