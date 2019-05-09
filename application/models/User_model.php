<?php
class User_model extends CI_Model
{
    public function save_user($data)
    {
        $role = $data['role_id'];
        $email = $data['email'];
        $this->db->insert('user', $data);
        if ($role == 1) {
            $this->db->insert('admin', ['email' => $email]);
        } elseif ($role == 2) {
            $this->db->insert('dosen', ['email' => $email]);
        } elseif ($role == 3) {
            $this->db->insert('mahasiswa', ['email' => $email]);
        } else {
            echo 'unknown user';
        }
    }
    public function get_details()
    {
        $role = $this->session->userdata('role_id');

        if ($role == 1) {
            return $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        } elseif ($role == 2) {
            return $this->db->get_where('dosen', ['email' => $this->session->userdata('email')])->row_array();
        } elseif ($role == 3) {
            return $this->db->get_where('mahasiswa', ['email' => $this->session->userdata('email')])->row_array();
        }
    }

    public function update($data)
    {
        $role = $this->session->userdata('role_id');

        if ($role == 1) {
            $this->db->update('admin', $data, ['email' => $this->session->userdata('email')]);
        } elseif ($role == 2) {
            $this->db->update('dosen', $data, ['email' => $this->session->userdata('email')]);
        } elseif ($role == 3) {
            $this->db->update('mahasiswa', $data, ['email' => $this->session->userdata('email')]);
        }
    }
}
