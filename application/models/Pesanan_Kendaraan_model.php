<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_kendaraan_model extends CI_Model
{
    private $psn_kendaraan = 'psn_kendaraan';

    public function getAll()
    {
        $syntaq = "
        SELECT
	    psn_kendaraan.*,
	    kendaraan.nama_kendaraan, 
        kendaraan.jml_roda, 
        driver.nama_driver, 
        driver.no_telp, 
        driver.alamat,
        `user`.username
        FROM
        psn_kendaraan
        INNER JOIN
        `user`
        ON 
        psn_kendaraan.id_user = `user`.id_user
        INNER JOIN
        kendaraan
        ON 
        psn_kendaraan.id_kendaraan = kendaraan.id_kendaraan
        INNER JOIN
	    driver
	    ON 
		psn_kendaraan.id_driver = driver.id_driver
        ";
        $query = $this->db->query($syntaq);
        // $query = $this->db->get();
        return $query->result();
    }
    public function get($a)
    {
        $where = '"status":"' . $a . '"';
        $syntaq = "
        SELECT
	    psn_kendaraan.*,
	    kendaraan.nama_kendaraan, 
        kendaraan.jml_roda, 
        driver.nama_driver, 
        driver.no_telp, 
        driver.alamat,
        `user`.username
        FROM
        psn_kendaraan
        INNER JOIN
        `user`
        ON 
        psn_kendaraan.id_user = `user`.id_user
        INNER JOIN
        kendaraan
        ON 
        psn_kendaraan.id_kendaraan = kendaraan.id_kendaraan
        INNER JOIN
	    driver
	    ON 
		psn_kendaraan.id_driver = driver.id_driver
        WHERE psn_kendaraan.status LIKE '%" . $where . "%'
        ";
        $query = $this->db->query($syntaq);
        // $query = $this->db->get();
        return $query->result();
    }
    public function getTolak($a)
    {
        if ($a == true) {
            $where = '"tolak":true';
        } else {
            $where = '"tolak":false';
        }
        $syntaq = "
        SELECT
	    psn_kendaraan.*,
	    kendaraan.nama_kendaraan, 
        kendaraan.jml_roda, 
        driver.nama_driver, 
        driver.no_telp, 
        driver.alamat,
        `user`.username
        FROM
        psn_kendaraan
        INNER JOIN
        `user`
        ON 
        psn_kendaraan.id_user = `user`.id_user
        INNER JOIN
        kendaraan
        ON 
        psn_kendaraan.id_kendaraan = kendaraan.id_kendaraan
        INNER JOIN
	    driver
	    ON 
		psn_kendaraan.id_driver = driver.id_driver
        WHERE psn_kendaraan.status LIKE '%" . $where . "%'
        ";
        $query = $this->db->query($syntaq);
        // $query = $this->db->get();
        return $query->result();
    }

    public function getById($id)
    {
        $this->db->from($this->psn_kendaraan);
        $this->db->where('id_psn_kendaraan', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save()
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu =  date('Y-m-d H:i:s');
        $data = array(
            "id_kendaraan" => $this->input->post('add_id_kendaraan'),
            "id_user" => $this->input->post('add_id_user'),
            "id_driver" => $this->input->post('add_id_driver'),
            "nama_pesanan" => $this->input->post('add_nama_pesanan'),
            "waktu_pesan" => $waktu,
            "status" => '{"status":"1", "tolak":false, "waktu":"' . $waktu . '"}',
        );

        return $this->db->insert($this->psn_kendaraan, $data);
    }
    public function update($id, $id_kendaraan, $id_user, $id_driver, $nama_pesanan)
    {
        $data = array(
            "id_kendaraan" => $id_kendaraan,
            "id_user" => $id_user,
            "id_driver" => $id_driver,
            "nama_pesanan" => $nama_pesanan,
        );
        return $this->db->update($this->psn_kendaraan, $data, array('id_psn_kendaraan' => $id));
    }
    public function tolak($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu =  date('Y-m-d H:i:s');
        $data = array(
            "status" => '{"status":"2", "tolak":true, "waktu":"' . $waktu . '"}',
        );
        $query = $this->db->update($this->psn_kendaraan, $data, array('id_psn_kendaraan' => $id));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function setuju1($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu =  date('Y-m-d H:i:s');
        $data = array(
            "status" => '{"status":"2", "tolak":false, "waktu":"' . $waktu . '"}',
        );
        $query = $this->db->update($this->psn_kendaraan, $data, array('id_psn_kendaraan' => $id));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function terima($id)
    {
        date_default_timezone_set('Asia/Jakarta');
        $waktu =  date('Y-m-d H:i:s');
        $data = array(
            "status" => '{"status":"3", "tolak":false, "waktu":"' . $waktu . '"}',
        );
        $query = $this->db->update($this->psn_kendaraan, $data, array('id_psn_kendaraan' => $id));
        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }
    public function cekKendaraan($id)
    {
        $this->db->from($this->psn_kendaraan);
        $this->db->where('id_kendaraan', $id);
        $query = $this->db->get();
        return $query->result();
    }
    public function cekDriver($id)
    {
        $this->db->from($this->psn_kendaraan);
        $this->db->where('id_driver', $id);
        $query = $this->db->get();
        return $query->result();
    }
}
