
<div class="page-title">
    <div>
        <h1><i class="fa fa-file-o"></i> Danh sách sản phẩm</h1>
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
            <i class="glyphicon glyphicon-file" aria-hidden="true"></i>
            Quản trị sản phẩm
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-title">
                <h3><i class="fa fa-table"></i> Danh sách thông tin sản phẩm</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                </div>
            </div>
            <br>
            <div class="btn-toolbar pull-right">
                <div class="btn-group">
                    <a class="btn btn-circle show-tooltip" title="" href="create" data-original-title="Thêm mới"><i class="fa fa-plus"></i></a>
                </div>
                <div class="btn-group">
                    <a class="btn btn-circle show-tooltip" title="" href="index" data-original-title="Làm mới"><i class="fa fa-repeat"></i></a>
                </div>
            </div>
            <br><br>
            <div class="box-content" style="display: block;">
                <div class="notepad">
                    <p class="note"><code >Thông báo :</code></p>
                    <!--<span ><marquee class="mar">Tin mới nhất hiện đang phát</marquee></span>-->
                </div>
                <div class="table-big">
                    <table class="table table-striped table-hover fill-head">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-center">Ảnh</th>
                                <th>Chuyên mục</th>
                                <th>Giá</th>
                                <!--<th>Giảm giá</th>-->
                                <th>Quà tặng</th>
                                <th>Bảo hành</th>
                                <th>Mô tả</th>
                                <th>Trạng thái</th>
                                <th style="width: 150px">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($info as $item) : ?>
                                <tr>
                                    <td><?= $item->ID ?></td>
                                    <td><?= $item->Title ?></td>
                                    <td><img src="" class="img-thumbnail img-responsive images-product"/><?= $item->Images ?></td>
                                    <td><?= $list[$item->CategoriesID] ?></td>
                                    <td>
                                        <div class="product-width">
                                            <div class="lineprice" title="giá gốc"><?= $item->Price ?></div>
                                            <div class="lineThrough" title="giảm giá"><strike><?= $item->Sale ?></strike><span class="badge badge-success">Giảm</span></div>
                                        </div>
                                    </td>
                                    <td><?= $item->gitf ?></td>
                                    <td><?= $item->warranty ?></td>
                                    <td><?= $item->Description ?></td>
                                    <td><?= ($item->Status == 0) ? 'Không hiển thị' : 'Hiển thị' ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="update"><i class="fa fa-edit"></i> </a>
                                        <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-trash-o"></i> </a>
                                        <a class="btn btn-success btn-sm" title="Xem" href="view"><i class="glyphicon glyphicon-fullscreen"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>