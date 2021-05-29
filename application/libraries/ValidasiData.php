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
            
            default:
                echo "PERIKSA ATURAN VALIDASI YANG ANDA MASUKAN";
                break;
        }

        return $aturanValidasi;
    }
}
