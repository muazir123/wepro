<?php
class Tools
{
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('sidebar');
        $this->CI->load->model('model');
    }

    public function Notif($text1,$text2,$icon,$alamat)
    {
        $notif = "Swal.fire('$text1','$text2','$icon');";
        $this->CI->session->set_flashdata('PESAN', $notif);
        redirect(base_url($alamat));
    }


    public function view($halaman,$data = null)
    {
        $menu['MENU'] = $this->CI->sidebar->menu();
        // $header['NAMA_PENGGUNA'] = $this->CI->model->ambilDataTertentuSelect('tb_pengguna','nama_pengguna',['kd_pengguna' => $this->CI->session->userdata('kd_pengguna')])->row();
        
        $this->CI->load->view('PARTIAL/head');
        $this->CI->load->view('PARTIAL/sidebar',$menu);
        $this->CI->load->view('PARTIAL/header');
        $this->CI->load->view("DALAM/$halaman",$data);
        $this->CI->load->view('PARTIAL/footer');
    }

    public function generateKode($tabel,$kolom,$initial){
        $kode = $this->CI->model->query("SELECT MAX($kolom) as maxKode FROM $tabel")->row();
        $kode = $kode->maxKode;

        $noUrut = (int) substr($kode, 3,17);
        $noUrut++;
        $kode = $initial.sprintf('%07s',$noUrut);
        return $kode; 
    }



}
