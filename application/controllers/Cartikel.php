<?php
	class Cartikel extends CI_Controller
	{ public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			}
			
		public function psimpanartikel(){
			$this->load->model('martikel');
			$this->martikel->simpanartikel();
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