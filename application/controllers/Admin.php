<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $levelAkses = $this->session->userdata('level_akses');
        $statusAkses = $this->session->userdata('status');
        if($levelAkses == 'admin' && $statusAkses == 'LOGIN'){
            
            $this->load->library('tools');
            $this->load->library('validasidata');
            $this->load->model('model');
            
        }else{
            redirect('Login/Logout');
        }
    }
    

    public function index()
    {
        $this->tools->view('0_blank');
    }

    public function DataPengguna()
    {
        $this->tools->view('1_DataPengguna');
    }

}

/* End of file Admin.php */
