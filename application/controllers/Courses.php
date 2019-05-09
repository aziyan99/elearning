<?php
defined('BASEPATH') or exit('No direct script access allowed!');


class Courses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $this->load->model('courses_model', 'courses');
        $data['course'] =  $this->courses->courses_list();
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('courses/index', $data);
        $this->load->view('_part/footer');
    }

    public function add()
    {
        $data = [
            'name' => $this->input->post('name'),
            'lecturer_name' => $this->input->post('lecturer_name'),
            'description' => $this->input->post('description')
        ];

        $this->load->model('courses_model', 'courses');
        $this->courses->courses_add($data);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                New courses has been added!
            </div>');

        redirect('courses');
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'name' => $this->input->post('name'),
            'lecturer_name' => $this->input->post('lecturer_name'),
            'description' => $this->input->post('description')
        ];

        $this->load->model('courses_model', 'courses');
        $this->courses->courses_edit($data, $id);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Courses has been edited!
            </div>');

        redirect('courses');
    }

    public function delete()
    {
        $id = $this->uri->segment(3);
        $this->load->model('courses_model', 'course');
        $this->course->courses_delete();
        $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
                Course has been deleted!
            </div>');
        redirect('courses');
    }
}
