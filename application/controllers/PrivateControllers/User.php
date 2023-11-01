<?php
require_once APPPATH . 'controllers\PublicControllers\InitPublic.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends \InitPublic {
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('role') >= "0" && $this->session->userdata('role') <= "1")
        {
            
        }else{
            exit;
        }
        
    }
}
?>