<?php
	class Cadmin extends CI_Controller
	{
		public function __construct(){
			parent::__construct();
			$this->load->model(array('madmin','mmember','mvalidasi','mmakanan','martikel'));
			$this->mvalidasi->validasi();

		}
		public function index()
		{
			$data=[
			'header' => 'partials/header',
            'navbaradmin' => 'partials/navbaradmin',
            'sidebaradmin' => 'partials/sidebaradmin',
			'footer' => 'partials/footer',
			'total_makanan'=>$this->mmakanan->getmakanan()->num_rows(),
			'total_artikel'=>$this->martikel->getdataartikel()->num_rows(),
			'total_akunmember'=>$this->mmember->getdatamember()->num_rows()
			];

			$data['data_akunmember']=$this->mmember->getdatamember()->result();
			$this->load->view('admin/admin',$data);	
		}

		public function hapusmember($id_member){
			$this->madmin->hapusmember($id_member);
		}
		public function profileadmin()
        {
            $data=[
                'header' => 'partials/header',
                'navbaradmin' => 'partials/navbaradmin',
                'sidebaradmin' => 'partials/sidebaradmin',
                'footer' => 'partials/footer',
               'admin' => $this->madmin->getprofiladmin($this->session->userdata('id_admin'))->result_array()
            ];

            $this->load->view('auth/profileadmin',$data);
        }

		public function editprofileadmin(){
			$this->madmin->simpanprofile();
			redirect('cadmin/profileadmin');

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
			$data['data_makananform']=$this->mmakanan->getmakanan()->result();
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
			$data['data_artikel']=$this->martikel->getartikel()->result();
			$this->load->view('forms/tambahartikel',$data);
		}
	}
?>