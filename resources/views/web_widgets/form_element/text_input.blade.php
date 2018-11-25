<div class="form-group{{ $errors->has($name) ? " has-error" : "" }}">
    <label for="{{$name}}" class="col-md-2 control-label">{{$desc}}</label>
	<?php if ( ! isset( $value ) ) $value = ""?>

    <div class="col-md-8">
        <input type="text" class="form-control" name="{{$name}}" value="{{ old($name,$value) }}">
        @include("web_widgets.form_element.error_block",["name"=>$name])
    </div>
</div>