<?php

/**
 * Description of Home
 *
 * @author Bọ Chét
 */
class Home extends MY_Controller {

    function index() {
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/layout/main', $this->data);
    }
    function create(){
        
    }

}
