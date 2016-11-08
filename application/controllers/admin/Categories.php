<?php

/**
 * Description of Categories
 *
 * @author Bọ Chét
 */
class Categories extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('categories_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    function index() {
        //load tiêu đề trang
        $this->data['title'] = 'Danh sách thông tin chuyên mục';

        //load trang pagination
        $input = array();
        $this->pagination('categories');
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $this->data['pagination'] = $this->pagination->create_links();

        //cấu hình và load thông tin danh sách chuyên mục
        $input['limit'] = array(10, $segment);
        $input['order'] = array('ID', 'asc');
        $info = $this->categories_model->get_list($input);
        $this->data['listCategories'] = $info;

        //load view
        $this->data['temp'] = 'admin/categories/index';
        $this->load->view('admin/layout/main', $this->data);
    }

    function create() {
        $this->data['title'] = 'Thêm mới danh mục';
        $input = array();
        $info = $this->categories_model->get_list($input);
        $this->data['info'] = $info;

        $listCate = $this->showCategories($info);
        $this->data['list'] = $listCate;
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'chuyên mục', 'required');
            $this->form_validation->set_rules('description', 'mô tả', 'required');
            if ($this->form_validation->run()) {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $orderindex = $this->input->post('orderindex');
                $id = $this->input->post('categories');
                $data = array();
                $data['title'] = $title;
                $data['alias'] = $this->getAlias($title);
                $data['DataCreate'] = date('Y-m-d H:i:s');
                $data['description'] = $description;
                $data['Status'] = 1;
                if ($orderindex == null && $orderindex == "") {
                    $data['orderindex'] = 1;
                } else {
                    $data['orderindex'] = $orderindex;
                }
                if ($id != "" && $id == NULL) {
                    $data['parentid'] = 0;
                } else {
                    $data['parentid'] = $id;
                }
                if ($this->categories_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm dữ liệu thành công');
                }
                redirect(url_admin('categories'));
            }
        }


        $this->data['temp'] = 'admin/categories/create';
        $this->load->view('admin/layout/main', $this->data);
    }

    function update() {
        $this->data['title'] = 'Thêm mới nội dung chuyên mục';
        $input = array();
        $info = $this->categories_model->get_list($input);
        $this->data['info'] = $info;

        $parentID = $this->showCategories($info);
        $this->data['list'] = $parentID;
        $id = intval($this->uri->rsegment('3'));
        $info = $this->categories_model->get_info($id);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại danh mục');
            redirect(url_admin('categories'));
        }
        $this->data['info'] = $info;
        if ($info->title == NULL && $info->title == '' && $info->description == NULL && $info->description == '') {
            if ($this->form_validation->run()) {
                $title = $this->input->post('title');
                $description = $this->input->post('description');
                $orderindex = $this->input->post('orderindex');
                $id = $this->input->post('categories');

                $data = array();
                $data['title'] = $title;
                $data['description'] = $description;
                $data['orderindex'] = $orderindex;
                $data['parentid'] = $id;
                if ($this->categories_model->update($data)) {
                    $this->session->set_flashdata('message', 'Sửa dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không sửa dữ liệu thành công');
                }
                redirect(url_admin('categories/update'));
            }
        }

        $this->data['temp'] = 'admin/categories/update';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function test() {
        $admin = $this->showAdmin();
        $this->debug($admin);
        $this->data['temp'] = 'admin/categories/test';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function debug($flag) {
        echo "<pre>";
        print_r($flag);
        die();
    }

}
