<aside class="main-sidebar">

    <section class="sidebar">

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>

		<?php
		$menu = config( "menu.main_menu" );
		?>
        @include('web_widgets.side_bar.menu',["menu"=>config("menu.main_menu")])
    </section>
</aside>