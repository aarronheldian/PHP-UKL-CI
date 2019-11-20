<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_login');

    }

    public function index()
    {

        if( isset($_SESSION['logged_in']) == TRUE ){
            redirect('C_home');   
        }

        $this->load->view('V_login');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == true) {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $cek = $this->M_login->cek_login($data);
            if ($cek != null) {
                $query = $this->M_login->cek_login($data)[0];
                $this->session->set_userdata('logged_in', TRUE);
                $this->session->set_userdata('id_pengguna', $query['id_pengguna']);
                $this->session->set_userdata('nama_pengguna', $query['nama_pengguna']);
                $this->session->set_userdata('email', $query['email']);
                $this->session->set_userdata('nis', $query['nis']);
                $this->session->set_userdata('alamat', $query['alamat']);
                $this->session->set_userdata('telepon', $query['telepon']);
                $this->session->set_userdata('username', $query['username']);
                $this->session->set_userdata('password', $query['password']);
                $this->session->set_userdata('level', $query['level']);
            }
            redirect('C_home','refresh');
        }
    }

    public function logout()
    {
        unset(
            $_SESSION['logged_in'],
            $_SESSION['id_pengguna'],
            $_SESSION['nama_pengguna'],
            $_SESSION['username'],
            $_SESSION['password'],
            $_SESSION['level'],
            $_SESSION['telepon'],
            $_SESSION['alamat'],
            $_SESSION['nis'],
            $_SESSION['email'],
        );
        $this->session->sess_destroy();
        
        redirect('C_login','refresh');
        
    }

    public function add()
    {
        $this->form_validation->set_rules('nama_pengguna', 'nama_pengguna', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('nis', 'nis', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        $data = array(
            'nama_pengguna' => $this->input->post('nama_pengguna'),
            'email' => $this->input->post('email'),
            'nis' => $this->input->post('nis'),
            'alamat' => $this->input->post('alamat'),
            'telepon' => $this->input->post('telepon'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        if ($this->form_validation->run() == TRUE) {
            $this->session->set_flashdata('message', 'berhasil tambah data');
            $this->M_login->add_user($data);
            redirect('C_inventaris/index','refresh');
        } else {
            $this->session->set_flashdata('message', 'gagal tambah data');
            redirect('C_inventaris/index');
        }
    }
}

/* End C_login.php */
