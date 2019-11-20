<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengguna extends CI_Model {

    public function get_pengguna()
    {
        return $this->db->select('*')
        ->from('pengguna')
        ->where('level !=', "admin")
        ->get()
        ->result();
    }

    public function tambah_pengguna($data)
    {
       return $this->db->insert('pengguna', $data);
    }

    public function delete_pengguna($id_pengguna)
    {
        return $this->db->delete('pengguna', array('id_pengguna' => $id_pengguna));
    }
}

/* End of file M_pengguna.php */
