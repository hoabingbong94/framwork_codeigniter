<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Danh sách các quản trị viên</h1>
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
        <li class="active ">
            <i class="fa fa-user color-icon" aria-hidden="true"></i>
            Quản trị admin
        </li>
    </ul>
</div>
<?php $this->load->view('admin/message/message') ?>
<div class="row">
    <div class="col-md-12">

        <div class="box box-green">
            <div class="box-title">
                <h3><i class="fa fa-table"></i>Danh sách các quản trị viên</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="btn-toolbar pull-left">
                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="" href="<?= base_url('admin/admin/create') ?>" data-original-title="Thêm mới"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-circle show-tooltip" title="" href="#" data-original-title="Xoá Chọn"><i class="fa fa-trash-o"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="" href="<?= base_url('admin/admin/index') ?>" data-original-title="Làm mới"><i class="fa fa-repeat"></i></a>
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-advance">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Tên đăng nhập</th>
                                <th class="text-center">Họ & tên</th>

                                <th>Trạng thái</th>
                                <th class="visible-md visible-lg" style="width:130px">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $item) {
                                ?>
                                <tr class="table-flag-blue">
                                    <td><input type="checkbox"></td>
                                    <td><?= $item->ID ?></td>
                                    <td><?= $item->username ?></td>
                                    <td class="text-center"><?= $item->fullname ?></td>

                                    <td><?php
                                        if ($item->ID == 0) {
                                            echo "Không hoạt động";
                                        } else {
                                            echo "Hoạt động";
                                        }
                                        ?></td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <!--<a class="btn btn-sm show-tooltip" title="" href="#" data-original-title="View"><i class="fa fa-search-plus"></i></a>-->
                                            <a class="btn btn-sm show-tooltip" title="" href="<?= base_url('admin/admin/update/' . $item->ID) ?>" data-original-title="Sửa"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger show-tooltip" title="" href="<?= base_url('admin/admin/delete/' . $item->ID) ?>" onclick="confirm('Bạn có muốn xoá dữ liệu này không?')" data-original-title="Xoá"><i class="fa fa-trash-o"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="text-right">
                    <ul class="pagination">
                        <li><a href="#">← Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">Next → </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<a id="btn-scrollup" class="btn btn-circle btn-lg" href="#" style="display: inline;"><i class="fa fa-chevron-up"></i></a>