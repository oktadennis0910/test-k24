<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'PrivateControllers\Admin.php';

class Member extends Admin {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
		$this->load->model('UserModel');
    }
    
    public function index($isAdmin=0){
        $dataArr = $this->UserModel->getUserByRole(
            $isAdmin,
            $this->session->userdata("email")
        );

        $view = $this->load->view("private/list-member",array(
            "data_member" => $dataArr
        ),true);
        $this->render($view);
    }
    
    public function hapus($id){
        $this->UserModel->deleteUser($id);
        redirect("member");
    }

    public function edit($id){
        

        $data = $this->UserModel->getUserById(
            $id
        );
        $data->url = "member/update/".$id;


        $view = $this->load->view("private/form-edit-user",$data,true); 
        $this->render($view);
    }

    public function tambah() {
        $data = new stdClass();
        $data->id = "";
        $data->nama = "";
        $data->password = "";
        $data->no_hp = "";
        $data->tanggal_lahir = "";
        $data->email = "";
        $data->jenis_kelamin = "";
        $data->no_ktp = "";
        $data->foto = "";
        $data->role = 0;
        $data->url = "member/create";

        $view = $this->load->view("private/form-edit-user",$data,true); 
        $this->render($view);
    }

    public function update($id){
        $this->form_validation->set_rules('nama_member', 'Nama Member', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email_member', 'Email Member', 'required|valid_email');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ktp', 'No KTP', 'required|numeric');
        $this->form_validation->set_rules('role', 'Role', 'required');


        $this->form_validation->set_message('required', 'Kolom %s harus diisi.');
        $this->form_validation->set_message('numeric', 'Kolom %s numeric');
        $this->form_validation->set_message('valid_email', 'Kolom %s harus berisi alamat email yang valid.');


        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("member/edit/".$id);
        }else{
            $data = array(
                'nama' => $_POST["nama_member"],
                'no_hp' => $_POST["no_hp"],
                'tanggal_lahir' => $_POST["tanggal_lahir"],
                'email' => $_POST["email_member"],
                'jenis_kelamin' => $_POST["jenis_kelamin"],
                'no_ktp' => $_POST["ktp"],
                'role' => $_POST["role"]
            );

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
                $data["foto"] = $this->upload_image();
            }

            if($_POST["password"] !== ""){
                $data["password"] = md5($_POST["password"]);
            }

            $this->UserModel->updateUser($id,$data);

            redirect("member/index/".$_POST["role"]);
        }
    }


    public function create(){
        $this->form_validation->set_rules('nama_member', 'Nama Member', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('email_member', 'Email Member', 'required|valid_email');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('ktp', 'No KTP', 'required|numeric');
        $this->form_validation->set_rules('role', 'Role', 'required');


        $this->form_validation->set_message('required', 'Kolom %s harus diisi.');
        $this->form_validation->set_message('numeric', 'Kolom %s numeric');
        $this->form_validation->set_message('valid_email', 'Kolom %s harus berisi alamat email yang valid.');


        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect("member/edit/".$id);
        }else{
            $data = array(
                'nama' => $_POST["nama_member"],
                'no_hp' => $_POST["no_hp"],
                'password' => md5($_POST["password"]),
                'tanggal_lahir' => $_POST["tanggal_lahir"],
                'email' => $_POST["email_member"],
                'jenis_kelamin' => $_POST["jenis_kelamin"],
                'no_ktp' => $_POST["ktp"],
                'role' => $_POST["role"]
            );

            if (isset($_FILES['foto']) && $_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) {
                $data["foto"] = $this->upload_image();
            }

            $this->UserModel->insertUser($data);

            redirect("member/index/".$_POST["role"]);
        }
    }
}