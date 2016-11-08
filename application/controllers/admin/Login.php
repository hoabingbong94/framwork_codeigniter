<?php

/**
 * Description of Login
 *
 * @author Bọ Chét
 */
class Login extends MY_Controller {

    function __construct() {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    function index() {
        $this->data['title'] = 'Di động việt';
        if (isset($_POST['submit_login'])) {
            if ($this->input->post()) {
                $this->form_validation->set_rules('login', 'login', 'callback_checklogin');
                if ($this->form_validation->run()) {
                    $this->session->set_userdata('login', true);

                    redirect(url_admin('admin'));
                }
            }
        }
        $this->load->view('admin/login/index');
    }

    function checklogin() {
        $this->data['title'] = 'Di động việt';
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5(md5($password));
        $where = array(
            'username' => $username,
            'password' => $password,
        );
        $this->load->model('admin_model');
        if ($this->admin_model->check_exists($where)) {
            return true;
        }
        $this->form_validation->set_message(__FUNCTION__, '<p class="note">Tài khoản hoặc mật khẩu không đúng</p>');
        return false;
    }

}
