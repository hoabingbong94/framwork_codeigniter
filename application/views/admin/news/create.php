
<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i>Thêm mới tin tức</h1>
        <!--<h4>Advance table with pagination and toolbar</h4>-->
    </div>
</div>
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= base_url('admin/admin/index') ?>">Trang chủ</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li>
            <i class="fa fa-user"></i>
            <a href="<?= base_url('admin/news/index') ?>">Quản trị tin tức</a>
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
                <h3><i class="fa fa-bars"></i>Thêm mới tin tức</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        
                        <label class="col-sm-3 col-lg-2 control-label">Trạng thái</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <label class="checkbox">
                                <input type="checkbox" value="1">
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Chuyên mục gốc</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <?= form_dropdown(['class' => 'form-control input-sm', 'name' => 'CategoriesID', 'value' => 'categories'], $list); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Tên tin tức</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Nhập tên tin tức..." class="form-control input-sm" value="<?= set_value('Title') ?>" name="Title" type="text">
                            <div class="clear error" name="name_error"><?= form_error('Title') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Mô tả</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <textarea id="editor" name="Description" rows="1" 
                                      class="" value="<?= set_value('Description') ?>">
                            </textarea>
                            <script>
                                CKEDITOR.replace('editor');
                                CKEDITOR.config.width = '10px';
                                CKEDITOR.config.height = '10px';
                            </script>
                            <div class="clear error" name="name_error"><?= form_error('Description') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Ảnh đại diện</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input class="form-control input-sm" name="image" type="file">
                            <div class="clear error" name="name_error"><?= form_error('image') ?></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-lg-2 control-label">Từ khoá tìm kiếm</label>
                        <div class="col-sm-9 col-lg-10 controls">
                            <input placeholder="Từ khoá..."  class="form-control input-sm" value="<?= set_value('Keyword') ?>" name="Keyword" type="text">
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
