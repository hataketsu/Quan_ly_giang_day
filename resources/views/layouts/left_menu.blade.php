<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/uploads/{{Auth::user()->avatar}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Trực tuyến</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">DỮ LIỆU</li>
            <li class="treeview">
                <a href="#" class="auto_opened">
                    <i class="fa fa-dashboard"></i> <span>Nhập dữ liệu</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/mon_hoc"><i class="fa fa-circle-o"></i> Môn học</a></li>
                    <li><a href="/khoa"><i class="fa fa-circle-o"></i> Khoa</a></li>
                    <li><a href="/nganh"><i class="fa fa-circle-o"></i> Ngành</a></li>
                    <li><a href="/khoa_dao_tao"><i class="fa fa-circle-o"></i> Khoá đào tạo</a></li>
                    <li><a href="/hoc_phan"><i class="fa fa-circle-o"></i> Học phần</a></li>
                    <li><a href="/lop"><i class="fa fa-circle-o"></i> Lớp</a></li>
                    <li><a href="/giang_vien"><i class="fa fa-circle-o"></i> Giảng viên</a></li>
                    <li><a href="/phan_cong_giang_day"><i class="fa fa-circle-o"></i> Phân công giảng dạy</a></li>
                    <li><a href="/phong_hoc"><i class="fa fa-circle-o"></i> Phòng học</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-line-chart"></i> <span>Thống kê</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/mon_hoc"><i class="fa fa-circle-o"></i> Hồ sơ giảng viên</a></li>
                    <li><a href="/giao_vien"><i class="fa fa-circle-o"></i> Phân công giảng dạy</a></li>
                    <li><a href="/khoa"><i class="fa fa-circle-o"></i> Khối lượng giảng dạy</a></li>
                </ul>
            </li>
            <li class="header">KHÁC</li>
            <li><a href="#"><i class="fa fa-gears text-yellow"></i> <span> Cài đặt</span></a></li>
            <li><a href="#"><i class="fa fa-info-circle text-blue"></i> <span> Thông tin</span></a></li>
            <li><a href="#"><i class="fa fa-question-circle-o text-aqua"></i> <span> Hướng dẫn</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
