@extends("layouts.basic")
@section("content")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: white">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Danh sách phân công giảng dạy</li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>

                    <div class="box-body">
                        <div class="btn-group pull-right">
                            <a href="/phan_cong_giang_day/create" class="btn bg-green"><i class="fa fa-plus"></i> Thêm
                                phân công giảng dạy mới</a>
                            <button class="btn btn-warning" onclick="delete_selected()"><i class="fa fa-remove"></i> Xoá
                                các
                                phân công giảng dạy đã chọn
                            </button>
                        </div>
                        <br>
                        <br>
                        <form action="/phan_cong_giang_day/mass_delete" method="post" id="main_list_form">
                            @csrf
                            <table id="main_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Chọn
                                    </th>
                                    <th>
                                        Giảng viên
                                    </th>
                                    <th>
                                        Học phần
                                    </th>
                                    <th>
                                        Lớp
                                    </th>
                                    <th>Phòng học</th>
                                    <th>Ngày dạy</th>
                                    <th>Tiết học</th>
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
                                            {{$item->giang_vien->ten}}
                                        </td>
                                        <td>
                                            {{$item->hoc_phan->ten}}
                                        </td>
                                        <td>
                                            {{$item->lop->ten}}
                                        </td>
                                        <td>
                                            {{$item->phong_hoc->ten}}
                                        </td>
                                        <td>{{$item->ngay_day}}</td>
                                        <td>{{$item->get_text_tiet_hoc()}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary"
                                                   href="/phan_cong_giang_day/{{$item->id}}/edit">
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

