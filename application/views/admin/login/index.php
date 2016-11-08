<html>
    <head>
        <title><?= 'Di Động Việt @ 2016' ?></title>
        <?php $this->load->view('admin/layout/head') ?>
    </head>
    <body class="login-page">
        <!-- BEGIN Main Content -->
        <div class="login-wrapper">
            <!-- BEGIN Login Form -->
            <form id="form-login" action="" method="post">
                <h3>Đăng nhập bằng tài khoản</h3>
                <hr/>
                <div class="form-group">
                    <div class="controls">
                        <input type="text" placeholder="Tên đăng nhập" name="username" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <input type="password" placeholder="Mật khẩu" name="password" class="form-control" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="controls">
                        <?= form_error('login') ?>
                        <button type="submit" name="submit_login" class="btn btn-primary form-control">Đăng nhập</button>
                    </div>
                </div>
                <hr/>
                <p class="clearfix">
                    <span class="text-right">Di Động Việt @ 2016</span>
                </p>
            </form>
        </div>
        <!--<script src="../../ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
        <script>window.jQuery || document.write('<script src="<?= base_url("public/admin") ?>/assets/jquery/jquery-2.1.1.min.js"><\/script>')</script>
        <script src="<?= base_url("public/admin") ?>/assets/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            function goToForm(form)
            {
                $('.login-wrapper > form:visible').fadeOut(500, function () {
                    $('#form-' + form).fadeIn(500);
                });
            }
            $(function () {
                $('.goto-login').click(function () {
                    goToForm('login');
                });
                $('.goto-forgot').click(function () {
                    goToForm('forgot');
                });
                $('.goto-register').click(function () {
                    goToForm('register');
                });
            });
        </script>
    </body>
</html>
