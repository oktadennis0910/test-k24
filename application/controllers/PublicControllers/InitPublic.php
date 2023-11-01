<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class InitPublic extends \CI_Controller {
    public function __construct() {
        parent::__construct();
        
    }

    public function render($view) {
        $array = 

        $this->load->view('main',array(
            "view"=>$view
        ));
    }

    public function print_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }

    public function upload_image() {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024; 
        $config['file_name'] = md5(date('Y-m-d H-i-s')); 

        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('foto')) {
            return base_url("assets/img/broken.png");
        } else {
            $data = $this->upload->data();
            return base_url("assets/img/".$data["file_name"]);
        }
    }
}
?>