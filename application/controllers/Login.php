<?php

require_once APPPATH . 'controllers\PublicControllers\InitPublic.php';
defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends InitPublic {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('UserModel');
    }

	public function index()
	{
        $view = $this->load->view("public/sign-in",array(),true); 
        $this->render($view);
	}

    public function check(){
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("profile");
        }else{
            $data = $this->UserModel->getUser(
                $_POST["email"]
            );

            if($data->password == md5($_POST["password"])){
                $this->session->set_userdata('email', $data->email);
                $this->session->set_userdata('role', $data->role);

                redirect("profile");
            }else{
                $this->session->set_flashdata('errors', "<p>Email atau password anda salah</p>");
                redirect("login");
            }
        }
    }
}