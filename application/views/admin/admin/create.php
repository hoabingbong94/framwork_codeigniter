<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i>Thêm mới quản trị viên</h1>
        <!--<h4>Advance table with pagination and toolbar</h4>-->
    </div>
</div>
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Trang chủ</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li>
            <i class="fa fa-user"></i>
            <a href="<?= base_url('admin/admin/index') ?>">Quản trị admin</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active"><i class="fa fa-plus color-icon" aria-hidden="true"></i>
            Thêm mới</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Thêm mới quản trị viên</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <!--<a data-action="close" href="#"><i class="fa fa-times"></i></a>-->
                </div>
            </div>
            <div class="box-content">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Họ & tên</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập họ & tên..." class="form-control input-sm" value="<?= set_value('fullname') ?>" name="fullname" type="text">
                            <div class="clear error" name="name_error"><?= form_error('fullname') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Tên đăng nhập</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên đăng nhập..." class="form-control input-sm" value="<?= set_value('username') ?>" name="username" type="text">
                            <div class="clear error" name="name_error"><?= form_error('username') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Mật khẩu</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập mật khẩu..." class="form-control input-sm" name="password"  type="password">
                            <div class="clear error" name="name_error"><?= form_error('password') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Nhập lại mật khẩu</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập lại mật khẩu..." class="form-control input-sm" name="re_password" type="password">
                            <div class="clear error" name="name_error"><?= form_error('re_password') ?></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>