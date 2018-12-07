@extends("layouts.basic")
@section("content")
    <div class="content">
        <ol class="breadcrumb " style="background: white">
            <li><a href="/"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
            <li><a href="/tai_khoan"> Danh sách tài khoản</a></li>
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
                        {!!BootForm::horizontal(["model"=>$item,"store"=>"tai_khoan.store","update"=>"tai_khoan.update","enctype"=>"multipart/form-data","id"=>"edit_form"])!!}
                        @if($item->id==null)
                            {!!BootForm::email("email","Email")!!}
                            {!! BootForm::password('password','Mật khẩu') !!}
                            {!! BootForm::password('password_confirmation','Nhập lại mật khẩu') !!}
                        @endif
                        {!!BootForm::select("role","Chức vụ",\App\User::get_all_roles())!!}
                        {!!BootForm::select("giang_vien_id","Liên kết giảng viên",\App\Giang_vien::get_selects())!!}
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

