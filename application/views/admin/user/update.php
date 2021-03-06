<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i>Sửa quản lý người dùng</h1>
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
            <a href="<?= base_url('admin/user/index') ?>">Quản trị người dùng</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active"><i class="glyphicon glyphicon-cog color-icon" aria-hidden="true"></i>
            Cập nhập thông tin người dùng</li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-bars"></i>Cập nhập thông tin người dùng</h3>
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
                            <input placeholder="Nhập họ & tên..." class="form-control input-sm" value="<?= $info->fullname ?>" name="fullname" type="text">
                            <div class="clear error" name="name_error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Tên người dùng</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên đăng nhập..." class="form-control input-sm" value="<?= $info->username ?>" name="username" type="text">

                            <div class="clear error" name="name_error"></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Email</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên đăng nhập..." class="form-control input-sm" value="<?= $info->email ?>" name="email" type="email">

                            <div class="clear error" name="name_error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Số điện thoại</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên số điện thoại..." class="form-control input-sm" value="<?= $info->phone ?>" name="phone" type="text">

                            <div class="clear error" name="name_error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Đại chỉ</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên địa chỉ..." class="form-control input-sm" value="<?= $info->address ?>" name="address" type="text">

                            <div class="clear error" name="name_error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Giới tính</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <?php
                            $list = array('0' => 'Nam', '1' => 'Nữ');
                            echo form_dropdown(['name' => 'gender', 'class' => 'form-control input-sm'], $list, $info->gender);
                            ?>
                            <div class="clear error" name="name_error"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
                            <button type="submit" name="update_data" class="btn btn-primary"><i class="fa fa-cogs" aria-hidden="true"></i> Cập nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>