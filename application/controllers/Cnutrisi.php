<?php
	class Cnutrisi extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->load->model('mnutrisi');
			$this->mvalidasi->validasi();
	   }
		public function psimpannutrisi(){
			$this->mnutrisi->simpannutrisi();
		}

		public function hapusnutrisi($id_nutrisi){
			$this->mnutrisi->hapusnutrisi($id_nutrisi);
		}

		function editnutrisi($id_nutrisi){
			$this->mnutrisi->editnutrisi($id_nutrisi);
		}
	}
?>