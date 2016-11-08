<html>
    <head>
        <?php $this->load->view('admin/layout/head') ?>
    </head>
    <body>
        <?php $this->load->view('admin/layout/header'); ?>
        <div id="main-container" class="container">
            <div id="sidebar" class="navbar-collapse collapse">
                <?php $this->load->view('admin/layout/left'); ?>
            </div>
            <div id="main-content">
                <?php $this->load->view($temp, $this->data) ?>

                <footer>
                    <p class="text-info">Di Động Việt  &copy; 2016</p>
                </footer>
            </div>

        </div>

        <?php $this->load->view('admin/layout/footer'); ?>

    </body>
</html>
