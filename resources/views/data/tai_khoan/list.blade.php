@extends("layouts.basic")
@section("content")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: white">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Danh sách tài khoản</li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>

                    <div class="box-body">
                        <div class="btn-group pull-right">
                            <a href="/tai_khoan/create" class="btn bg-green"><i class="fa fa-plus"></i> Thêm
                                tài khoản mới</a>
                            <button class="btn btn-warning" onclick="delete_selected()"><i class="fa fa-remove"></i> Xoá
                                các
                                tài khoản đã chọn
                            </button>
                        </div>
                        <br>
                        <br>
                        <form action="/tai_khoan/mass_delete" method="post" id="main_list_form">
                            @csrf
                            <table id="main_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Chọn
                                    </th>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Tên
                                    </th>
                                    <th>
                                        Chức vụ
                                    </th>
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
                                            {{$item->id}}
                                        </td>
                                        <td>
                                            {{$item->name}}
                                        </td>
                                        <td>
                                            {{$item->get_role()}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="/tai_khoan/{{$item->id}}/edit">
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

