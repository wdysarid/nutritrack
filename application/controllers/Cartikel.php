<?php
	class Cartikel extends CI_Controller
	{ public function __construct()
		{
			parent::__construct();
			$this->load->model(array('madmin','mvalidasi','martikel'));
			$this->mvalidasi->validasi();
		}
			
		public function tambahartikel() {
			$this->load->view('tambahartikel');
		}
			
		function psimpanartikel()
		{
			$this->martikel->simpanartikel();	
		}
	
		public function hapusartikel($id_artikel)
		{
			$this->martikel->hapusartikel($id_artikel);
		}
		function editartikel($id_artikel)
		{
			$this->martikel->editartikel($id_artikel);
		}
	}
	
?>
