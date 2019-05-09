<?php

class Lecturer_model extends CI_Model
{
    public function lecturer_list()
    {
        return $this->db->get('dosen')->result_array();
    }

    public function courses_add($data)
    {
        $this->db->insert('dosen', $data);
    }

    public function courses_edit($data, $email)
    {
        $this->db->update('dosen', $data, ['email' => $email]);
    }

    public function lecturer_delete()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('dosen', ['id' => $id]);
    }
}
