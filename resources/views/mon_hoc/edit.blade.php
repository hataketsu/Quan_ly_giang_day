@extends('layouts.default')

@section('content')
    <div class="content pad">
        <div class="box ">
            <div class="box-header with-border">
                <?php if (!isset($item))
                    $item = null;?>
                <h3 class="box-title">{!!$item==null?"Tạo mon hoc mới":"Sửa mon hoc"!!}
                </h3>
            </div>
            <div class="box-body">
                {!!BootForm::horizontal(['model'=>$item,'store'=>'mon_hoc.store','update'=>'mon_hoc.update','enctype'=>"multipart/form-data",'id'=>'edit_advertise'])!!}
                {!!BootForm::text('name','Ten mon hoc')!!}
                {!!BootForm::close()!!}
            </div>
            <div class="box-footer text-center">
                <a href="javascript:void(0)" onclick="$('#edit_advertise').submit();" class="text-uppercase"><b>
                        <i class="fa fa-pencil" style="margin-right: 4px"></i>
                        @if($item==null)
                            Thêm mon hoc
                        @else
                            Lưu mon hoc
                        @endif
                    </b></a>
            </div>
        </div>
    </div>
@endsection