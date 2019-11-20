<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis extends CI_Model {

    public function get_jenis()
    {
        return $this->db->get('jenis')->result();
    }

}

/* End of file M_jenis.php */
