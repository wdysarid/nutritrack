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

    function simpanProfile($nama, $username, $tgl, $jk, $bb,$tb, $email, $id){
        //mengambil inputan user
				$data=array(
					'nama_lengkap'=>$nama,
					'username'=>$username,
					'tgl_lahir'=>$tgl,
                    'berat_badan'=>$bb,
                    'tinggi_badan'=>$tb,
					'jenis_kelamin'=>$jk,
					'email'=>$email
				);
        $this->db->where('id_member', $id);
        $this->db->update('tbmember', $data);
    }

    function save_gambar($id_member, $file_name){

        $this->db->where('id_member',$id_member);
        $this->db->update('tbmember',['foto_member'=>$file_name]);
    }
}
?>
