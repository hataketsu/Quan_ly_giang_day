<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        <div class="checkbox">
            <label>
				<?php if ( ! isset( $value ) ) $value = ""?>
                <input type="checkbox"
                       name="remember" {{ old("remember") ? "checked" : "" }}> Nhớ tài khoản
            </label>
        </div>
    </div>
</div>