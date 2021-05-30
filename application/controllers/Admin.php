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

    public function hapusData()
    {
        $kolom =  $this->uri->segment(3);
        $kdData = $this->uri->segment(4);
        $tabel = $this->uri->segment(5);
        $alamatKembali = $this->uri->segment(6);
        if($alamatKembali == '' || $tabel == '' || $alamatKembali == '' || $kolom == ''){
            redirect(base_url('Login/Logout'));
        }else{
            $this->model->hapusData($tabel,[$kolom => $kdData]);
            $this->tools->Notif('Berhasil', 'Data Berhasil di Hapus','success','Admin/'.$alamatKembali);
        }
    }

    public function DataPengguna()
    {
        $data['datapengguna'] = $this->model->ambilSemuaData('tb_pengguna')->result();
        $this->tools->view('1_DataPengguna',$data);
    }

    public function updateDataPengguna()
    {
        $kdPengguna = $this->uri->segment(3);
        $join = [['tb_akun','tb_akun.kd_pengguna = tb_pengguna.kd_pengguna','INNER JOINT']];
        $selectData = 'tb_pengguna.*, tb_akun.*';
        $data['datapengguna'] = $this->model->jointTabel($selectData,'tb_pengguna',$join,['tb_pengguna.kd_pengguna' => $kdPengguna])->row();
        if($data != NULL){
            $this->tools->view('2_CreateUpadatePengguna',$data);
        }else{
            redirect(base_url('Login/Logout'));
        }
    }

    public function prosesUpdatePengguna()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('updatePengguna'));
        if ($this->form_validation->run() == TRUE) {
            $dataPengguna = array(
                'nama' => $this->input->post('nama'),
                'nomor_hp' => $this->input->post('nmrtelpn'),
                'alamat' => $this->input->post('alamat'),
            );
            $this->model->updateData('tb_pengguna',$dataPengguna,['kd_pengguna' => $this->input->post('kd_pengguna')]);
            $this->model->updateData('tb_akun',['level_akses' => $this->input->post('levelAkses')],['kd_pengguna' => $this->input->post('kd_pengguna')]);
            $this->tools->Notif('Berhasil', 'Data Berhasil di Upadate','success','Admin/DataPengguna');
        } else {
            $this->tools->Notif('Gagal', 'Data Gagal di Upadate Periksa Kembali Inputan anda','error','Admin/DataPengguna');
        }
    }

    public function createDataPengguna()
    {
        $data['username'] = $this->tools->generateKode('tb_akun','username','USR');
        $this->tools->view('2_CreateUpadatePengguna',$data);
    }

    public function createPengguna()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('createPengguna'));
        
        if ($this->form_validation->run() == TRUE) {
            $kd_pengguna = $this->tools->generateKode('tb_pengguna','kd_pengguna','KDP');
            $dataPengguna = array(
                'kd_pengguna' => $kd_pengguna,
                'nama' => $this->input->post('nama'),
                'nomor_hp' => $this->input->post('nmrtelpn'),
                'alamat' => $this->input->post('alamat')
            );

            $dataAkun = array(
                'kd_akun' => $this->tools->generateKode('tb_akun','kd_akun','KDA'),
                'kd_pengguna' => $kd_pengguna,
                'username' => $this->input->post('username'),
                'password' => sha1($this->input->post('password')),
                'level_akses' => $this->input->post('levelAkses')
            );

            $this->model->inputData('tb_pengguna', $dataPengguna);
            $this->model->inputData('tb_akun', $dataAkun);
            $this->tools->Notif('Berhasil','Data Pengguna Berhasil disimpan','success','Admin/createDataPengguna');
        } else {
            $this->tools->Notif('GAGAL','Periksa Kembali Data yang anda inputkan','error','Admin/createDataPengguna');
        }
        
    }

    public function dataKaryawan()
    {
        $data['data'] = $this->model->ambilSemuaData('tb_calon_karyawan')->result();
        $this->tools->view('3_DataKaryawan',$data);
    }

    public function updateDataKarwayan()
    {
        var_dump($_GET);
    }

    public function prosesUpdateKaryawan()
    {
        var_dump($_POST);
    }

    public function createKaryawan()
    {
        $this->tools->view('4_CreteKaryawan');
    }

    public function prosesCreateKaryawan()
    {
        $this->form_validation->set_rules($this->validasidata->cekInput('createKaryawan'));
        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'kd_calon_karyawan' => $this->tools->generateKode('tb_calon_karyawan','kd_calon_karyawan','KDC'),
                'nama' => $this->input->post('nama'),
                'nomor_hp' => $this->input->post('nmrtelpn'),
                'jenis_kelamin' => $this->input->post('jenisKelamin'),
                'alamat' => $this->input->post('alamat'),
            );

            $this->model->inputData('tb_calon_karyawan', $data);
            $this->tools->Notif('Berhasil','Data Karyawan Berhasil disimpan','success','Admin/createKaryawan');
        } else {
            $this->tools->Notif('GAGAL','Periksa Kembali Data yang anda inputkan','error','Admin/createKaryawan');
        }
        
    }


}

/* End of file Admin.php */
