<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $this->load->model('user_model', 'user');
        $data =  $this->user->get_details();
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('_part/footer');
    }

    public function edit()
    {
        $data = [
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone_number' => $this->input->post('phone_number')
        ];

        $this->load->model('user_model', 'user');
        $this->user->update($data);

        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Profile has been updated!
            </div>');

        redirect('profile');
    }
}
