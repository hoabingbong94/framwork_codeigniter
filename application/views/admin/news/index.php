<?php
$title = 'Danh sách tin tức';
//echo $string;die();
?>
<div id="breadcrumbs">
    <ul class="breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= base_url('admin/admin/index') ?>">Trang chủ</a>
            <span class="divider"><i class="fa fa-angle-right"></i></span>
        </li>
        <li class="active ">
            <i class="glyphicon glyphicon-file" aria-hidden="true"></i>
            Quản trị tin tức
        </li>
    </ul>
</div>
<div class="notepad">
    <p class="note"><code >Thông báo :</code></p>
    <!--<span ><marquee class="mar">Tin mới nhất hiện đang phát</marquee></span>-->
</div>
<div class="table-big">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Danh sách nội dung bài tin<a href="<?= base_url('admin/news/create') ?>" class="pull-right btn btn-success box-input"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Thêm mới</a></h3>
        </div>
        <table class="table table-style">
            <thead>
                <tr>
                    <th style="width: 40px;">ID</th>
                    <th style="width: 100%;">Nội dung</th>
                    <th style="width: 30px; text-align: center;">#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($info as $item) {
                    ?>
                    <tr>
                        <th>
                            <?= $item->ID ?>
                        </th>
                        <td>
                            <ul class="media-list">
                                <li class="media">
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="<?= url_images('news/') . $item->Images_Url ?>"/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <div class="head">
                                            <h4 class="media-heading  post-h4" >
                                                <!--Hiển thị tên chuyên mục-->
                                                <?= $list[$item->CategoriesID] ?>
                                            </h4>
                                            <span  title="Giờ đăng" class="minute pull-right"><?php
                                                $str = strtotime($item->DateCreate);
                                                echo date('H:i:s d-m-Y', $str)
                                                ?></span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="content">
                                            <span class="content_r">
                                                <a href="update/<?= $item->ID ?>" > <?= ucfirst(word_limiter($item->Title, 30) . '') ?> <a/>
                                            </span>
                                        </div>
                                        <div style="width: 100%; margin-top: 8px; position: relative;">
                                            <span class="new-fullname">
                                                <i class="fa fa-circle" title="Hiển thị" aria-hidden="true">&nbsp;<?= ($item->Status) ? 'Hiển thị' : 'Ẩn' ?>&nbsp; |&nbsp;</i>
                                                <i class="fa fa-user" title="Người đăng" aria-hidden="true">&nbsp;<?= $admin[$item->UserCreate] ?>&nbsp; |&nbsp; </i>
                                                <i class="fa fa-file-text-o" title="Giờ đăng" aria-hidden="true">&nbsp;<?php
                                                    $str = strtotime($item->DateCreate);
                                                    echo date('H:i:s d-m-Y', $str)
                                                    ?></span></i>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </td>
                        <td>
                            <ul class="nav flaty-nav pull-right">
                                <li class="user-profile">
                                    <div data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
                                        <span class="btn btn-default" id="user_info">...</span>
                                    </div>
                                    <ul class="dropdown-menu dropdown-navbar" id="user_menu">
                                        <li><a class="box-delete" href="<?= url_admin('news/view/' . $item->ID) ?>"><i class="fa fa-eye "></i>Xem</a></li>
                                        <li><a class="box-delete" href="#"><i class="fa fa-trash-o"></i>Xoá</a></li>


                                    </ul>
                                </li>
                            </ul>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

