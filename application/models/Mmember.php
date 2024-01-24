<?php
class Mmember extends CI_Model
{
    function getprofilmember($id_member){
        return $this->db->get_where('tbmember',['id_member'=>$id_member]);
    }
    //get data dari member
    function getdatamember(){
        return $this->db->get('tbmember');
    }

    function simpanProfile( $username, $nama, $tgl, $usia, $bb,$tb, $jk, $akt, $email, $id){
        //mengambil inputan user
				$data=array(
					'username'=>$username,
					'nama_lengkap'=>$nama,
					'tgl_lahir'=>$tgl,
                    'usia'=>$usia,
                    'berat_badan'=>$bb,
                    'tinggi_badan'=>$tb,
					'jenis_kelamin'=>$jk,
                    'aktivitas'=>$akt,
					'email'=>$email
				);
        $this->db->where('id_member', $id);
        $this->db->update('tbmember', $data);
    }

    function save_gambar($id_member, $file_name){

        $this->db->where('id_member',$id_member);
        $this->db->update('tbmember',['foto_member'=>$file_name]);
    }

    public function hitung_kebutuhan_gizi($id_member) {
        // Ambil data member dari database berdasarkan id_member
        $member = $this->db->get_where('tbmember', array('id_member' => $id_member))->row_array();

        // Lakukan perhitungan berdasarkan rumus Harris-Benedict
        $jenis_kelamin = $member['jenis_kelamin'];
        $berat_badan = $member['berat_badan'];
        $tinggi_badan = $member['tinggi_badan'];
        $usia = $member['usia'];
        $aktivitas = $member['aktivitas'];

        if ($jenis_kelamin == 'laki-laki') {
            $kalori_harian = 88.362 + (13.397 * $berat_badan) + (4.799 * $tinggi_badan) - (5.677 * $usia);
        } else {
            $kalori_harian = 447.593 + (9.247 * $berat_badan) + (3.098 * $tinggi_badan) - (4.330 * $usia);
        }

        // Hitung faktor aktivitas
        $faktor_aktivitas = $this->get_faktor_aktivitas($aktivitas);

        // Kalikan dengan faktor aktivitas
        $kalori_harian *= $faktor_aktivitas;

        // Hitung kebutuhan gizi
        $kebutuhan_protein = 0.15 * $kalori_harian / 4;
        $kebutuhan_karbohidrat = 0.60 * $kalori_harian / 4;
        $kebutuhan_lemak = 0.15 * $kalori_harian / 9;

        // Kembalikan hasil kebutuhan gizi
        return array(
            'kalori_harian' => $kalori_harian,
            'kebutuhan_protein' => $kebutuhan_protein,
            'kebutuhan_karbohidrat' => $kebutuhan_karbohidrat,
            'kebutuhan_lemak' => $kebutuhan_lemak
        );
    }

    private function get_faktor_aktivitas($aktivitas) {
        switch ($aktivitas) {
            case 'sangat_jarang':
                return 1.2;
            case 'jarang':
                return 1.375;
            case 'cukup':
                return 1.55;
            case 'sering':
                return 1.725;
            case 'sangat_sering':
                return 1.9;
            default:
                return 1;
        }
    }

    public function hitung_indeks_kecukupan_nutrisi($id_member) {
        // Hitung total kalori harian menggunakan fungsi yang sudah ada
        $total_kalori_dikonsumsi = $this->mvalidasi->sumkaloriharian($id_member);
    
        // Hitung kebutuhan gizi dari model
        $kebutuhan_gizi = $this->hitung_kebutuhan_gizi($id_member);
    
        // Pastikan total kalori yang dikonsumsi tidak nol
        if ($total_kalori_dikonsumsi <= 0) {
            return "Total kalori yang dikonsumsi tidak valid";
        }

        //kecukupan nutrisi
        if($total_kalori_dikonsumsi >= $kebutuhan_gizi['kalori_harian']){
            return $kekurangan_nutrisi=0;
            return $pesan ="sudah";
        }
        else{
            return  $kekurangan_nutrisi = $kebutuhan_gizi['kalori_harian']-$total_kalori_dikonsumsi;
            return $pesan ="belum";
        }

    }
    
    

}
?>
