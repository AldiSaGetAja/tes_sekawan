<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        // $this->load->model("Auth");
        $this->load->model('Kendaraan_model');
        $this->load->model('Pesanan_Kendaraan_model');
    }
    function index()
    {
        $data['JudulPage'] = "Manage User";
        $data['kendaraan'] = $this->Kendaraan_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('kendaraan/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('kendaraan/script');
    }
    function getById()
    {
        $id = $this->input->post('id');
        $query = $this->Kendaraan_model->getById($id);
        echo json_encode($query);
    }
    function tambah()
    {
        $nama_kendaraan = $this->input->post('add_nama_kendaraan');
        $jml_roda = $this->input->post('add_jml_roda');
        $query = $this->Kendaraan_model->save();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Kendaraan Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Kendaraan berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Kendaraan gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Kendaraan gagal disimpan');
        }
        echo json_encode($info);
    }
    function update()
    {
        $formdata = $this->input->post('form_edit');
        parse_str($formdata, $data);
        $id_kendaraan = $data['id'];
        $nama_kendaraan = $data['nama_kendaraan'];
        $jml_roda = $data['jml_roda'];
        $query = $this->Kendaraan_model->update($id_kendaraan, $nama_kendaraan, $jml_roda);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Kendaraan Berhasil diubah');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Kendaraan berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Kendaraan gagal diubah');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Kendaraan gagal diubah');
        }
        echo json_encode($info);
    }
    function delete()
    {
        $id_kendaraan = $this->input->post('id');
        $cek = $this->Pesanan_Kendaraan_model->cekKendaraan($id_kendaraan);
        if (!(count($cek) == 0)) {
            $this->session->set_flashdata('error', 'Gagal, Terdapat pesanan kendaraan ini');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Kendaraan gagal dihapus');
        } else {
            $query = $this->Kendaraan_model->delete($id_kendaraan);
            if ($query == true) {
                $this->session->set_flashdata('success', 'Kendaraan Berhasil dihapus');
                $info = array('hasil' => 'TRUE', 'pesan' => 'Kendaraan berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Kendaraan gagal dihapus');
                $info = array('hasil' => 'FALSE', 'pesan' => 'Kendaraan gagal dihapus');
            }
        }
        echo json_encode($info);
    }
}
