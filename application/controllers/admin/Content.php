<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Content
 *
 * @author Bọ Chét
 */
class Content extends MY_Controller {

    public function index() {
        $this->data['temp'] = 'admin/content/index';
        $this->load->view('admin/layout/main', $this->data);
    }

}
