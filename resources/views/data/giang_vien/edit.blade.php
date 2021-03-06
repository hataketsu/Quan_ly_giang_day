@extends("layouts.basic")
@section("content")
    <div class="content">
        <ol class="breadcrumb " style="background: white">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="/giang_vien"> Danh sách giảng viên</a></li>
            <li class="active">{{$title}}</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="box ">
                    <div class="box-header with-border">
                        <?php if (!isset($item))
                            $item = null;?>
                        <h3 class="box-title">{{$title}}
                        </h3>
                    </div>
                    <div class="box-body">
                        {!!BootForm::horizontal(["model"=>$item,"store"=>"giang_vien.store","update"=>"giang_vien.update","enctype"=>"multipart/form-data","id"=>"edit_form"])!!}
                        {!!BootForm::text("ten","Tên")!!}
                        {!!BootForm::text("ma_so","Mã số")!!}
                        {!!BootForm::text("chuyen_mon","Chuyên môn")!!}
                        {!!BootForm::text("chuc_vu","Chức vụ")!!}
                        {!!BootForm::date("ngay_sinh","Ngày sinh")!!}
                        {!!BootForm::select("gioi_tinh","Giới tính",["Nam","Nữ"])!!}
                        {!!BootForm::text("dien_thoai","Số điện thoại")!!}
                        {!!BootForm::select("khoa_id","Khoa",\App\Khoa::get_selects())!!}
                        {!!BootForm::close()!!}
                    </div>
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" onclick="$('#edit_form').submit();" class="text-uppercase"><b>
                                <i class="fa fa-pencil" style="margin-right: 4px"></i>
                                Lưu
                            </b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

