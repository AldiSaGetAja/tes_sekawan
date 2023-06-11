<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Auth");
        $this->load->model("Driver_model");
        $this->load->model("Kendaraan_model");
        $this->load->model("Pesanan_Kendaraan_model");
        $this->load->model("Auth");
        $this->Auth->cek_login();
    }
    public function index()
    {
        $data['driver'] = count($this->Driver_model->getAll());
        $data['kendaraan'] = count($this->Kendaraan_model->getAll());
        $data['pengajuan'] = count($this->Pesanan_Kendaraan_model->get(1));
        $data['proses'] = count($this->Pesanan_Kendaraan_model->get(2));
        $data['diterima'] = count($this->Pesanan_Kendaraan_model->get(3));

        $data['ditolak'] = count($this->Pesanan_Kendaraan_model->getTolak(true));
        $data['tdk_tolak'] = count($this->Pesanan_Kendaraan_model->getTolak(false));
        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('templates/footer');
        $this->load->view('dashboard/dashboardScript', $data);
        $this->load->view('templates/footScript');
    }
}
