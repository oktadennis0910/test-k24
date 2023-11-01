<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'PrivateControllers\User.php';

class Dashboard extends User {

	public function index()
	{
		$this->load->model('UserModel');

        $view = $this->load->view("private/dashboard",array(),true); 
        $this->render($view);
	}

}