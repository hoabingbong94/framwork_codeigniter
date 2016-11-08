<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Danh sách các quản người dùng</h1>
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
            Quản trị người dùng
        </li>
    </ul>
</div>
<?php $this->load->view('admin/message/message') ?>
<div class="row">
    <div class="col-md-12">

        <div class="box box-green">
            <div class="box-title">
                <h3><i class="fa fa-table"></i>Danh sách thông tin người dùng</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="btn-toolbar pull-left">
                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="" href="<?= base_url('admin/user/create') ?>" data-original-title="Thêm mới"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-circle show-tooltip" title="" href="#" data-original-title="Xoá Chọn"><i class="fa fa-trash-o"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="" href="<?= base_url('admin/user/index') ?>" data-original-title="Làm mới"><i class="fa fa-repeat"></i></a>
                    </div>
                </div>
                <br><br>
                <div class="table-big">
                    <table class="table table-striped table-hover fill-head">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox"></th>
                                <th>ID</th>
                                <th>Tên đăng nhập</th>
                                <th class="text-center">Tên người dùng</th>
                                <th>Email</th>
                                <th>SĐT</th>
                                <th>Địa chỉ</th>
                                <th>G/N</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th class="visible-md visible-lg" style="width:150px">Hành động</th>
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
                                    <td><?= $item->email ?></td>
                                    <td><?= '(+84)' . $item->phone ?></td>
                                    <td><?= $item->address ?></td>
                                    <td>
                                        <?php
                                        if ($item->gender == 0) {
                                            echo "Nam";
                                        } else {
                                            echo "Nữ";
                                        }
                                        ?>
                                    </td>

                                    <td><?= $item->DateCreate ?></td>
                                    <td><?php
                                        if ($item->ID == 0) {
                                            echo "Không hoạt động";
                                        } else {
                                            echo "Hoạt động";
                                        }
                                        ?></td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <a class="btn btn-sm show-tooltip" title="" href="<?= base_url('admin/user/view/' . $item->ID) ?>" data-original-title="Xem"><i class="fa fa-search-plus"></i></a>
                                            <a class="btn btn-sm show-tooltip" title="" href="<?= base_url('admin/user/update/' . $item->ID) ?>" data-original-title="Sửa"><i class="fa fa-edit"></i></a>

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