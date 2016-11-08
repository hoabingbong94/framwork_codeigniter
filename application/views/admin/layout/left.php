<ul class="nav nav-list" style="height: auto;">
    <li class="active">
        <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="#" class="dropdown-toggle">
            <i class="fa fa-tablet" aria-hidden="true"></i>
            <span>Quản lý báng hàng</span>
            <b class="arrow fa fa-angle-right"></b>
        </a>
        <ul class="submenu">
            <li><a href="#">Giao dịch</a></li>
            <li><a href="<?= base_url('admin/detail/index') ?>">Đơn hàng sản phẩm</a></li>     
            <li><a href="<?= base_url('admin/news/index') ?>">Tin tức</a></li>     
        </ul>
    </li>
    <li>
        <a href="#" class="dropdown-toggle">
            <i class="fa fa-calendar"></i>
            <span>Sản phẩm</span>
            <b class="arrow fa fa-angle-right"></b>
        </a>
        <ul class="submenu">
            <li><a href="<?= base_url('admin/product/index') ?>">Sản phẩm</a></li>
            <li><a href="<?= base_url('admin/categories/index') ?>">Danh mục</a></li>     
            <li><a href="<?= base_url('admin/content/index') ?>">Phản hồi</a></li>     
        </ul>
    </li>
    <li>
        <a href="#" class="dropdown-toggle">
            <i class="fa fa-user"></i>
            <span>Tài khoản</span>
            <b class="arrow fa fa-angle-right"></b>
        </a>
        <ul class="submenu">
            <li><a href="<?= base_url('admin/admin/index') ?>">Danh sách admin</a></li>
            <li><a href="<?= base_url('admin/user/index') ?>">Danh sách người dùng</a></li>     
        </ul>
    </li>
    <li>
        <a href="#" class="dropdown-toggle">
            <i class="glyphicon glyphicon-film"></i>
            <span>Videos & Banner</span>
            <b class="arrow fa fa-angle-right"></b>
        </a>
        <ul class="submenu">
            <li><a href="<?= base_url('admin/videos/index') ?>">Danh sách videos</a></li>
            <li><a href="<?= base_url('admin/banner/index') ?>">Danh sách  banner</a></li>     
        </ul>
    </li>
    <li>
        <a href="#" class="dropdown-toggle">
            <i class="fa fa-life-ring"></i>
            <span>Hỗ trợ & liên hệ</span>
            <b class="arrow fa fa-angle-right"></b>
        </a>
        <ul class="submenu">
            <li><a href="<?= base_url('admin/support/index') ?>">Hỗ trợ</a></li>
            <li><a href="<?= base_url('admin/contact/index') ?>">Liên hệ</a></li>     
        </ul>
    </li>

</ul>
<div id="sidebar-collapse" class="visible-lg">
    <i class="fa fa-angle-double-left"></i>
</div>