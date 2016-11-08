<?php

/**
 * Description of MY_Controller
 *
 * @author Bọ Chét
 */
class MY_Controller extends CI_Controller {

    public $data = array();

    function __construct() {
        parent::__construct();
        $this->load->helper('common_helper');
        $this->load->helper('admin_helper');
        $this->load->model('admin_model');
        $controller = $this->uri->segment(1);
        switch ($controller) {
            case 'admin': {
                    //xử lý trong trang admin
                    $this->check_login();
                    break;
                }
            default : {
                    //xử lý ở trang ngoài
                }
        }
    }

    /*
     * Kiểm tra trạng thái đăng nhập admin
     */

    private function check_login() {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);
        $login = $this->session->userdata('login');
        if (!$login && $controller != 'login') {
            redirect(url_admin('login'));
        }
        if ($login && $controller == 'login') {
            redirect(url_admin('home'));
        }
    }

    public function showAdmin($flag) {
        $input = array();
        $flag = $flag . '_model';
        $admin = $this->$flag->get_list($input);
        foreach ($admin as $v) {
            $input[$v->ID] = $v->fullname;
        }
        return $input;
    }

    public function pagination($name = '', $input = '') {
        $fileName = $name . '_model';
        $config = $input = array();
        $total_rows = $this->$fileName->get_total();
        $this->data['total_rows'] = $total_rows;

        //load thư viện phân trang
        $this->load->library('pagination');
        $config['total_rows'] = $total_rows; //Tổng tất cả chuyên muc
        $config['base_url'] = url_admin($name . '/index');
        $config['per_page'] = 10; //số lượng hiển thị trên 1 trang
        $config['uri_segment'] = 4;
        //cấu hình pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '← Prev';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = 'Next →';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        return $config;
    }

    public function showCategories($categories) {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $array = array();
        $array[0] = "--Danh mục gốc--";
        foreach ($categories as $v) {
            if ($v->parentid == 0) {
                $array[$v->ID] = $v->title;
                $categoriesId = $v->ID;
                $array = $this->getParent($categories, $categoriesId, $array, "--");
            }
        }
        return $array;
    }

    public function getParent($category, $parentId, $array, $flag) {
        $rs = array();
        foreach ($category as $k => $cat) {
            if ($cat->parentid == $parentId) {
                $rs[$k] = $cat;
            }
        }
        foreach ($rs as $k => $v) {
            $array[$v->ID] = $flag . $v->title;
            $categoriesId = $v->ID;
            $array = $this->getParent($category, $categoriesId, $array, $flag . "--");
        }
        return $array;
    }

    public function getAlias($cs, $tolower = false) {
        $marTViet = array("à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă",
            "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ",
            "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ",
            "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ", "ù", "ú", "ụ", "ủ",
            "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "À",
            "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ",
            "Ẳ", "Ẵ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
            "Ì", "Í", "Ị", "Ỉ", "Ĩ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ",
            "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư",
            "Ừ", "Ứ", "Ự", "Ử", "Ữ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Đ", "-", ":", " - ",
            "/", "(", ")", " ");
        $marKoDau = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
            "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e",
            "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o",
            "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u",
            "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d",
            "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
            "A", "A", "A", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
            "I", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "O", "O", "O",
            "O", "O", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "U", "U",
            "U", "U", "U", "U", "U", "Y", "Y", "Y", "Y", "Y", "D", " ", "", " ", " ", "#", "#", "#");
        if ($tolower) {
            return strtolower(str_replace($marTViet, $marKoDau, $cs));
        }
        $chuyendoirs = str_replace($marTViet, $marKoDau, $cs);
        $chuyendoirs = strtolower($chuyendoirs);
        $st = str_replace(' ', '#', $chuyendoirs);
        $strs = preg_replace('([^a-zA-Z0-9#])', '#', $st);
        $strs = preg_replace('([^a-zA-Z0-9#])', '', $strs);
        $strs = str_replace('###', '#', $strs);
        $strs = str_replace('##', '#', $strs);
        return rtrim(preg_replace('([^a-zA-Z0-9])', '-', $strs), "-");
    }

}
