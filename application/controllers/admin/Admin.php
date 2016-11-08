<?php

/**
 * Description of Admin
 *
 * @author Bọ Chét
 */
class Admin extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    function index() {
        //load tiêu đề trang
        $this->data['title'] = 'Danh sách thông tin admin';

        //load danh sách admin
        $input = array();
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;

        //load thông tin thông báo
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load trang view
        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/layout/main', $this->data);
    }

    function create() {
        //load tiêu đề trang
        $this->data['title'] = 'Thêm mới thông tin admin';

        //thêm mới
        if ($this->input->post()) {
            $this->form_validation->set_rules('fullname', 'họ và tên', 'required');
            $this->form_validation->set_rules('username', 'tên đăng nhập', 'required|min_length[5]|callback_check_user');
            $this->form_validation->set_rules('password', 'mật khẩu', 'required|min_length[3]');
            $this->form_validation->set_rules('re_password', 'nhập lại mật khẩu', 'required|matches[password]|min_length[3]');
            if ($this->form_validation->run()) {
                $fullname = $this->input->post('fullname');
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $data = array(
                    'fullname' => $fullname,
                    'username' => $username,
                    'password' => md5(md5($password)),
                    'DateCreate' => date('Y-m-d H:i:s')
                );
                if ($this->admin_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm dữ liệu thành công');
                }
                redirect(url_admin('admin'));
            }
        }
        //load view
        $this->data['temp'] = 'admin/admin/create';
        $this->load->view('admin/layout/main', $this->data);
    }

    //kiểm tra username đã tồn tại hay chưa?
    function check_user() {
        $username = $this->input->post('username');
        $where = array(
            'username' => $username);
        //kiểm tra xem usẻname đã tồn tại hay chưa?
        if ($this->admin_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại ! Bạn vui lòng chọn tài khoản khác');
            return FALSE;
        }
        return TRUE;
    }

    public function profile() {
        //lấy ID trên url và load thông tin ra
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $info = $this->admin_model->get_info($id);
        $this->data['info'] = $info;

        //load view
        $this->data['temp'] = 'admin/admin/profile';
        $this->load->view('admin/layout/main', $this->data);
    }

    function update() {
        //load tiêu đề 
        $this->data['title'] = 'Cập nhập thông tin admin';

        //lấy ID trên url và load thông tin ra
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $info = $this->admin_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(url_admin('admin'));
        }

        $this->data['info'] = $info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('fullname', 'họ và tên', 'required');
            $this->form_validation->set_rules('username', 'tên đăng nhập', 'required|min_length[8]|callback_check_user');
            $password = $info->password;
            if (isset($password)) {
                $this->form_validation->set_rules('password', 'mật khẩu', 'required|min_length[6]');
                $this->form_validation->set_rules('re_password', 'nhập lại mật khẩu', 'required|matches[password]|min_length[6]');
            }

            if ($this->form_validation->run()) {
                $fullname = $this->input->post('fullname');
                $username = $this->input->post('username');

                $data['fullname'] = $fullname;
                $data['username'] = $username;
                $data['DateUpdate'] = date('Y-m-d H:s:i');
                if ($password) {
                    $data['password'] = $password;
                }
                $rs = $this->admin_model->update($id, $data);
                if ($rs) {
                    $this->session->set_flashdata('message', 'Cập nhập dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhập dữ liệu không thành công');
                }
                redirect(url_admin('admin'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/admin/update';
        $this->load->view('admin/layout/main', $this->data);
    }

    function delete() {
        //lấy ID trên url và load thông tin ra
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $info = $this->admin_model->get_info($id);

        //load view thông báo
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản trị viên');
            redirect(url_admin('admin'));
        }

        //thực hiện xoá
        $this->admin_model->delete($id);
        $this->session->set_flashdata('message', 'Xoá dữ liệu thành công');

        redirect(url_admin('admin'));
    }

    function logout() {
        if ($this->session->userdata('login')) {
            $this->session->unset_userdata('login');
        }
        redirect(url_admin('login'));
    }

}
