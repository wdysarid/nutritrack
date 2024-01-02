<?php
    class Maktivitas extends CI_Model{
        //fungsi simpan
        // function simpanaktivitas()
        // {
        //     $data=$_POST;
        //    $data['lama_aktivitas']= (strtotime($data['waktu_selesai'])-strtotime($data['waktu_mulai'])) /60;
        //     $this->db->insert('tbaktivitas',$data);
        //     $this->session->set_flashdata('pesan','Data berhasil disimpan');
        //     redirect('cdashboard/catataktivitas','refresh');
        // }
        //GAGALLLL
        function simpanaktivitas()
        {
            $data = $_POST;
            $id_aktivitas = $data['id_aktivitas'];
        
            // Calculate lama_aktivitas if waktu_selesai and waktu_mulai are present
            if ($data['waktu_selesai'] && $data['waktu_mulai']) {
                $data['lama_aktivitas'] = (strtotime($data['waktu_selesai']) - strtotime($data['waktu_mulai'])) / 60;
            }
            
            if (empty($id_aktivitas)) {
                $this->db->insert('tbaktivitas', $data);
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            } else {
                $this->db->where('id_aktivitas', $id_aktivitas);
                $this->db->update('tbaktivitas', $data);
                $this->session->set_flashdata('pesan', 'Data berhasil diedit');
            }
        
            redirect('cdashboard/catataktivitas', 'refresh');
        }
        
        
        //cara memanggil view
        function getaktivitas(){
            return $this->db->get('catataktivitas')->result();
        }
        function hapusaktivitas($id_aktivitas)
        {
            $this->db->where('id_aktivitas',$id_aktivitas);
            $this->db->delete('tbaktivitas');
            $this->session->set_flashdata('pesan','Data berhasil dihapus');
            redirect('cdashboard/catataktivitas','refresh');
        }
        function editaktivitas($id_aktivitas){
            $query=$this->db->get_where('tbaktivitas',['id_aktivitas'=>$id_aktivitas]);
            if($query->num_rows()>0){
                $data=$query->row();
                echo "<script>$('#id_member').val('".$data->id_member."')</script>";
                echo "<script>$('#id_aktivitas').val('".$data->id_aktivitas."')</script>";
                echo "<script>$('#nama_aktivitas').val('".$data->nama_aktivitas."')</script>";
                echo "<script>$('#waktu_mulai').val('".$data->waktu_mulai."')</script>";
                echo "<script>$('#waktu_selesai').val('".$data->waktu_selesai."')</script>";
            }
        }
    }
?>
