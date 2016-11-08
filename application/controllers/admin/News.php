<?php

//include_once '/Categories.php';

/**
 * Description of News
 *
 * @author Bọ Chét
 */
class News extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->model('admin_model');
        $this->load->model('categories_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() {
        //load tiêu đề trang
        $this->data['title'] = 'Danh sách nội dung tin tức';

//       Hiển thị ra mảng dữ liệu admin
        $admin = $this->showAdmin('admin');
        $this->data['admin'] = $admin;

        //load thông tin chuyên mục
        $input = array();
        $info = $this->categories_model->get_list($input);
        $parentID = $this->showCategories($info);
        $this->data['list'] = $parentID;

        //load danh sách tin tức
        $info = $this->news_model->get_list($input);
        $this->data['info'] = $info;

//        load view
        $this->data['temp'] = 'admin/news/index';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function create() {
        $input = array();
        $this->data['title'] = 'Thêm mới nội dung tin tức';
        $info = $this->categories_model->get_list($input);
        $this->data['info'] = $info;

        $list = $this->showCategories($info);
        $this->data['list'] = $list;
        if ($this->input->post()) {
            $this->form_validation->set_rules('Title', 'Tên tin tức', 'required');
            $this->form_validation->set_rules('Description', 'Mô tả', 'required');
            if ($this->form_validation->run()) {
                $title = $this->input->post('Title');
                $des = $this->input->post('Description');
                $id = $this->input->post('CategoriesID');
                $Keyword = $this->input->post('Keyword');


                // Upload file images vao file
                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $file = $this->upload_library->upload($upload_path, 'image');
                $link = '';
                if (isset($file['file_name'])) {
                    $link = $file['file_name'];
                }
                $data = array(
                    'Title' => $title,
                    'Description' => $des,
                    'DateCreate' => date('Y-m-d H:i:s')
                );
                $data['Alias'] = $this->getAlias($title);
                $data['DateCreate'] = date('Y-m-d H:i:s');
                $data['Status'] = 1;
                $data['UserCreate'] = 1;
                $data['Keyword'] = $Keyword;
                $data['ShowHome'] = 1;
                $data['Images_Url'] = $link;
                if ($id != "" && $id == NULL) {
                    $data['CategoriesID'] = 0;
                } else {
                    $data['CategoriesID'] = $id;
                }

                $this->debug($data);
                if ($this->news_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không thêm dữ liệu thành công');
                }
                redirect(url_admin('news/index'));
            }
        }

        //load trang view
        $this->data['temp'] = 'admin/news/create';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function update() {
        $input = array();
        $this->data['title'] = 'Cập nhập nội dung tin tức';
        $id = $this->uri->rsegment('3');

        $id = intval($id);
        $info = $this->news_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại nội dung bài viết');
            redirect(url_admin('news'));
        }
        $this->data['info'] = $info;
//        $this->debug($info);
//        if ($this->input->post()) {
        $this->form_validation->set_rules('Title', 'Tên tin tức', 'required');
        $this->form_validation->set_rules('Description', 'Mô tả', 'required');
        if ($this->form_validation->run()) {
            $title = $this->input->post('Title');
            $des = $this->input->post('Description');
            $id = $this->input->post('CategoriesID');
            $Keyword = $this->input->post('Keyword');
            $link = '';
            $images = $info->Images_Url;
            if (isset($images)) {
                $link = $images;
            } else {
                die("OK");
                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $file = $this->upload_library->upload($upload_path, 'image');
                if (isset($file['file_name'])) {
                    $link = $file['file_name'];
                }
            }

            $data = array(
                'Title' => $title,
                'Description' => $des,
                'DateCreate' => date('Y-m-d H:i:s')
            );
            $data['Alias'] = $this->getAlias($title);
            $data['DateCreate'] = date('Y-m-d H:i:s');
            $data['Status'] = 1;
            $data['UserCreate'] = 1;
            $data['Keyword'] = $Keyword;
            $data['ShowHome'] = 1;
            $data['Images_Url'] = $link;

            if ($id != "" && $id == NULL) {
                $data['CategoriesID'] = 0;
            } else {
                $data['CategoriesID'] = $id;
            }
            $this->debug($data);
            if ($this->news_model->create($data)) {
                $this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
            } else {
                $this->session->set_flashdata('message', 'Không thêm dữ liệu thành công');
            }
            redirect(url_admin('news/index'));
        }

        //load danh mục
        $info = $this->categories_model->get_list($input);
        $list = $this->showCategories($info);
        $this->data['list'] = $list;


        //load view
        $this->data['temp'] = 'admin/news/update';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function view() {
        $this->data['title'] = 'Thông tin chi tiết về bài viết ';
        //load view
        $this->data['temp'] = 'admin/news/view';
        $this->load->view('admin/layout/main', $this->data);
    }

    function test() {
        $this->data['title'] = 'Thông tin';
//        $this->load->library('upload_library');
//        $upload_path = './upload/news';
//        $file = $this->upload_library->upload($upload_path, 'image');
//        echo "<pre>";
//        print_r($file['file_name']);
//        echo "</pre>";
        $this->data['temp'] = 'admin/news/test';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function debug($flag) {
        echo "<pre>";
        print_r($flag);
        die();
    }

}
