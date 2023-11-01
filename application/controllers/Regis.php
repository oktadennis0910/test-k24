<?php

require_once APPPATH . 'controllers\PublicControllers\InitPublic.php';


defined('BASEPATH') OR exit('No direct script access allowed');


class Regis extends InitPublic {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $view = $this->load->view("public/sign-up",array(),true); 
        $this->render($view);
	}

    public function process() {
        $this->form_validation->set_rules('nama_member', 'Nama Member', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email_member', 'Email Member', 'required|valid_email');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ktp', 'No KTP', 'required|numeric');


        $this->form_validation->set_message('required', 'Kolom %s harus diisi.');
        $this->form_validation->set_message('numeric', 'Kolom %s numeric');
        $this->form_validation->set_message('valid_email', 'Kolom %s harus berisi alamat email yang valid.');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("regis");
        } else {
            $data = array(
                'nama' => $_POST["nama_member"],
                'password' => md5($_POST["password"]),
                'no_hp' => $_POST["no_hp"],
                'tanggal_lahir' => $_POST["tanggal_lahir"],
                'email' => $_POST["email_member"],
                'jenis_kelamin' => $_POST["jenis_kelamin"],
                'no_ktp' => $_POST["ktp"],
                'foto' => $this->upload_image()
            );

            $this->load->model('UserModel');
            $id = $this->UserModel->insertUser($data);
            if($id){
                $this->session->set_userdata('email', $_POST["email_member"]);
                $this->session->set_userdata('role', '0');
                redirect("profile");
            }else{
                $this->session->set_flashdata('errors', "<p>Error saat menyimpan data</p>");
                redirect("regis");
            }
        }
    }
}