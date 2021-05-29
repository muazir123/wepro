<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model');
        $this->load->library('tools');
        $this->load->library('validasidata');
    }
    

    public function index()
    {
        $this->load->view('V_login');
    }

    public function Validasi()
    {

        $this->form_validation->set_rules($this->validasidata->cekInput('login'));
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                "username" => $this->input->post('username'),
                "password" => sha1($this->input->post('password'))
            );

            $data = $this->model->ambilDataTertentu('tb_akun',$data)->row();
            if($data != null){
                $sess = array(
                    'kd_akun' => $data->kd_akun,
                    'username' => $data->username,
                    'level_akses' => $data->level_akses,
                    'status' => 'LOGIN'
                );
                $this->session->set_userdata( $sess );

                if($data->level_akses == 'admin'){
                    redirect(base_url('Admin'));
                }
                
            }else{
                $this->tools->Notif('GAGAL','Periksa Kembali Username dan Password Anda','error','Login');
            }
        } else {
            $this->tools->Notif('GAGAL','Periksa Kembali Username dan Password Anda','error','Login');
        }
        
    }

    public function Logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }


}

/* End of file Login.php */
