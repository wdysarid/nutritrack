<?php
	class Cadmin extends CI_Controller
	{
		public function __construct()
         {
             parent::__construct();
             $this->load->model('mvalidasi');
			 $this->load->model('mmakanan');
			 $this->load->model('mauth');
			 $this->load->model('martikel');
			 $this->load->helper(array('form', 'url'));
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

		//makanan
		public function tambahmakanan()
		{
			$data=[
			'header' => 'partials/header',
            'navbaradmin' => 'partials/navbaradmin',
            'sidebaradmin' => 'partials/sidebaradmin',
			'footer' => 'partials/footer'
			];
			$data['data_makananform']=$this->mmakanan->getmakanan();
			$this->load->view('forms/tambahmakanan',$data);
		}

		//artikel
		public function tambahartikel()
		{
			$data=[
			'header' => 'partials/header',
            'navbaradmin' => 'partials/navbaradmin',
            'sidebaradmin' => 'partials/sidebaradmin',
			'footer' => 'partials/footer'
			];
			$data['data_artikel']=$this->martikel->getartikel();
			$this->load->view('forms/tambahartikel',$data);
		}

		public function dataakunmember()
		{
			$data=[
				'header' => 'partials/header',
				'navbaradmin' => 'partials/navbaradmin',
				'sidebaradmin' => 'partials/sidebaradmin',
				'footer' => 'partials/footer'
			];
			$data['data_akunmember']=$this->mauth->getdatamember();
			$this->load->view('tables/datamember',$data);
		}
	}
?>