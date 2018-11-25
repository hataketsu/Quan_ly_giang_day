<div class="form-group{{ $errors->has($name) ? " has-error" : "" }}">
    <label for="{{$name}}" class="col-md-2 control-label">{{$desc}}</label>
	<?php if ( ! isset( $value ) ) $value = ""?>

    <div class="col-md-8">
        <textarea type="text" class="form-control" name="{{$name}}"
                  style="width: 100%;height: 100px">{!!  old($name,$value) !!}</textarea>
        @include("web_widgets.form_element.error_block",["name"=>$name])
    </div>
</div>