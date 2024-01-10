<?php
class Martikel extends CI_Model{
        //get data dari tabel artikel
    public function getartikel($id_admin){
        return $this->db->get_where('tbartikel',['id_admin'=>$id_admin]);
    }
<<<<<<< HEAD
    // public function getartikel($id_artikel){
    //     return $this->db->get_where('tbartikel',['id_admin'=>$id_admin]);
    // }
=======

    function getdataartikel(){
        return $this->db->get('tbartikel');
    }
>>>>>>> d0af8556ecc32418f91dbd9ab8099d0325ad3f1a
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
        $config['allowed_types'] = 'jpg|jpeg|png';
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

    function editartikel($id_artikel){
        $query=$this->db->get_where('tbartikel',['id_artikel'=>$id_artikel]);
        if($query->num_rows()>0){
            $data=$query->row();
            echo "<script>$('#id_admin').val('".$data->id_admin."')</script>";
            echo "<script>$('#id_artikel').val('".$data->id_artikel."')</script>";
            echo "<script>$('#judul_artikel').val('".$data->judul_artikel."')</script>";
            echo "<script>$('#tgl_upload').val('".$data->tgl_upload."')</script>";
            echo "<script>$('#deskripsi').val('".$data->deskripsi."')</script>";
            
            //gambar
            if (!empty($data->foto_artikel)) {
                $imagePath = FCPATH."assets/imgadmin/" . $data->foto_artikel; // Replace "path/to/img_admin/" with the actual path
                echo "<script>$('#foto_artikel').val('".$data->foto_artikel."')</script>";
                echo "<img src='{$imagePath}' alt='Article Image'>";
            } else {
                echo "<script>$('#foto_artikel').val('')</script>"; // Clear the value if 'foto_artikel' is empty
            }

        }
    }
   
}
?>