<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Banner
 *
 * @author Bọ Chét
 */
class Banner extends MY_Controller {

    public function index() {
        $this->data['temp'] = 'admin/banner/index';
        $this->load->view('admin/layout/main', $this->data);
    }

}
