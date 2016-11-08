<?php
if (isset($message) && $message) {
    ?>
    <div class="alert alert-info">
        <button class="close" data-dismiss="alert">×</button>
        <p><i class="fa fa-volume-down speaker" aria-hidden="true"></i> Thông báo : <?= $message; ?></p>
    </div>
    <?php
}
?>