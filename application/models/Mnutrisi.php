<?php
    class Mnutrisi extends CI_Model{
        //fungsi simpan
        function simpannutrisi()
        {
            $data=$_POST;
            $id_nutrisi=$data['id_nutrisi'];
            if(empty($id_nutrisi)){
                $this->db->insert('tbnutrisi',$data);
                $this->session->set_flashdata('pesan','Data berhasil disimpan');
            }
            else{
                $this->db->where('id_nutrisi',$id_nutrisi);
                $this->db->update('tbnutrisi',$data);
                $this->session->set_flashdata('pesan','Data berhasil diedit');
            }
            redirect('cdashboard/catatnutrisi','refresh');
        }

        //cara memanggil view
        function getnutrisi(){
        return $this->db->get('catatnutrisi')->result();
        }

    function hapusnutrisi($id_nutrisi)
    {
        $this->db->where('id_nutrisi',$id_nutrisi);
        $this->db->delete('tbnutrisi');
        $this->session->set_flashdata('pesan','Data berhasil dihapus');
        redirect('cdashboard/catatnutrisi','refresh');
    }
    function editnutrisi($id_nutrisi){
        $query=$this->db->get_where('tbnutrisi',['id_nutrisi'=>$id_nutrisi]);
        if($query->num_rows()>0){
            $data=$query->row();
            // echo "<script>$('#id_member').val('".$data->id_member."')</script>";
            echo "<script>$('#id_makanan').val('".$data->id_makanan."')</script>";
            echo "<script>$('#id_nutrisi').val('".$data->id_nutrisi."')</script>";
            echo "<script>$('#tgl_catatan').val('".$data->tgl_catatan."')</script>";
            echo "<script>$('#jumlah').val('".$data->jumlah."')</script>";
            echo "<script>$('#keterangan').val('".$data->keterangan."')</script>";
        }
    }
    }
?>
