<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengguna');

        if (isset($_SESSION['logged_in']) != true) {
            redirect('login','refresh');
        } 

    }

    public function index()
    {
        $data['pengguna'] = $this->M_pengguna->get_pengguna();
        $this->load->view('V_user', $data);
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_pengguna', 'nama_pengguna', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telepon', 'nis', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('level', 'level', 'required');

        $data = array(
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'email' => $this->input->post('email'),
            'nis' => $this->input->post('nis'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level' => $this->input->post('level')
        );

        
        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('message', 'berhasil tambah data');
            $this->M_pengguna->tambah_pengguna($data);
            redirect('C_pengguna/index','refresh');
        } else {
            $this->session->set_flashdata('message', 'gagal tambah data');
            redirect('C_pengguna/index');
        }
    }

    public function delete($id_pengguna)
    {
        $this->M_pengguna->delete_pengguna($id_pengguna);
        redirect('C_pengguna/index','refresh');
    }

}

/* End of file C_pengguna.php */
