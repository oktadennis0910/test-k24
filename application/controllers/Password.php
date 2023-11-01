<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'PrivateControllers\User.php';

class Password extends User {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('UserModel');
    }

    
    public function index(){
        $view = $this->load->view("private/form-password",array(),true);
        $this->render($view);
    }

    public function update() {
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');

        $this->form_validation->set_message('required', 'Kolom %s harus diisi.');
        
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("password");
        }else{
            $data = $this->UserModel->getUser(
                $this->session->userdata('email')
            );
            $_POST["password_lama"] = md5($_POST["password_lama"]); 
            
            if($_POST["password_lama"] != $data->password){
                $this->session->set_flashdata('errors', "<p>Password anda salah</p>");
                redirect("password");
            }else{
                $data->password = md5($_POST["password_baru"]);
                $this->UserModel->updateUser($data->id,$data);
                redirect("password");
            }
        }
    }

}