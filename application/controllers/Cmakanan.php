<?php
	class Cmakanan extends CI_Controller
	{ 
		public function __construct(){
			parent::__construct();
			$this->load->model(array('mvalidasi','mmakanan'));

		}
			
		public function psimpanmakanan(){
			$this->mmakanan->simpanmakanan();
		}
		public function hapusmakanan($id_makanan){
			$this->mmakanan->hapusmakanan($id_makanan);
		}
		function editmakanan($id_makanan){
			$this->mmakanan->editmakanan($id_makanan);
		}
	}
?>