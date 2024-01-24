<?php
	class Cnutrisi extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model(array('mmember','mvalidasi','mnutrisi'));
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


		function cetaknutrisihr($id_member)
        {
            $data1['data_nutrisihr']=$this->mnutrisi->getnutrisihrn($id_member)->result_array();
			$data1['total_karbohidrat']=$this->mvalidasi->sumkarboharian($id_member);
			$data1['total_protein']=$this->mvalidasi->sumproteinharian($id_member);
			$data1['total_lemak']=$this->mvalidasi->sumlemakharian($id_member);
			$data1['total_kalori']=$this->mvalidasi->sumkaloriharian($id_member);
			// Panggil fungsi hitung_indeks_kecukupan_nutrisi
			$kekurangan_nutrisi = $this->mmember->hitung_indeks_kecukupan_nutrisi($id_member);
			$data1['pesan']=$kekurangan_nutrisi;

			require_once(APPPATH . 'libraries/dompdf/autoload.inc.php');
            $pdf = new Dompdf\Dompdf();

            $pdf->setPaper('a4', 'landscape');
            $pdf->set_option('isRemoteEnabled', TRUE);
            $pdf->set_option('isHtml5ParserEnabled', true);
            $pdf->set_option('isPhpEnabled', true);
            $pdf->set_option('isFontSubsettingEnabled', true);

            $pdf->loadHtml($this->load->view('member/cetaknutrisihr',$data1, true));
            $pdf->render();
            $pdf->stream('Nutrisi Harian Member', ['Attachment' => false]);

    	} 
}
?>