
<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i>Thêm mới chuyên mục</h1>
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
            <a href="<?= base_url('admin/categories/index') ?>">Quản trị chuyên mục</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active"><i class="fa fa-plus color-icon" aria-hidden="true"></i>
            Thêm mới</li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="col-md-3">
                <div class="box-title">
                    <div class="flatRoundedCheckbox">
                        <input type="checkbox" name="" id="flatOneRoundedCheckbox" value="1">
                        <label for="flatOneRoundedCheckbox"></label>
                        <div></div>
                    </div>
                </div>      
            </div>
            <div class="box-title">
                
                <h3><i class="fa fa-bars"></i>Thêm mới chuyên mục</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Tên chuyên mục</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên chuyên mục..." class="form-control input-sm" value="<?= set_value('title') ?>" name="title" type="text">
                            <div class="clear error" name="name_error"><?= form_error('title') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Mô tả</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập mô tả..." class="form-control input-sm" value="<?= set_value('description') ?>" name="description" type="text">
                            <div class="clear error" name="name_error"><?= form_error('description') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Chuyên mục gốc</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <?= form_dropdown(['class' => 'form-control input-sm', 'name' => 'categories', 'value' => 'categories'], $list); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Thứ tự sắp xếp</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Thứ tự..."  class="form-control input-sm" value="<?= set_value('orderindex') ?>" name="orderindex" type="text">
                            <div class="clear error" name="name_error"><?= form_error('orderindex') ?></div>
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