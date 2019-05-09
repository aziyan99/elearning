<?php

class Courses_model extends CI_Model
{
    public function courses_list()
    {
        return $this->db->get('courses')->result_array();
    }

    public function courses_add($data)
    {
        $this->db->insert('courses', $data);
    }

    public function courses_edit($data, $id)
    {
        $this->db->update('courses', $data, ['id' => $id]);
    }

    public function courses_delete()
    {
        $id = $this->uri->segment(3);
        $this->db->delete('courses', ['id' => $id]);
    }
}
