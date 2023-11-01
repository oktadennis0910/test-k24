<?php

require_once APPPATH . 'controllers\PublicControllers\InitPublic.php';
defined('BASEPATH') OR exit('No direct script access allowed');


class logout extends InitPublic {
    function index(){
        $this->session->sess_destroy();
        redirect("regis");
    }
}