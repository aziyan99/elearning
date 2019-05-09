<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'valid_email' => 'Email Invalid',
            'required' => 'Email cannot be empty!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]', [
            'min_length' => 'Password invalid!',
            'required' => 'Password cannot be empty!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = "E - Learning";
            $this->load->view('_part/header', $data);
            $this->load->view('_part/top');
            $this->load->view('guest/index');
            $this->load->view('_part/footer');
        } else {
            $this->_logged();
        }
    }

    private function _logged()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {

            if (password_verify($password, $user['password'])) {


                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];

                $this->session->set_userdata($data);
                redirect('profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Invalid password!
                    </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
           Unknown Email !
                </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Anda telah keluar
            </div>');
        redirect('auth');
    }

    public function block()
    {
        echo 'access bloked';
    }
}
