<?php
class Mmakanan extends CI_Model{
    public function get_makanan()
    {
        return $this->db->get('tbmakanan')->result();
    }
    // function simpanmakanan()
    // {
    //     $data=$_POST;
    //     $id_makanan=$data['id_makanan'];
    //     if(empty($id_makanan)){
    //         $this->db->insert('tbmakanan',$data);
    //         $this->session->set_flashdata('pesan','Data berhasil disimpan');
    //     }
    //     else{
    //         $this->db->where('id_makanan',$id_makanan);
    //         $this->db->update('tbmakanan',$data);
    //         $this->session->set_flashdata('pesan','Data berhasil diedit');
    //     }
    //     redirect('cdashboardadmin/tambahmakanan','refresh');
    // }
            function simpanmakanan()
        {
            $data=$_POST;
            $this->db->insert('tbmakanan',$data);
            $this->session->set_flashdata('pesan','Data berhasil disimpan');
            redirect('cdashboardadmin/tambahmakanan','refresh');
        }
    function getmakanan(){
        return $this->db->get('catatnutrisi')->result();
    }
   
}
?>