
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/Artikel.php

class Ctartikel extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Martikel');
        $this->load->view('forms/tambahartikel');
        $this->load->library('form_validation');
    }

    public function tambah_artikel() {
        $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'required');
        $this->form_validation->set_rules('tgl_upload', 'Tanggal Upload', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validasi form gagal, tampilkan form tambah artikel kembali
            $this->load->view('forms/tambahartikel');
        } else {
            // Validasi form sukses, lakukan upload gambar
            $config['upload_path']   = './path/to/your/upload/folder/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = 1024; // KB
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_artikel')) {
                // Upload gambar berhasil
                $gambar_data = $this->upload->data();
                $gambar_name = $gambar_data['file_name'];

                // Data untuk disimpan ke database
                $data = array(
                    'id_admin' => $this->session->userdata('id_admin'),
                    'judul_artikel' => $this->input->post('judul_artikel'),
                    'tgl_upload' => $this->input->post('tgl_upload'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'foto_artikel' => $this->upload->data('file_name') // Sesuaikan dengan logika upload gambar
                );
                // Simpan ke database
                $this->M_artikel->tambah_artikel($data);

                // Redirect atau tampilkan pesan sukses
                redirect('ctartikel');
            } else {
                // Upload gambar gagal, tampilkan pesan error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('path/to/your/tambah_artikel_view', $error);
            }
        }
    }

}

// application/controllers/Artikel.php
