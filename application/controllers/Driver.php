<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
{
    public function  __construct()
    {
        parent::__construct();
        $this->load->model("Auth");
        $this->load->model('Driver_model');
        $this->load->model('Pesanan_Kendaraan_model');
    }
    function index()
    {
        $data['JudulPage'] = "Manage User";
        $data['driver'] = $this->Driver_model->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('driver/index', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/footScript');
        $this->load->view('driver/script');
    }
    function getById()
    {
        $id = $this->input->post('id');
        $query = $this->Driver_model->getById($id);
        echo json_encode($query);
    }
    function tambah()
    {
        $query = $this->Driver_model->save();
        if ($query == true) {
            $this->session->set_flashdata('success', 'Driver Berhasil disimpan');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Driver berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Driver gagal disimpan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Driver gagal disimpan');
        }
        echo json_encode($info);
    }
    function update()
    {
        $formdata = $this->input->post('form_edit');
        parse_str($formdata, $data);
        $id_driver = $data['id'];
        $nama_driver = $data['nama_driver'];
        $no_telp = $data['no_telp'];
        $alamat = $data['alamat'];
        $query = $this->Driver_model->update($id_driver, $nama_driver, $no_telp, $alamat);
        if ($query == true) {
            $this->session->set_flashdata('success', 'Driver Berhasil diubah');
            $info = array('hasil' => 'TRUE', 'pesan' => 'Driver berhasil diubah');
        } else {
            $this->session->set_flashdata('error', 'Driver gagal diubah');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Driver gagal diubah');
        }
        echo json_encode($info);
    }
    function delete()
    {
        $id = $this->input->post('id');
        $cek = $this->Pesanan_Kendaraan_model->cekKendaraan($id);
        if (!(count($cek) == 0)) {
            $this->session->set_flashdata('error', 'Gagal, Driver ini memilki pesanan');
            $info = array('hasil' => 'FALSE', 'pesan' => 'Driver gagal dihapus');
        } else {

            $query = $this->Driver_model->delete($id);
            if ($query == true) {
                $this->session->set_flashdata('success', 'Driver Berhasil dihapus');
                $info = array('hasil' => 'TRUE', 'pesan' => 'Driver berhasil dihapus');
            } else {
                $this->session->set_flashdata('error', 'Driver gagal dihapus');
                $info = array('hasil' => 'FALSE', 'pesan' => 'Driver gagal dihapus');
            }
        }
        echo json_encode($info);
    }
}
