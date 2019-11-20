<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (isset($_SESSION['logged_in']) != true) {
            redirect('C_login','refresh');
        }
        
    }

    public function index()
    {
        $this->load->view('V_home');
    }

}

/* End of file C_home.php */
