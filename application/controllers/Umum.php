<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/top');
        $this->load->view('umum/umum_v');
        $this->load->view('_part/footer');
    }

    public function mahasiswa()
    {
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('mahasiswa/profile');
        $this->load->view('_part/footer');
    }

    public function submission()
    {
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('mahasiswa/submission');
        $this->load->view('_part/footer');
    }

    public function courses()
    {
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('mahasiswa/courses');
        $this->load->view('_part/footer');
    }

    public function courses_detail()
    {
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('mahasiswa/courses_detail');
        $this->load->view('_part/footer');
    }

    public function my_courses()
    {
        $data['title'] = "E - Learning";
        $this->load->view('_part/header', $data);
        $this->load->view('_part/navbar');
        $this->load->view('mahasiswa/my_courses');
        $this->load->view('_part/footer');
    }

    public function saveuser()
    {

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = "E - Learning";
            $this->load->view('_part/header', $data);
            $this->load->view('adduser');
            $this->load->view('_part/footer');
        } else {
            $data = [
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->load->model('user_model', 'user');
            $this->user->save_user($data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger mt-3" role="alert">
               Data ditambah!
            </div>');
            redirect('umum/saveuser');
        }
    }

    public function test()
    {
        $role = 1;
        $queryMenu = "  SELECT * 
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                        WHERE `user_access_menu`.`role_id` = $role 
        ";

        $menu = $this->db->query($queryMenu)->result_array();
        $uri = $this->uri->segment(1);


        $role = $this->session->userdata('role_id');
        $menu_access = $this->uri->segment(1);
        $menu = $this->db->get_where('user_menu', ['title' => $menu_access])->row_array();

        $menu_id = $menu['id'];

        $userrAccess = $this->db->get_where('user_access_menu', [
            'role_id' => $role,
            'menu_id' => $menu_id
        ]);
    }
}
