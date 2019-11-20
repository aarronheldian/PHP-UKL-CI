<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_peminjaman extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_peminjaman');
        $this->load->model('M_inventaris');
        date_default_timezone_set('Asia/Jakarta');

        if (isset($_SESSION['logged_in']) != true) {
            redirect('login','refresh');
        } 

    }
    

    public function index()
    {

        $data['peminjaman'] = $this->M_peminjaman->get_peminjaman();
        $data['barang'] = $this->M_inventaris->get_barang();
        $this->load->view('V_data', $data);

    }

    public function add()
    {   
        $this->form_validation->set_rules('id_inventaris', 'id_inventaris', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'tanggal_kembali', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        $data = array(
            'id_inventaris' => $this->input->post('id_inventaris'),
            'qty' => $this->input->post('qty'),
            'id_pengguna' => $_SESSION['id_pengguna'],
            'status' => 0,
            'tanggal_pinjam' => date('Y-m-d H:i:s'),
            'tanggal_kembali' => $this->input->post('tanggal_kembali')
        );
        
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('message', 'berhasil tambah data');
            $this->M_peminjaman->add_peminjaman($data);
            redirect('C_peminjaman/index','refresh');
        } else {
            $this->session->set_flashdata('message', 'gagal tambah data');
            redirect('C_peminjaman/index');
        }
    }

    public function konfirmasi($id)
    {
        $this->M_peminjaman->konfirmasi($id);
        redirect('C_peminjaman/index','refresh');
    }

    public function kembali($id)
    {
        $this->M_peminjaman->kembali($id);
        redirect('C_peminjaman/index','refresh');
    }

    public function delete($id)
    {
        $this->M_peminjaman->delete($id);
        redirect('C_peminjaman/index','refresh');
    }

}

/* End of file C_peminjaman.php */
