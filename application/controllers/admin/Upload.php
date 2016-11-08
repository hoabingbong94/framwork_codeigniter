<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Upload
 *
 * @author Bọ Chét
 */
class Upload extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->load->library('upload_library');
        $upload_path = './upload/user';
        $data = $this->upload_library->upload($upload_path, 'image');
        $this->data['temp'] = 'admin/uploads/index';
        $this->load->view('admin/layout/main', $this->data);
    }

}
