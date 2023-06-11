<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver_model extends CI_Model
{
    private $driver = 'driver';

    public function getAll()
    {
        $this->db->from($this->driver);
        $query = $this->db->get();
        return $query->result();
    }
    public function getById($id)
    {
        $this->db->from($this->driver);
        $this->db->where('id_driver', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function save()
    {
        $data = array(
            "nama_driver" => $this->input->post('add_nama_driver'),
            "no_telp" => $this->input->post('add_no_telp'),
            "alamat" => $this->input->post('add_alamat'),
        );

        $query = $this->db->insert($this->driver, $data);
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function update($id, $nama_driver, $no_telp, $alamat)
    {
        $data = array(
            "nama_driver" => $nama_driver,
            "no_telp" => $no_telp,
            "alamat" => $alamat,
        );
        $query = $this->db->update($this->driver, $data, array('id_driver' => $id));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function delete($id_driver)
    {
        $query = $this->db->delete($this->driver, array("id_driver" => $id_driver));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
}
