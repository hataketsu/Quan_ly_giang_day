@extends("profile.profile")

@section("contentx")
    <div class="content no-padding">
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Chỉnh sửa thông tin cá nhân</h3>
            </div>
            <form class="form-horizontal" method="post" action="#">
                {{csrf_field()}}
                <div class="box-body">
                    @include("web_widgets.form_element.text_input",["name"=>"name","desc"=>"Họ và tên","value"=>Auth::user()->name])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary center-block" style="min-width: 180px">Lưu thông tin
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection