@extends("profile.profile")

@section("contentx")
    <div class="content no-padding">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Đổi ảnh đại diện</h3>
            </div>
            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="box-body">
                    @include("web_widgets.form_element.file_input",["name"=>"avatar","desc"=>"Ảnh đại diện mới"])
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary  center-block" style="min-width: 180px">Đổi ảnh đại
                        diện
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection