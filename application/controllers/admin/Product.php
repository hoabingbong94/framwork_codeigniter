<?php

/**
 * Description of Product
 *
 * @author Bọ Chét
 */
class Product extends MY_Controller {

    public function __construct() {
        parent::__construct();
        //load ra file model
        $this->load->model('product_model');
        $this->load->model('categories_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
    }

    public function index() {
        $input = array();
        //tiêu đề trang sản phẩm
        $this->data['title'] = 'Danh sách thông tin sản phẩm';

        //danh sách trag sản phẩm
        $this->data['info'] = $this->product_model->get_list($input);

        //load thông tin chuyên mục
        $info = $this->categories_model->get_list($input);
        $parentID = $this->showCategories($info);
        $this->data['list'] = $parentID;

        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/layout/main', $this->data);
    }

    public function create() {
        //tiêu đề thêm mới
        $this->data['title'] = 'Thêm mới thông tin sản phẩm';

        //load view
        $this->data['temp'] = 'admin/product/create';
        $this->load->view('admin/layout/main', $this->data);
    }

}
