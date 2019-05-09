<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lecturer extends CI_Controller
{

    public function index()
    {
        $data['title'] = "E - Learning";
        $this->load->model('lecturer_model', 'lecturer');
        $data['lecturer'] = $this->lecturer->lecturer_list();
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('lecturer/index', $data);
        $this->load->view('_part/footer');
    }

    public function add()
    {
        $data = [
            'email' => $this->input->post('email'),
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone_number' => $this->input->post('phone_number')
        ];

        $this->load->model('lecturer_model', 'lecturer');
        $this->courses->lecturer_add($data);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                New lecturer has been added!
            </div>');

        redirect('lecture');
    }

    public function edit()
    {
        $id = $this->input->post('email');
        $data = [
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone_number' => $this->input->post('phone_number')
        ];

        $this->load->model('lecturer_model', 'lecturer');
        $this->courses->clecturer_edit($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Lecturer has been edited!
            </div>');

        redirect('lecture');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('lecturer_model', 'lecturer');
        $this->course->lecturer_delete();
        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                Lecturer has been deleted!
            </div>');
        redirect('courses');
    }
}
