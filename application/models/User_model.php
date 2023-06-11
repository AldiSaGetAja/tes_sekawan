<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $user = 'user';

    public function getPihak()
    {
        $this->db->from($this->user);
        $this->db->where("level", 2);
        $this->db->order_by("id_user", "desc");
        $query = $this->db->get();
        return $query->result();
    }
    public function cekUser($username, $password)
    {
        $this->db->from($this->user);
        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $query = $this->db->get();
        return $query->row();
    }
}
