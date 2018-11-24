<?php if ( ! isset( $value ) ) $value = "" ?>
<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    <label for="{{$name}}" class="col-md-2 control-label">{{$desc}}</label>
    <div class="col-md-8">
        <div id="map_div" style="width: 100%; height: 400px;"></div>
        <input type="hidden" name="latitude" id="_input_latitude">
        <input type="hidden" name="longitude" id="_input_longitude">
    </div>
</div>
<script>
    $('#map_div').locationpicker({
        location: {
            latitude: {{isset($spa)&&$spa->latitude!=0?$spa->latitude:21.0228161}},
            longitude: {{isset($spa)&&$spa->longitude!=0?$spa->longitude:105.801944}}
        },
        inputBinding: {
            latitudeInput: $('#_input_latitude'),
            longitudeInput: $('#_input_longitude')
        }
    });

</script>

