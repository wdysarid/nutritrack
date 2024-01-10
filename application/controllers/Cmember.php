<?php
	class Cmember extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model(array('madmin','mmember','mvalidasi','mmakanan','mnutrisi','maktivitas'));
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
			'total_kalori'=>$this->mvalidasi->sumkaloriharian($id_member),
			'total_karbohidrat'=>$this->mvalidasi->sumkarboharian($id_member),
			'total_protein'=>$this->mvalidasi->sumproteinharian($id_member),
			'total_lemak'=>$this->mvalidasi->sumlemakharian($id_member)
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
			$user=$this->session->userdata('id_member');
			$this->load->model('mmakanan');
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer',
			'data_makanan'=>$this->mmakanan->getmakanan()->result()
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisiform']=$this->mnutrisi->getnutrisi($user)->result();
			$this->load->view('forms/catatnutrisi',$data);
		}

		public function tampilnutrisi()
		{
			$user=$this->session->userdata('id_member');
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer'
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisi']=$this->mnutrisi->getnutrisi($user)->result();
			$this->load->view('tables/nutrisitbl',$data);
		}

		public function tampilnutrisiharian()
		{
			$user=$this->session->userdata('id_member');
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer'
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisihr']=$this->mnutrisi->getnutrisi($user)->result();
			$this->load->view('tables/nutrisiharian',$data);
		}


//catatan aktivitas	
		public function catataktivitas()
		{
			$user=$this->session->userdata('id_member');
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer'
			];
			$this->load->model('maktivitas');
			$data['data_aktivitasform']=$this->maktivitas->getaktivitas($user)->result();
			$this->load->view('forms/catataktivitas',$data);
		}
		public function tampilaktivitas()
		{$user=$this->session->userdata('id_member');
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer'
			];
			$this->load->model('maktivitas');
			$data['data_aktivitas']=$this->maktivitas->getaktivitas($user)->result();
			$this->load->view('tables/aktivitastbl',$data);
		}
	}
?>