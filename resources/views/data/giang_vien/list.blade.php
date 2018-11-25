@extends('layouts.basic')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: white">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Danh sách giảng viên</li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>

                    <div class="box-body">
                        <div class="btn-group pull-right">
                            <a href="/giang_vien/create" class="btn bg-green"><i class="fa fa-plus"></i> Thêm
                                giảng viên mới</a>
                            <button class="btn btn-warning" onclick="delete_selected()"><i class="fa fa-remove"></i> Xoá
                                các
                                giảng viên đã chọn
                            </button>
                        </div>
                        <br>
                        <br>
                        <form action="/giang_vien/mass_delete" method="post" id="main_list_form">
                            @csrf
                            <table id="main_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Chọn
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Chuyên môn
                                    </th>
                                    <th>Chức vụ</th>
                                    <th>Ngày sinh</th>
                                    <th>Giới tính</th>
                                    <th>Số điện thoại</th>
                                    <th>Khoa</th>
                                    <th>
                                        Hành động
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $item)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="checked_{{$item->id}}">
                                        </td>
                                        <td>
                                            {{$item->ten}}
                                        </td>
                                        <td>
                                            {{$item->chuyen_mon}}
                                        </td>
                                        <td>
                                            {{$item->chuc_vu}}
                                        </td>
                                        <td>
                                            {{$item->ngay_sinh}}
                                        </td>
                                        <td>
                                            {{['Nam','Nữ'][$item->gioi_tinh]}}
                                        </td>
                                        <td>
                                            {{$item->dien_thoai}}
                                        </td>
                                        <td>
                                            {{$item->khoa->name}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="/giang_vien/{{$item->id}}/edit">
                                                    <i class="fa fa-pencil"></i>
                                                    Chỉnh sửa
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

