<?php
	class Caktivitas extends CI_Controller
	{
		public function __construct()
         {
             parent::__construct();
             $this->load->model('mvalidasi');
             $this->mvalidasi->validasi();
			}
			
		public function psimpanaktivitas(){
			$this->load->model('maktivitas');
			$this->maktivitas->simpanaktivitas();
		}
		public function hapusaktivitas($id_aktivitas){
			$this->load->model('maktivitas');
			$this->maktivitas->hapusaktivitas($id_aktivitas);
		}
		function editaktivitas($id_aktivitas){
			$this->load->model('maktivitas');
			$this->maktivitas->editaktivitas($id_aktivitas);
		}
	}
?>