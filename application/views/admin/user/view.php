<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-title">
                <h3><i class="fa fa-file"></i> Thông tin cá nhân người dùng</h3>
                <div class="box-tool">
                    <a data-action="collapse" href="#"><i class="fa fa-chevron-up"></i></a>
                    <a data-action="close" href="#"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-responsive img-thumbnail" src="<?= url_images('user/') . $info->Avatar ?>" >
                        <br><br>
                    </div>
                    <div class="col-md-9 user-profile-info">
                        <p><span>Tên người dùng :</span> <?= $info->username ?></p>
                        <p><span>Họ và tên :</span> <?= $info->fullname ?></p>
                        <p><span>Ngày sinh:</span>
                            <?php $str = strtotime($info->birthday);
                            echo date('d-m-Y', $str)
                            ?></p>
                        <p><span>Giới tính :</span> <?= ($info->gender == 0) ? 'Nam' : 'Nữ' ?></p>
                        <p><span>Địa chỉ :</span> <?= $info->address ?></p>
                        <p><span>Số điện thoại :</span> <?= '(+84) ' . $info->phone ?></p>
                        <p><span>Email:</span> <a href="mailto:#"><?= $info->email ?></a></p>
                        <p><span>Ngày tạo:</span> <?= $info->DateCreate ?></p>
                        <p><span>Thông tin chi tiết :</span> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>