<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_peminjaman extends CI_Model {

    public function get_peminjaman()
    {
        if ($_SESSION['level'] == "user") {
            $query = $this->db->select('*')
            ->from('peminjaman')
            ->join('inventaris', 'inventaris.id_inventaris = peminjaman.id_inventaris')
            ->join('jenis', 'jenis.id_jenis = inventaris.id_jenis')
            ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
            ->where('peminjaman.id_pengguna', $_SESSION['id_pengguna'])
            ->get()
            ->result();
            return $query;        
        } else {
            $query = $this->db->select('*')
            ->from('peminjaman')
            ->join('inventaris', 'inventaris.id_inventaris = peminjaman.id_inventaris')
            ->join('jenis', 'jenis.id_jenis = inventaris.id_jenis')
            ->join('pengguna', 'pengguna.id_pengguna = peminjaman.id_pengguna')
            ->get()
            ->result();
            return $query;
        }
    }

    public function add_peminjaman($data)
    {
        $this->db->insert('peminjaman', $data);
        $this->session->set_flashdata('messages', 'berhasil tambah data');
    }

    public function konfirmasi($id)
    {
        $data = array(
            'status' => 1
        );
        $this->db->where('id_pinjam', $id);
        $this->db->update('peminjaman', $data);
    }

    public function kembali($id)
    {
        $data = array(
            'status' => 2
        );
        $this->db->where('id_pinjam', $id);
        $this->db->update('peminjaman', $data);
    }

    public function delete($id)
    {
        return $this->db->delete('peminjaman', array('id_pinjam' => $id));
    }


}

/* End of file M_peminjaman.php */
