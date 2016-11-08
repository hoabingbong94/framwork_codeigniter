<div id="navbar" class="navbar">
    <button type="button" class="navbar-toggle navbar-btn collapsed" data-toggle="collapse" data-target="#sidebar">
        <span class="fa fa-bars"></span>
    </button>
    <a class="navbar-brand" href="#">
        <small>
            <i class="fa fa-desktop"></i>
            Hello Media
        </small>
    </a>
    <ul class="nav flaty-nav pull-right">
        <li class="user-profile">
            <div data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                <img class="nav-user-photo" src="<?= base_url('public/admin') ?>/img/demo/avatar/avatar1.jpg" alt="Penny's Photo">
                <span class="hhh" id="user_info"><?= 'Vũ Văn Hoà' ?></span>
                <i class="fa fa-caret-down"></i>
            </div>
            <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                <!--                <li class="nav-header">
                                    <i class="fa fa-clock-o"></i> Đăng nhập  ?>
                                </li>-->
                <li>
                    <a href="#">
                        <i class="fa fa-cog"></i> Đổi mật khẩu
                    </a>
                </li>
                <li>
                    <a href="<?= base_url('admin/admin/profile') ?>">
                        <i class="fa fa-user"></i> Sửa thông tin
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="<?= url_admin('admin/logout') ?>">
                        <i class="fa fa-off"></i> Thoát
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>