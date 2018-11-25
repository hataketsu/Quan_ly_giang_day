@extends("layouts.basic")
@section("content")
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb" style="background: white">
                    <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
                    <li class="active">Danh sách học phần</li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="box box-solid box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$title}}</h3>
                    </div>

                    <div class="box-body">
                        <div class="btn-group pull-right">
                            <a href="/hoc_phan/create" class="btn bg-green"><i class="fa fa-plus"></i> Thêm
                                học phần mới</a>
                            <button class="btn btn-warning" onclick="delete_selected()"><i class="fa fa-remove"></i> Xoá
                                các
                                học phần đã chọn
                            </button>
                        </div>
                        <br>
                        <br>
                        <form action="/hoc_phan/mass_delete" method="post" id="main_list_form">
                            @csrf
                            <table id="main_table" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        Chọn
                                    </th>
                                    <th>
                                        Khoá đào tạo
                                    </th>
                                    <th>
                                        Môn học
                                    </th>
                                    <th>
                                        Số tín chỉ thực hành
                                    </th>
                                    <th>
                                        Số tín chỉ lý thuyết
                                    </th>
                                    <th>Số tín chỉ</th>
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
                                            {{$item->khoa_dao_tao->ten}}
                                        </td>
                                        <td>
                                            {{$item->mon_hoc->name}}
                                        </td>
                                        <td>{{$item->tin_chi_thuc_hanh}}</td>
                                        <td>{{$item->tin_chi_ly_thuyet}}</td>
                                        <td>{{$item->tin_chi_ly_thuyet+$item->tin_chi_thuc_hanh}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-primary" href="/hoc_phan/{{$item->id}}/edit">
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

