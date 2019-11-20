<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function cek_login($data)
    {
        $query = $this->db->get_where('pengguna', array(
            'username' => $data['username'],
            'password' => $data['password']
        ));
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } 
    }
    public function add_user($data)
    {
        $query = $this->db->insert('pengguna', array(
            'nama_pengguna' => $data['nama_pengguna'],
            'email' => $data['email'],
            'nis' => $data['nis'],
            'alamat' => $data['alamat'],
            'telepon' => $data['telepon'],
            'username' => $data['username'],
            'password' => $data['password']
        ));
        redirect('C_login','refresh');
    }


}

/* End of file M_login.php */
