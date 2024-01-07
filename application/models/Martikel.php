<?php
class Martikel extends CI_Model{
    function getartikel(){
        return $this->db->get('tbartikel')->result();
    }
    public function simpanartikel()
    {
        $data = array(
            'judul_artikel' => $this->input->post('judul_artikel'),
            'tgl_upload' => $this->input->post('tgl_upload'),
            'deskripsi' => $this->input->post('deskripsi')
        );

        // Upload Image
        $config['upload_path'] = 'assets/imgadmin/'; // Specify your upload directory
        $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Specify allowed file types
        $config['max_size'] = 1024; // Specify max file size in KB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $upload_data = $this->upload->data();
            $data['gambar'] = $upload_data['file_name']; // Use 'file_name' to get the uploaded file's name
        } else {
            $error = $this->upload->display_errors();
            // Handle the error
            echo $error;
            return false;
        }

        // Insert data into the database
        $this->db->insert('tbartikel', $data);
        // Redirect or show success message
        redirect('cadmin/tambahartikel','refresh');
    }


    function hapusartikel($id_artikel)
    {
        $this->db->where('id_makanan',$id_makanan);
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