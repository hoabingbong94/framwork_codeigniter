<?php

/**
 * Description of Detail
 *
 * @author Bọ Chét
 */
class Detail extends MY_Controller {

    public function index() {
        $this->data['title'] = 'Thông tin đơn hàng của người dùng đã đặt';
        
        
        $this->data['temp'] = 'admin/detail/index';
        $this->load->view('admin/layout/main', $this->data);
    }

}
