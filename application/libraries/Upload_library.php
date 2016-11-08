<?php

/**
 * Description of Uploads_library
 *
 * @author Bọ Chét
 */
class Upload_library {

    var $CI = '';

    function __construct() {
        $this->CI = & get_instance();
    }

    function upload($upload_path = '', $file_name = '') {
        $config = $this->config($upload_path);
        $this->CI->load->library('upload', $config);

        if ($this->CI->upload->do_upload($file_name)) {
            $file = $this->CI->upload->data();
            $fileNameAll = $file['file_name'];
            $extFile = substr($fileNameAll, strrpos($fileNameAll, '.') + 1);
            $urlImages = str_replace("." . $extFile, "", $fileNameAll);
            $file_name = $urlImages . time() . rand(0, 10) . "." . $extFile;
            $data = $file_name;
//            echo "<pre>";
//            print_r($file_name);
//            die();
        } else {
            //không upload thành công
            $data = $this->CI->upload->display_errors();
        }
        return $data;
    }

    function config($upload_path = '') {
        $config = array();

        $config['upload_path'] = $upload_path;

        $config['allowed_types'] = 'jpg|png|gif';

        $config['max_size'] = '1200';

        $config['max_width'] = '1028';

        $config['max_height'] = '1028';

        return $config;
    }

    public function mkdir($path) {
        if (!is_dir($path . date("Y"))) {
            mkdir($path . date("Y"), 0775, true);
        }

        if (!is_dir($path . date("Y/m"))) {
            mkdir($path . date("Y/m"), 0775, true);
        }

        if (!is_dir($path . date("Y/m/d"))) {
            mkdir($path . date("Y/m/d"), 0775, true);
        }
    }

}
