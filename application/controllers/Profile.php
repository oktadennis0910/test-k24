<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'PrivateControllers\User.php';

class Profile extends User {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('UserModel');
    }

	public function index()
	{
        $data = $this->UserModel->getUser(
            $this->session->userdata('email')
        );


        $view = $this->load->view("public/form-user",$data,true); 
        $this->render($view);
	}
    
    public function update_profile() {
        
        $this->form_validation->set_rules('nama_member', 'Nama Member', 'required');
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
            redirect("profile");
        }else{
        
            if($this->session->userdata('email') !== $_POST["email_member"]){
                $data = $this->UserModel->getUser(
                    $_POST["email_member"]
                );
                
                if($data){
                    $this->session->set_flashdata('errors', "<p>Email baru sudah ada yang menggunakan</p>");
                    redirect("profile");
                    exit;
                }
            }
            

            $data = $this->UserModel->getUser(
                $this->session->userdata('email')
            );

            $data->nama=$_POST["nama_member"];
            $data->no_hp=$_POST["no_hp"];
            $data->tanggal_lahir=$_POST["tanggal_lahir"];
            $data->email=$_POST["email_member"];
            $data->jenis_kelamin=$_POST["jenis_kelamin"];
            $data->no_ktp=$_POST["ktp"];

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
                $data->foto = $this->upload_image();
            }

            $this->UserModel->updateUser($data->id,$data);

            $this->session->set_userdata('email', $data->email);
                
            redirect("profile");
        }

    }

}