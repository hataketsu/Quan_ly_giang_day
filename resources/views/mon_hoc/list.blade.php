@extends('layouts.default')
@section('content')
    <a href="/mon_hoc/create">Tao mon hoc moi</a>
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
@endsection

