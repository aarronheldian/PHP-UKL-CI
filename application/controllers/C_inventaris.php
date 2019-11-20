<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_inventaris extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_inventaris');
        $this->load->model('M_jenis');

    }

    public function index()
    {
        if ($_SESSION['logged_in'] != TRUE) {
            redirect('login','refresh');
        } 
        else {
            
            $data['inventaris'] = $this->M_inventaris->get_barang();
            $data['jenis'] = $this->M_jenis->get_jenis();
            $this->load->view('V_barang', $data);
            
        }

    }

    public function add()
    {

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('id_jenis', 'id_jenis', 'required');
        
        $data = array(
            'nama' => $this->input->post('nama'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jumlah' => $this->input->post('jumlah'),
            'id_jenis' => $this->input->post('id_jenis'),
            'tanggal_register' => date('Y-m-d')
        );

        
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('message', 'berhasil tambah data');
            $this->M_inventaris->add_barang($data);
            redirect('C_inventaris/index','refresh');
        } else {
            $this->session->set_flashdata('message', 'gagal tambah data');
            redirect('C_inventaris/index');
        }
    }

    public function delete($id)
    {
        $this->M_inventaris->delete_barang($id);
        redirect('C_inventaris/index','refresh');
    }

}

/* End of file C_inventaris.php */
