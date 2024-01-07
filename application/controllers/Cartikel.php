<?php
	class Cartikel extends CI_Controller
	{ public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			}
			
			public function psimpanartikel(){
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
			
				// Set validation rules for other form fields
				$this->form_validation->set_rules('judul_artikel', 'Article Title', 'required');
				$this->form_validation->set_rules('tgl_upload', 'Upload Date', 'required');
				$this->form_validation->set_rules('deskripsi', 'Description', 'required');
			
				// Validation for file upload
				if (!empty($_FILES['gambar']['name'])) {
					// File upload rules
					$config['upload_path'] = 'assets/imgadmin/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 1024; // in KB
			
					$this->load->library('upload', $config);
			
					if (!$this->upload->do_upload('gambar')) {
						// File upload failed
						$error = $this->upload->display_errors();
						$this->form_validation->set_message('gambar', $error);
					}
				}
			
				if ($this->form_validation->run() == false) {
					// Validation failed, show the form again with validation errors
					$this->load->view('tambahartikel');
				} else {
					// Validation passed, process the form data and save to database
					$this->load->model('martikel'); // Load your model
					$this->martikel->simpanartikel();
			
					// Redirect or show success message
					// redirect('cadmin/tambahartikel', 'refresh');
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