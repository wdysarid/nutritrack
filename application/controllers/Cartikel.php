<?php
	class Cartikel extends CI_Controller
	{ public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			}
			
			public function tambahartikel() {
				$this->load->view('tambahartikel');
			}
		
			public function psimpanartikel() {
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				$this->load->library('session');
		
				$this->form_validation->set_rules('judul_artikel', 'Article Title', 'required');
				$this->form_validation->set_rules('tgl_upload', 'Upload Date', 'required');
				$this->form_validation->set_rules('deskripsi', 'Description', 'required');
		
				if ($this->form_validation->run() == false) {
					$this->load->view('tambahartikel');
				} else {
					$this->load->model('martikel');
					$result = $this->martikel->simpanartikel();
		
					if ($result) {
						$this->session->set_flashdata('success_message', 'Artikel berhasil ditambahkan.');
					} else {
						$this->session->set_flashdata('error_message', 'Gagal menyimpan artikel.');
					}
		
					redirect('cadmin/tambahartikel');
				}
			}
	
		public function hapusartikel($id_artikel){
				$this->load->model('martikel');
				$this->martikel->hapusartikel($id_artikel);
		}
		function editartikel($id_artikel){
				$this->load->model('martikel');
				$this->martikel->editartikel($id_artikel);
		}
	}
	
?>