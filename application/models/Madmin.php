<?php
class Madmin extends CI_Model
{

//proseslogin
    function simpandata()
    {
            //ambil data dari form 
            $data=$_POST;
            $id_admin=$data['id_admin'];

            $update=array(
                'id_admin'=>$id_admin
            );
            $this->db->where($update);
            $this->db->update('tbadmin',$data);
            $sql="select * from tbadmin where id_admin='".$id_admin."'";
            $query=$this->db->query($sql);
            if($query->num_rows()>0)
            {
            //session
                $data=$query->row();
                $array=array(
                    'id_admin'=>$data['id_admin'],
                    'nama_lengkap'=>$data['nama_lengkap'],
                    'username'=>$data['username'],
                    'email'=>$data['email'],
                    'password'=>$data['password'],
                );	
            $this->session->set_userdata($array);
            $this->session->set_flashdata('pesan','Data sudah diedit...');
            redirect('Cmember/profile','refresh');	
        }   
    }
    function getprofiladmin($id_admin){
        return $this->db->get_where('tbadmin',['id_admin'=>$id_admin])->row();
    }
}
?>
