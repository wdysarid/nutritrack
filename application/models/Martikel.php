<?php
class Martikel extends CI_Model{
    //get data dari tabel artikel
    public function getartikel(){
        return $this->db->get('tbartikel');
    }

    function getdataartikel(){
        return $this->db->get('tbartikel');
    }
    function simpanartikel()
    {
        $this->load->library('upload');
        $data = $_POST;
        $judul_artikel = $data['judul_artikel'];
        $tgl_upload = $data['tgl_upload'];
        $deskripsi = $data['deskripsi'];
        $keterangan = $data['keterangan'];
        $id_artikel = $data['id_artikel'];
        $upload_foto = $this->uploadfoto($_FILES['foto_artikel'], 'foto_artikel', $keterangan);
    
        if ($id_artikel == "") {
            // simpan artikel
            $data['foto_artikel'] = $upload_foto;
            $this->db->insert('tbartikel', $data);
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan');
            redirect('cadmin/tambahartikel', 'refresh');
        } else {
            // edit artikel
            $update = array(
                'id_artikel' => $id_artikel
            );
    
            // Check if a new photo is uploaded
            if (!empty($_FILES['foto_artikel']['name'])) {
                // Delete the old photo before updating
                $old_photo = $this->db->get_where('tbartikel', array('id_artikel' => $id_artikel))->row()->foto_artikel;
                if (!empty($old_photo)) {
                    $this->deletePhotoFromDirectory($old_photo);
                }
    
                // Upload the new photo
                $data['foto_artikel'] = $this->uploadfoto($_FILES['foto_artikel'], 'foto_artikel', $keterangan);
            }
    
            $this->db->where($update);
            $this->db->update('tbartikel', $data);
            $this->session->set_flashdata('pesan', 'Data berhasil diedit');
            redirect('cadmin/tambahartikel', 'refresh');
        }
    }
    
    function uploadfoto($upload_foto,$field,$nama)
    {
        $this->load->library('upload');
        $NamaFile=str_replace(' ', '', $nama);
        $extractFile = pathinfo($upload_foto['name']);	
        $ekst = $extractFile['extension'];
        $newName = $NamaFile.".".$ekst; 
        $config['upload_path']				= FCPATH.'assets/imgadmin/artikel/';
        $config['allowed_types']			= array('png','jpeg','jpg');; 
        $config['max_size']         		= 2000; //max 2mb
        $config['overwrite'] 				= true;
        $config['file_name'] 				= $newName;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($field)){
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            return "";
        }else{
            
            return $newName;
        }
     }

    function deletePhotoFromDirectory($photo)
    {
        $photo_path = FCPATH . 'assets/imgadmin/artikel/' . $photo;
        if (file_exists($photo_path)) {
            unlink($photo_path);
        }
    }
    
    function hapusartikel($id_artikel)
    {
        $data = $this->db->get_where('tbartikel',['id_artikel'=>$id_artikel])->row();
        $target_gambar = 'assets/imgadmin/artikel/'.$data->foto_artikel;
        unlink($target_gambar);
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
            echo "<script>$('#keterangan').val('".$data->keterangan."')</script>";
            echo "<script>$('#foto_artikel').attr('src', '".base_url('assets/imgadmin/artikel/').$data->foto_artikel."')</script>";
        }
    }
   
}
?>