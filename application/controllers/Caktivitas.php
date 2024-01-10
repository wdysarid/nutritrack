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
		function cetakaktivitashr($id_member)
        {
            $data1['data_aktivitashr']=$this->mnutrisi->getaktivitashrn($id_member)->result_array();
			require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
            $pdf = new Dompdf\Dompdf();

            $pdf->setPaper('a4', 'landscape');
            $pdf->set_option('isRemoteEnabled', TRUE);
            $pdf->set_option('isHtml5ParserEnabled', true);
            $pdf->set_option('isPhpEnabled', true);
            $pdf->set_option('isFontSubsettingEnabled', true);

            $pdf->loadHtml($this->load->view('member/cetakaktivitashr',$data1, true));
            $pdf->render();
            $pdf->stream('Nutrisi Aktivitas Member', ['Attachment' => false]);

    	} 
	}
?>