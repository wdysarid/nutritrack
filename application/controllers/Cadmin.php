<?php
	class Cadmin extends CI_Controller
	{
		public function __construct()
         {
             parent::__construct();
             $this->load->model('mvalidasi');
             $this->mvalidasi->validasi();
		}
		public function index()
		{
			// $data['admin'] = $this->db->get_where('tbadmin', ['email' => $this->session->userdata('email')])->row_array();
			$data=[
			'header' => 'partials/header',
            'navbaradmin' => 'partials/navbaradmin',
            'sidebaradmin' => 'partials/sidebaradmin',
			'footer' => 'partials/footer'
			];
			$this->load->view('admin/admin',$data);	
		}

		public function tambahmakanan()
		{
			$data=[
			'header' => 'partials/header',
            'navbaradmin' => 'partials/navbaradmin',
            'sidebaradmin' => 'partials/sidebaradmin',
			'footer' => 'partials/footer'
			];
			$this->load->model('mmakanan');
			$data['data_makananform']=$this->mmakanan->getmakanan();
			$this->load->view('forms/tambahmakanan',$data);
		}
		public function dataakunmember()
		{
			$data=[
				'header' => 'partials/header',
				'navbaradmin' => 'partials/navbaradmin',
				'sidebaradmin' => 'partials/sidebaradmin',
				'footer' => 'partials/footer'
			];
			$this->load->model('mauth');
			$data['data_akunmember']=$this->mauth->getdatamember();
			$this->load->view('tables/datamember',$data);
		}
	}
?>