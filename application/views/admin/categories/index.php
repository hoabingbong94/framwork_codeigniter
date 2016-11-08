
<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Danh sách các chuyên mục</h1>
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
            Quản trị chuyên mục
        </li>
    </ul>
</div>
<?php $this->load->view('admin/message/message') ?>
<div class="row">
    <div class="col-md-12">

        <div class="box box-green">
            <div class="box-title">
                <h3><i class="fa fa-table"></i>Danh sách các chuyên mục</h3>
                <div class="box-tool">
                    <p>Tổng số chuyên mục : <?= $total_rows ?></p>
                    <!--<a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>-->
                </div>
            </div>
            <div class="box-content">
                <div class="btn-toolbar pull-left">
                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="" href="<?= base_url('admin/categories/create') ?>" data-original-title="Thêm mới"><i class="fa fa-plus"></i></a>
                        <a class="btn btn-circle show-tooltip" title="" href="#" data-original-title="Xoá Chọn"><i class="fa fa-trash-o"></i></a>
                    </div>

                    <div class="btn-group">
                        <a class="btn btn-circle show-tooltip" title="" href="<?= base_url('admin/categories/index') ?>" data-original-title="Làm mới"><i class="fa fa-repeat"></i></a>
                    </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <!--</table>-->
                    <table class="table table-advance">
                        <thead>
                            <tr>
                                <th style="width:18px"><input type="checkbox"></th>
                                <th>#</th>
                                <th>Tên chuyên mục</th>
                                <th class="text-center">Mô tả</th>
                                <th class="text-center" >Chuyên mục cha</th>
                                <th>Trạng thái</th>
                                <th class="visible-md visible-lg" style="width:130px; padding-left: 30px;">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($listCategories as $item) {
                                ?>
                                <tr class="table-flag-blue">
                                    <td><input type="checkbox"></td>
                                    <td><?= $item->ID ?></td>
                                    <td><?= $item->title ?></td>
                                    <td class="text-center"><?= $item->description ?></td>
                                    <td class="text-center" ><?= $item->parentid ?></td>
                                    <td><?php
                                        if ($item->Status == 0) {
                                            echo "Không hoạt động";
                                        } else {
                                            echo "Hoạt động";
                                        }
                                        ?></td>
                                    <td class="visible-md visible-lg">
                                        <div class="btn-group">
                                            <!--<a class="btn btn-sm show-tooltip" title="" href="#" data-original-title="View"><i class="fa fa-search-plus"></i></a>-->
                                            <a class="btn btn-sm show-tooltip" title="" href="<?= base_url('admin/categories/update/' . $item->ID) ?>" data-original-title="Sửa"><i class="fa fa-edit"></i></a>
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
                    <nav aria-label="Page navigation">
                        <?= $pagination; ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<a id="btn-scrollup" class="btn btn-circle btn-lg" href="#" style="display: inline;"><i class="fa fa-chevron-up"></i></a>