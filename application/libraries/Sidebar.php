<?php

class Sidebar
{
    
    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->model('model');
    }

    public function menu()
    {
        $pengguna = array(
            array('label' => 'Data Pengguna','url' => base_url('Admin/DataPengguna')),
            array('label' => 'Tambah Pengguna','url' => base_url('Admin/createDataPengguna')),
        );

        $dataKaryawan = array(
            array('label' => 'Data Karyawan','url' => base_url('Admin/dataKaryawan')),
            array('label' => 'Tambah Karyawan','url' => base_url('Admin/createKaryawan')),
        );

        
        $dataNilai = array(
            array('label' => 'Data Nilai','url' => "#"),
            array('label' => 'Tambah Nilai','url' => base_url('Admin/tambahNilai')),
        );


        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin'),'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
            array('child' => TRUE, 'child_menu' => $pengguna, 'url' => '#','icon' => 'fas fa-user', 'label' => 'Pengguna'),
            array('child' => TRUE, 'child_menu' => $dataKaryawan, 'url' => '#','icon' => 'fas fa-users', 'label' => 'Karyawan'),
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Admin/dataKriteria'),'icon' => 'fas fa-address-book', 'label' => 'Kriteria'),
            array('child' => TRUE, 'child_menu' => $dataNilai, 'url' => "#",'icon' => 'fas fa-code', 'label' => 'Nilai'),
        );

        $query = "SELECT tb_calon_karyawan.* FROM tb_calon_karyawan LEFT JOIN tb_nilai ON tb_calon_karyawan.kd_calon_karyawan = tb_nilai.kd_karyawan WHERE tb_nilai.kd_karyawan IS NULL";
        $cekShowRanked = $this->CI->model->query($query)->result();

        if(count($cekShowRanked) < 1){
            $ranked = array('child' => FALSE, 'child_menu' => NULL, 'url' => '#','icon' => 'fas fa-trophy', 'label' => 'Ranking');
            array_push($menu,$ranked);
        }
        return $menu;

    }
    
}
