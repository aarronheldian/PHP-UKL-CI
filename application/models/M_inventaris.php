<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventaris extends CI_Model {

    public function get_barang()
    {
        return $this->db
        ->select('*')
        ->from('inventaris')
        ->join('jenis', 'jenis.id_jenis = inventaris.id_jenis')
        ->get()
        ->result();
    }
    
    public function add_barang($data)
    {
        return $this->db->insert('inventaris', $data);
    }

    public function edit_barang($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jumlah' => $this->input->post('jumlah'),
            'id_jenis' => $this->input->post('id_jenis'),
            'tanggal_register' => data('Y-m-d')
        );
        $this->db->where('id_inventaris', $id);
        $this->db->update('inventaris', $data);
    }

    public function delete_barang($id)
    {
        return $this->db->delete('inventaris', array('id_inventaris' => $id));
    }

    public function penguragan($id)
    {
        
    }

}

/* End of file M_inventaris.php */
