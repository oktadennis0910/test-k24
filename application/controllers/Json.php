<?php

require_once APPPATH . 'controllers\PublicControllers\InitPublic.php';
defined('BASEPATH') OR exit('No direct script access allowed');


class Json extends InitPublic {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('UserModel');
    }

    public function index(){
        $data = $this->UserModel->getAllUser();
        echo "Format PRINT R";
        $this->print_r($data);
        echo "<br/>";
        echo "<br/>";
        echo "Format Json";
        echo "<br/>";
        echo json_encode( $data );
    }

}