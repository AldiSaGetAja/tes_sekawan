<?php
class Auth extends CI_Model
{
    function cek_login()
    {
        if (empty($this->session->userdata('isLogin'))) {
            redirect('login');
        }
    }
    function level_admin()
    {
        if (!($this->session->userdata('level') == '1')) {
            $this->session->set_flashdata('warning', '<Hanya untuk admin');
            redirect('dashboard');
        }
    }
    function level_penyetuju()
    {
        if (!($this->session->userdata('level') == '2')) {
            $this->session->set_flashdata('warning', '<Hanya untuk penyetuju');
            redirect('dashboard');
        }
    }
}
