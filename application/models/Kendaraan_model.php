<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan_model extends CI_Model
{
    private $kendaraan = 'kendaraan';

    public function getAll()
    {
        $this->db->from($this->kendaraan);
        $query = $this->db->get();
        return $query->result();
    }
    public function getById($id)
    {
        $this->db->from($this->kendaraan);
        $this->db->where('id_kendaraan', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function save()
    {
        $data = array(
            "nama_kendaraan" => $this->input->post('add_nama_kendaraan'),
            "jml_roda" => $this->input->post('add_jml_roda'),
        );

        $query = $this->db->insert($this->kendaraan, $data);
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function update($id, $nama_kendaraan, $jml_roda)
    {
        $data = array(
            "nama_kendaraan" => $nama_kendaraan,
            "jml_roda" => $jml_roda,
        );
        $query =  $this->db->update($this->kendaraan, $data, array('id_kendaraan' => $id));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id_kendaraan)
    {
        $query = $this->db->delete($this->kendaraan, array("id_kendaraan" => $id_kendaraan));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
}
