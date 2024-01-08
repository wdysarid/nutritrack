<?php
class Mmakanan extends CI_Model{
    function getmakanan(){
        return $this->db->get('tbmakanan')->result();
    }
    function simpanmakanan()
    {
        $data=$_POST;
        $id_makanan=$data['id_makanan'];
        if(empty($id_makanan)){
            $this->db->insert('tbmakanan',$data);
            $this->session->set_flashdata('pesan','Data berhasil disimpan');
        }
        else{
            $this->db->where('id_makanan',$id_makanan);
            $this->db->update('tbmakanan',$data);
            $this->session->set_flashdata('pesan','Data berhasil diedit');
        }
        redirect('cadmin/tambahmakanan','refresh');
    }

    function hapusmakanan($id_makanan)
    {
        $this->db->where('id_makanan',$id_makanan);
        $this->db->delete('tbmakanan');
        $this->session->set_flashdata('pesan','Data berhasil dihapus');
        redirect('cadmin/tambahmakanan','refresh');
    }
    function editmakanan($id_makanan){
        $query=$this->db->get_where('tbmakanan',['id_makanan'=>$id_makanan]);
        if($query->num_rows()>0){
            $data=$query->row();
            echo "<script>$('#id_admin').val('".$data->id_admin."')</script>";
            echo "<script>$('#id_makanan').val('".$data->id_makanan."')</script>";
            echo "<script>$('#nama_makanan').val('".$data->nama_makanan."')</script>";
            echo "<script>$('#porsi').val('".$data->porsi."')</script>";
            echo "<script>$('#satuan').val('".$data->satuan."')</script>";
            echo "<script>$('#karbohidrat').val('".$data->karbohidrat."')</script>";
            echo "<script>$('#protein').val('".$data->protein."')</script>";
            echo "<script>$('#lemak').val('".$data->lemak."')</script>";
            echo "<script>$('#kalori').val('".$data->kalori."')</script>";
            

        }
    }
   
}
?>