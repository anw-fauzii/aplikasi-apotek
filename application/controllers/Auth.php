<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function register() {
        $this->load->view('register');
    }

    public function register_user() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'role' => 'user'
        );

        $this->User_model->register($data);
        redirect('auth/login');
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
                redirect('example/home');
        }
        $this->load->view('login');
    }

    public function login_user() {
        if ($this->session->userdata('logged_in')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('example/home');
            } else {
                redirect('example/home');
            }
        }
    
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $user = $this->User_model->login($username, $password);
    
        if ($user) {
            $session_data = array(
                'user_id' => $user->id,
                'username' => $user->username,
                'role' => $user->role,
                'logged_in' => TRUE
            );
    
            $this->session->set_userdata($session_data);
    
            if ($user->role == 'admin') {
                redirect('example/home');
            } else {
                redirect('example/home');
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('auth/login');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
?>
