<?php
require_once APPPATH . 'controllers\PrivateControllers\User.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends \User {
    public function __construct() {
        parent::__construct();
        if($this->session->userdata('role') != "1"){
            redirect("profile");
            exit;
        }
    }
}
?>