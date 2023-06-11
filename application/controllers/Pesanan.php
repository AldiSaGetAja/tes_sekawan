<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function  __construct()
    {
        parent::__construct();
        // $this->load->model("Auth");
        $this->load->model("Driver_model");
        $this->load->model('Kendaraan_model');
        $this->load->model('Pesanan_Kendaraan_model');
        $this->load->model('User_model');
    }
    function index()
    {
        $data['JudulPage'] = "Manage User";
        $data['pesanan'] = $this->Pesanan_Kendaraan_model->getAll();
        $data['kendaraan'] = $this->Kendaraan_model->getAll();
        $data['user'] = $this->User_model->getPihak();
        $data['driver'] = $this->Driver_model->getAll();
        // foreach ($data['pesanan'] as $p) {
        //     $jj[] = $p;
        // }
        // echo json_encode($jj);
        $this->load->view('templates/header', $data);
        $this->load->view('pesanan/semua', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('pesanan/script_semua');
    }
    function getById()
    {
        $id = $this->input->post('id');
        $query = $this->Pesanan_Kendaraan_model->getById($id);
        echo json_encode($query);
    }
    function tambah()
    {
        $query = $this->Pesanan_Kendaraan_model->save();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Pesanan Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Pesanan berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Pesanan gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Pesanan gagal disimpan');
        }
        echo json_encode($info);
    }
    function update()
    {
        $formdata = $this->input->post('form_edit');
        parse_str($formdata, $data);
        $id = $data['id'];
        $id_kendaraan = $data['id_kendaraan'];
        $id_user = $data['id_user'];
        $id_driver = $data['id_driver'];
        $nama_pesanan = $data['nama_pesanan'];

        $query = $this->Pesanan_Kendaraan_model->update($id, $id_kendaraan, $id_user, $id_driver, $nama_pesanan);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Pesanan Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Pesanan berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Pesanan gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Pesanan gagal disimpan');
        }
        echo json_encode($info);
    }
    function get()
    {
        $a = $this->uri->segment('3');
        // echo $a;
        if ($a == 1 || $a == 2 || $a == 3) {
            $data['pesanan'] = $this->Pesanan_Kendaraan_model->get($a);
        } elseif ($a == true) {
            $data['pesanan'] = $this->Pesanan_Kendaraan_model->getTolak(true);
        } else {

            redirect(404);
        }
        $this->load->view('templates/header', $data);
        $this->load->view('pesanan/semua', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('pesanan/script_semua');
    }
    function setuju1()
    {
        $id = $this->input->post('id');
        $query = $this->Pesanan_Kendaraan_model->setuju1($id);
        $this->session->set_flashdata('success', 'Pesanan Berhasil diajukan ke proses');
        if ($query == true) {
            $this->session->set_flashdata('success', 'Pesanan Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Pesanan berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Pesanan gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Pesanan gagal disimpan');
        }
        echo json_encode($info);
    }
    function terima()
    {
        $id = $this->input->post('id');
        $query = $this->Pesanan_Kendaraan_model->terima($id);
        $this->session->set_flashdata('success', 'Pesanan Berhasil diterima');
        if ($query == true) {
            $this->session->set_flashdata('success', 'Pesanan Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Pesanan berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Pesanan gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Pesanan gagal disimpan');
        }
        echo json_encode($info);
    }
    function tolak()
    {
        $id = $this->input->post('id');
        $query = $this->Pesanan_Kendaraan_model->tolak($id);
        $this->session->set_flashdata('success', 'Pesanan Berhasil ditolak');
        if ($query == true) {
            $this->session->set_flashdata('success', 'Pesanan Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Pesanan berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Pesanan gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Pesanan gagal disimpan');
        }
        echo json_encode($info);
    }
    function excel()
    {
        $data['pesanan'] = $this->Pesanan_Kendaraan_model->getAll();
        $this->load->view('pesanan/excel', $data);
    }
}
