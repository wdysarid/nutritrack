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


		function cetaknutrisihr($id_member,$id_nutrisi)
        {
            $data1['data_nutrisihr']=$this->mnutrisi->getnutrisi($id_member,$id_nutrisi);
            $pdf = new Dompdf\Dompdf();

            $pdf->setPaper('a4', 'portrait');
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