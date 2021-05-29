<?php

class Sidebar
{
    
    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function menu()
    {
        $pengguna = array(
            array('label' => 'Data Pengguna','url' => '#'),
            array('label' => 'Tambah Pengguna','url' => '#'),
            array('label' => 'Data Pengguna Banned','url' => '#'),
        );

        $dataKaryawan = array(
            array('label' => 'Data Karyawan','url' => '#'),
            array('label' => 'Tambah Karyawan','url' => '#'),
            array('label' => 'Recycle Karyawan','url' => '#'),
        );

        $menu = array(
            array('child' => FALSE, 'child_menu' => NULL, 'url' => base_url('Dashboard'),'icon' => 'fas fa-tachometer-alt', 'label' => 'Dashboard'),
            array('child' => TRUE, 'child_menu' => $pengguna, 'url' => '#','icon' => 'fas fa-tachometer-alt', 'label' => 'Pengguna'),
            array('child' => TRUE, 'child_menu' => $dataKaryawan, 'url' => '#','icon' => 'fas fa-tachometer-alt', 'label' => 'Karyawan'),
        );

        return $menu;

    }
    
}
