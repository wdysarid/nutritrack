<?php
class Martikel extends CI_Model{
        //get data dari tabel artikel
    public function getartikel($id_admin){
        return $this->db->get_where('tbartikel',['id_admin'=>$id_admin]);
    }
    public function simpanartikel() {
        $data = array(
            'judul_artikel' => $this->input->post('judul_artikel'),
            'tgl_upload' => $this->input->post('tgl_upload'),
            'deskripsi' => $this->input->post('deskripsi'),
            'id_admin' => $this->input->post('id_admin'),
            'foto_artikel' => $this->upload_foto() // call a separate function to handle file upload
        );

        $this->db->insert('tbartikel', $data);

        return true;
    }

    private function upload_foto() {
        $config['upload_path'] = FCPATH . 'assets/imgadmin/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_artikel')) {
            $upload_data = $this->upload->data();
            return $upload_data['file_name'];
        } else {
            $error = $this->upload->display_errors();
            echo $error;
            return false;
        }
    }
    
    function hapusartikel($id_artikel)
    {
        $this->db->where('id_artikel',$id_artikel);
        $this->db->delete('tbartikel');
        $this->session->set_flashdata('pesan','Data berhasil dihapus');
        redirect('cadmin/tambahartikel','refresh');
    }

    // function editmakanan($id_makanan){
    //     $query=$this->db->get_where('tbmakanan',['id_makanan'=>$id_makanan]);
    //     if($query->num_rows()>0){
    //         $data=$query->row();
    //         echo "<script>$('#id_admin').val('".$data->id_admin."')</script>";
    //         echo "<script>$('#id_makanan').val('".$data->id_makanan."')</script>";
    //         echo "<script>$('#nama_makanan').val('".$data->nama_makanan."')</script>";
    //         echo "<script>$('#porsi').val('".$data->porsi."')</script>";
    //         echo "<script>$('#satuan').val('".$data->satuan."')</script>";
    //         echo "<script>$('#karbohidrat').val('".$data->karbohidrat."')</script>";
    //         echo "<script>$('#protein').val('".$data->protein."')</script>";
    //         echo "<script>$('#lemak').val('".$data->lemak."')</script>";
    //         echo "<script>$('#kalori').val('".$data->kalori."')</script>";
            

    //     }
    // }
   
}
?>