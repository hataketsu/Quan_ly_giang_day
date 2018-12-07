@extends("layouts.basic")
@section("content")
    <div class="content">
        <ol class="breadcrumb " style="background: white">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="/phan_cong_giang_day"> Danh sách phân công giảng dạy</a></li>
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
                        {!!BootForm::horizontal(["model"=>$item,"store"=>"phan_cong_giang_day.store","update"=>"phan_cong_giang_day.update","enctype"=>"multipart/form-data","id"=>"edit_form"])!!}
                        {!!BootForm::select("giang_vien_id","Giảng viên",\App\Giang_vien::get_selects())!!}
                        {!!BootForm::select("hoc_phan_id","Học phần",\App\Hoc_phan::get_selects())!!}
                        {!!BootForm::select("tiet_hoc[]","Tiết học",\App\Hoc_phan::getClasses(),json_decode($item->tiet_hoc),['multiple' => 'multiple','class'=>'select2'])!!}
                        {!!BootForm::select("ngay_trong_tuan[]","Ngày trong tuần",\App\Phan_cong_giang_day::getDayOfWeek(),json_decode($item->tiet_hoc),['multiple' => 'multiple','class'=>'select2'])!!}
                        {!!BootForm::date("ngay_bat_dau","Ngày bắt đầu", new \DateTime())!!}
                        {!!BootForm::date("ngay_ket_thuc","Ngày kết thúc", new \DateTime())!!}
                        {!!BootForm::select("lop_id","Lớp",\App\Lop::get_selects())!!}
                        {!!BootForm::select("phong_hoc_id","Phòng học",\App\Phong_hoc::get_selects())!!}
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

