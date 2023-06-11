<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
    }
    public function index()
    {
        $data['usr'] = $this->input->post('username');
        $data['pass'] = $this->input->post('password');
        if ($data['usr'] && $data['pass']) {
            $cekUser = $this->User_model->cekUser($data['usr'], $data['pass']);
            if (!(empty($cekUser))) {
                $this->session->set_userdata('id_user', $cekUser->id_user);
                $this->session->set_userdata('username', $cekUser->username);
                $this->session->set_userdata('level', $cekUser->level);
                $this->session->set_userdata('isLogin', TRUE);
                $this->session->set_flashdata('success', 'Selamat datang ' . ucfirst($cekUser->username));
                redirect('dashboard');
            }
            $this->session->set_flashdata('error', 'Username & Password salah');
        }
        $this->load->view('loginPage');
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('isLogin',);
        redirect('login');
    }
}
