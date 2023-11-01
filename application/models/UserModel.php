<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function getAllUser() {
        return $this->db->get('user')->result();
    }

    public function insertUser($data) {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function updateUser($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('user', $data);
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }

    public function getUser($email) {
        return $this->db->get_where('user', array('email' => $email))->row();
    }

    public function getUserById($id) {
        return $this->db->get_where('user', array('id' => $id))->row();
    }

    public function getUserByRole($role, $email) {
        return $this->db->get_where('user', array(
            'role' => $role,
            'email !=' => $email
        ))->result();
    }
}