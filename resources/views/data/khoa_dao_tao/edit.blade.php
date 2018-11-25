@extends("layouts.basic")
@section("content")
    <div class="content">
        <ol class="breadcrumb " style="background: white">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="/khoa_dao_tao"> Danh sách khoá đào tạo</a></li>
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
                        {!!BootForm::horizontal(["model"=>$item,"store"=>"khoa_dao_tao.store","update"=>"khoa_dao_tao.update","enctype"=>"multipart/form-data","id"=>"edit_form"])!!}
                        {!!BootForm::text("ten","Tên")!!}
                        {!!BootForm::select("nganh_id","Ngành",\App\Nganh::get_selects())!!}
                        {!!BootForm::input("number","nam_nhap","Năm nhập")!!}
                        {!!BootForm::input("number","so_nam_dao_tao","Số năm đào tạo")!!}
                        {!!BootForm::close()!!}
                    </div>
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" onclick="$("#edit_form").submit();" class="text-uppercase"><b>
                                <i class="fa fa-pencil" style="margin-right: 4px"></i>
                                Lưu
                            </b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

