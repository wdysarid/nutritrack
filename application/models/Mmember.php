<?php
class Mmember extends CI_Model
{

//proseslogin
    function simpandata()
        {
            //ambil data dari form 
            $data=$_POST;
            $id_member=$data['id_member'];

            $update=array(
                'id_member'=>$id_member
            );
            $this->db->where($update);
            $this->db->update('tbmember',$data);
            $sql="select * from tbmember where id_member='".$id_member."'";
            $query=$this->db->query($sql);
            if($query->num_rows()>0)
            {
            //session
                $data=$query->row();
                $array=array(
                    'id_member'=>$data['id_member'],
                    'nama_lengkap'=>$data['nama_lengkap'],
                    'username'=>$data['username'],
                    'email'=>$data['email'],
                    'jenis_kelamin'=>$data['jenis_kelamin'],
                    'password'=>$data['password'],
                    'tgl_lahir'=>$data['tgl_lahir'],
                );	
            $this->session->set_userdata($array);
            $this->session->set_flashdata('pesan','Data sudah diedit...');
            redirect('Cmember/profile','refresh');	
        } 
    }
    function getprofilmember($id_member){
        return $this->db->get_where('tbmember',['id_member'=>$id_member])->row();
    }
}
?>
