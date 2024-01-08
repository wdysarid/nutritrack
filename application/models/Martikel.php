<?php
class Martikel extends CI_Model{
    function getartikel(){
        return $this->db->get('tbartikel')->result();
    }
    public function simpanartikel()
    {
        // Validasi Form Input
        $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
        $this->form_validation->set_rules('tgl_upload', 'Tanggal Upload', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Handle validation errors
            // You can redirect back to the form with error messages or display them on the same page
            $this->load->view('tambahartikel');
        } else {
            $data = array(
                'judul_artikel' => $this->input->post('judul_artikel'),
                'tgl_upload' => $this->input->post('tgl_upload'),
                'deskripsi' => $this->input->post('deskripsi'),
                'id_admin' => $this->input->post('id_admin')
            );

            // Upload Image
            $config['upload_path'] = 'assets/imgadmin/'; // Specify your upload directory
            $config['allowed_types'] = 'gif|jpg|jpeg|png'; // Specify allowed file types
            $config['max_size'] = 1024; // Specify max file size in KB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_artikel')) {
                $upload_data = $this->upload->data();
                $data['foto_artikel'] = $upload_data['file_name']; // Use 'file_name' to get the uploaded file's name
            } else {
                $error = $this->upload->display_errors();
                // Handle the error
                echo $error;
                return false;
            }

            // Insert data into the database using Query Builder
            $this->db->insert('tbartikel', $data);

            // Set Flash Message
            $this->session->set_flashdata('success_message', 'Artikel berhasil ditambahkan.');

            // Redirect to the form or any other page
            redirect('cadmin/tambahartikel','refresh');
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