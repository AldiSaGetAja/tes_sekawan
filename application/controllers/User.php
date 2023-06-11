<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        $this->load->model("User_model");
        $this->load->library('session');
    }

    function index()
    {
        $data['value_filter'] = "999";
        $data['user'] = $this->Model_User->get_user();
        $data['toko2'] = $this->Model_Toko->getDataToko();
        $data['toko1'] = $this->Model_Toko->getDataToko();
        $header['JudulPage'] = "Manage User";
        $this->load->view('templates/header', $header);
        $this->load->view('user/manage_user', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('user/script');
    }
    function user_filter()
    {
        $id_toko = $this->input->post("filter_user");
        if ($id_toko == 999) {
            redirect('User');
        } else {
            $data['value_filter'] = $this->input->post("filter_user");
            $data['user'] = $this->Model_User->getUserByIdToko($id_toko);
            $data['toko2'] = $this->Model_Toko->getDataToko();
            $data['toko1'] = $this->Model_Toko->getDataToko();
            $header['JudulPage'] = "Manage User";
            $this->load->view('templates/header', $header);
            $this->load->view('user/manage_user', $data);
            $this->load->view('templates/footer');
            $this->load->view('templates/footScript');
            $this->load->view('user/script');
        }
    }
    function tambah_data_user()
    {
        $toko = $this->input->post('Intoko');
        $user = $this->input->post('Inuser');
        $alamat = $this->input->post('Inalamat');
        $telp = $this->input->post('Intelp');
        $username = $this->input->post('Inusername');
        $password = $this->input->post('Inpassword');
        $level = $this->input->post('Inlevel');
        $query = $this->Model_User->insert_user($toko, $user, $username, $password, $level, $alamat, $telp);
        $this->session->set_flashdata('success', 'Data Disimpan');
        $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        if ($query) {
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        }
        echo json_encode($info);
    }
    function edit_user()
    {
        $formdata = $this->input->post('form_edit');
        parse_str($formdata, $data);
        $id = $data['id'];
        $toko = $data['toko'];
        $user = $data['user'];
        $alamat = $data['alamat'];
        $telp = $data['telp'];
        $username = $data['username'];
        $password = $data['password'];
        $level = $data['level'];
        $query = $this->Model_User->edit_user($id, $toko, $user, $username, $password, $level, $alamat, $telp);
        $this->session->set_flashdata('success', 'Data Disimpan');
        $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        if ($query) {
            $info = array('hasil' => 'TRUE', 'pesan' => 'data tersimpan');
            // redirect('Kasir/manage_user');
        }
        echo json_encode($info);
    }
    function hapus_user()
    {
        $id = $this->input->post('id');
        $query = $this->Model_User->hapus_user($id);
        $this->session->set_flashdata('success', 'Data Dihapus');
        $info = array('hasil' => 'FALSE', 'pesan' => 'data gagal');
        if ($query) {
            $info = array('hasil' => 'TRUE', 'pesan' => 'data terhapus');
            // redirect('Kasir/manage_user');
        }
        echo json_encode($info);
    }
    function getUSerById()
    {
        $id = $this->input->post('id');
        //$where=array('id' => $id);
        $query = $this->Model_User->getUSerById($id);

        echo json_encode($query);
    }
}
