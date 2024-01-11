<?php
	class Cmember extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model(array('madmin','mmember','mvalidasi','mmakanan','mnutrisi','maktivitas'));
			$this->mvalidasi->validasi();
	   }
		public function index()
		{
			//get id member
			$id_member=$this->session->userdata('id_member');
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer',
			
			'total_karbohidrat'=>$this->mvalidasi->sumkarboharian($id_member),
			'total_protein'=>$this->mvalidasi->sumproteinharian($id_member),
			'total_lemak'=>$this->mvalidasi->sumlemakharian($id_member),
			'total_kalori'=>$this->mvalidasi->sumkaloriharian($id_member),
			'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
			];
			$data['data_nutrisihr']=$this->mnutrisi->getnutrisihrn($id_member)->result_array();
			$data['data_aktivitashr']=$this->maktivitas->getaktivitashrn($id_member)->result_array();
			$this->load->view('member/index',$data);	
			
		}

		public function profilemember()
        {
            $data=[
                'header' => 'partials/header',
                'navbar' => 'partials/navbar',
                'sidebar' => 'partials/sidebar',
                'footer' => 'partials/footer',
               'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
            ];

            $this->load->view('auth/profilemember',$data);
        }

		public function editprofilemember(){
			$this->mmember->simpanprofile();
			redirect('cmember/profilemember');

		}

//catatan nutrisi		
		public function catatnutrisi()
		{	
			$id_member=$this->session->userdata('id_member');
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer',
			'data_makanan'=>$this->mmakanan->getmakanan()->result(),
			'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
			];
			$data['data_nutrisiform']=$this->mnutrisi->getnutrisi($id_member)->result();
			$this->load->view('forms/catatnutrisi',$data);
		}

		public function tampilnutrisi()
		{
			$id_member=$this->session->userdata('id_member');
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer',
				'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
			];
			
			$data['data_nutrisi']=$this->mnutrisi->getnutrisi($id_member)->result();
			$this->load->view('tables/nutrisitbl',$data);
		}

		public function tampilnutrisiharian()
		{
			$id_member=$this->session->userdata('id_member');
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer',
				'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
			];
			
			$data['data_nutrisihr']=$this->mnutrisi->getnutrisi($id_member)->result();
			$this->load->view('tables/nutrisiharian',$data);
		}


//catatan aktivitas	
		public function catataktivitas()
		{
			$id_member=$this->session->userdata('id_member');
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer',
			'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
			];
			
			$data['data_aktivitasform']=$this->maktivitas->getaktivitas($id_member)->result();
			$this->load->view('forms/catataktivitas',$data);
		}
		public function tampilaktivitas()
		{
			$id_member=$this->session->userdata('id_member');
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer',
				'member' => $this->mmember->getprofilmember($this->session->userdata('id_member'))->result_array()
			];
			
			$data['data_aktivitas']=$this->maktivitas->getaktivitas($id_member)->result();
			$this->load->view('tables/aktivitastbl',$data);
		}
	}
?>