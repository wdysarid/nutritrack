<?php
	class Cmakanan extends CI_Controller
	{ public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
			$this->mvalidasi->validasi();
			}
			
		public function psimpanmakanan(){
			$this->load->model('mmakanan');
			$this->mmakanan->simpanmakanan();
		}
		public function hapusmakanan($id_makanan){
			$this->load->model('mmakanan');
			$this->mmakanan->hapusmakanan($id_makanan);
		}
		function editmakanan($id_makanan){
			$this->load->model('mmakanan');
			$this->mmakanan->editmakanan($id_makanan);
		}
	}
?>