<?php
class ValidasiData
{
    public function cekInput($validasi)
    {
        $aturanValidasi = null;
        switch ($validasi) {

            case 'login':
                $aturanValidasi = [
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[6]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                ];
            break;
                
            case 'updatePengguna' :
                $aturanValidasi = [
                    ['field' => 'kd_pengguna', 'label' => 'kd_pengguna', 'rules' => 'required|min_length[9]'],
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nmrtelpn', 'label' => 'nmrtelpn', 'rules' => 'required|min_length[10]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[3]'],
                    ['field' => 'levelAkses', 'label' => 'levelAkses', 'rules' => 'required|min_length[3]'],
                ];
            break;
            
            case 'createPengguna' :
                $aturanValidasi = [
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nmrtelpn', 'label' => 'nmrtelpn', 'rules' => 'required|min_length[10]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[3]'],
                    ['field' => 'username', 'label' => 'username', 'rules' => 'required|min_length[6]'],
                    ['field' => 'password', 'label' => 'password', 'rules' => 'required|min_length[6]'],
                    ['field' => 'levelAkses', 'label' => 'levelAkses', 'rules' => 'required|min_length[4]'],
                ];
            break;

            case 'createKaryawan' :
                $aturanValidasi = [
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nmrtelpn', 'label' => 'nmrtelpn', 'rules' => 'required|min_length[10]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[3]'],
                    ['field' => 'jenisKelamin', 'label' => 'jenisKelamin', 'rules' => 'required|min_length[3]'],
                ];
            break;

            case 'updateKaryawan' :
                $aturanValidasi = [
                    ['field' => 'kd_karyawan', 'label' => 'kd_karyawan', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|min_length[3]'],
                    ['field' => 'nmrtelpn', 'label' => 'nmrtelpn', 'rules' => 'required|min_length[10]'],
                    ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required|min_length[3]'],
                    ['field' => 'jenisKelamin', 'label' => 'jenisKelamin', 'rules' => 'required|min_length[3]'],
                ];
            break;

            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
