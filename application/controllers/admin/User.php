<?php

/**
 * Description of User
 *
 * @author Bọ Chét
 */
class User extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    function index() {
        $input = array();
        $this->data['title'] = 'Danh sách thông tin người dùng';
        $list = $this->user_model->get_list($input);
        $this->data['list'] = $list;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/user/index';
        $this->load->view('admin/layout/main', $this->data);
    }

    function create() {
        $this->data['title'] = 'Thêm mới thông tin người dùng';
        if ($this->input->post()) {
            $this->form_validation->set_rules('Fullname', 'họ và tên', 'required');
            $this->form_validation->set_rules('Username', 'tên đăng nhập', 'required|min_length[5]|callback_check_user');
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
                if ($this->user_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm dữ liệu thành công');
                }
                redirect(url_user('user'));
            }
        }

        $this->data['temp'] = 'admin/user/create';
        $this->load->view('admin/layout/main', $this->data);
    }

    //kiểm tra username đã tồn tại hay chưa?
    function check_user() {
        $username = $this->input->post('username');
        $where = array(
            'username' => $username);
        //kiểm tra xem usẻname đã tồn tại hay chưa?
        if ($this->user_model->check_exists($where)) {
            $this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại ! Bạn vui lòng chọn tài khoản khác');
            return FALSE;
        }
        return TRUE;
    }

    function update() {
        $this->data['title'] = 'Cập nhập thông tin người dùng';
        $id = $this->uri->rsegment('3');

        $id = intval($id);
        $info = $this->user_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại quản thông tin người dùng');
            redirect(url_user('user'));
        }

        $this->data['info'] = $info;
        if ($this->input->post()) {
            $this->form_validation->set_rules('fullname', 'họ và tên', 'required');
            $this->form_validation->set_rules('username', 'tên đăng nhập', 'required');
            $this->form_validation->set_rules('address', 'Địa chỉ', 'required');
            $this->form_validation->set_rules('gender', 'Giới tính', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('phone', 'Số điện thoại', 'required|min_length[10]|numeric');
            if ($this->form_validation->run()) {
                $fullname = $this->input->post('fullname');
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');
                $phone = intval($phone);
                $address = $this->input->post('address');
                $gender = $this->input->post('gender');

                $data = array();
                $data['fullname'] = $fullname;
                $data['username'] = $username;
                $data['email'] = $email;
                $data['phone'] = $phone;
                $data['address'] = $address;
                $data['gender'] = $gender;
                $data['DateUpdate'] = date('Y-m-d H:i:s');
//                echo "<pre>";
//                print_r($data);die();
                $rs = $this->user_model->update($id, $data);
                if ($rs) {
                    $this->session->set_flashdata('message', 'Cập nhập dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Cập nhập dữ liệu không thành công');
                }
                redirect(url_admin('user'));
            }
        }

        $this->data['temp'] = 'admin/user/update';
        $this->load->view('admin/layout/main', $this->data);
    }

    function delete() {
        $id = $this->uri->rsegment('3');

        $id = intval($id);
        $info = $this->user_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại người dùng');
            redirect(url_user('user'));
        }
        $this->user_model->delete($id);
        $this->session->set_flashdata('message', 'Xoá dữ liệu thành công');

        redirect(url_user('user'));
    }

    public function view() {
        $this->data['title'] = 'Thông tin người dùng';
        $id = $this->uri->rsegment('3');
        $id = intval($id);
        $info = $this->user_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại người dùng');
            redirect(url_user('user'));
        }
        $this->data['info'] = $info;


        $this->data['temp'] = 'admin/user/view';
        $this->load->view('admin/layout/main', $this->data);
    }

}
