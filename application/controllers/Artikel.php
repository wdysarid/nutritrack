
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/controllers/Artikel.php

class Artikel extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Artikel_model');
    }

    public function index() {
        $data['artikel_list'] = $this->Artikel_model->get_artikel_list();
        $this->load->view('artikel/header');
        $this->load->view('artikel/index', $data);
        $this->load->view('artikel/footer');
    }

    public function tambah() {
        // Logika untuk menampilkan formulir tambah artikel
        // ...

        // Jika formulir disubmit, simpan artikel ke database
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Logika untuk menyimpan artikel ke database
            // ...

            redirect('artikel');
        }

        $this->load->view('artikel/header');
        $this->load->view('artikel/tambah');
        $this->load->view('artikel/footer');
    }

    public function detail($id) {
        $data['artikel'] = $this->Artikel_model->get_artikel_by_id($id);
        $this->load->view('artikel/header');
        $this->load->view('artikel/detail', $data);
        $this->load->view('artikels/footer');
    }
}

// application/controllers/Artikel.php

