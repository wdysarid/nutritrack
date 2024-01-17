<?php
class Madmin extends CI_Model
{

    //get data profil admin
    function getprofiladmin($id_admin){
        return $this->db->get_where('tbadmin',['id_admin'=>$id_admin]);
    }

    //profile admin
    function simpanprofile(){
        //mengambil inputan user
        $data=array(
            'nama_lengkap'=>$this->input->post('nama_lengkap'),
            'username'=>$this->input->post('username'),
            'email'=>$this->input->post('email')
        );

        $this->db->where('id_admin',$this->input->post('id_admin'));
        return $this->db->update('tbadmin',$data);
    }

    function hapusmember($id_member)
    {
        //hapus data nutrisi member di tbnutrisi
        $this->db->where('id_member', $id_member);
        $this->db->delete('tbnutrisi');

        //hapus data aktivitas member di tbaktivitas
        $this->db->where('id_member', $id_member);
        $this->db->delete('tbaktivitas');
    
        //hapus member
        $this->db->where('id_member', $id_member);
        $this->db->delete('tbmember');
    
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus');
        redirect('cadmin/index', 'refresh');
    }
    


}
?>
