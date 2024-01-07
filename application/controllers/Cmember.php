<?php
	class Cmember extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('mvalidasi');
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
			'total_kalori'=>$this->mvalidasi->sumkaloriharian($id_member),
			'total_karbohidrat'=>$this->mvalidasi->sumkarboharian($id_member),
			'total_protein'=>$this->mvalidasi->sumproteinharian($id_member),
			'total_lemak'=>$this->mvalidasi->sumlemakharian($id_member)
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisihr']=$this->mnutrisi->getnutrisihr();
			$this->load->view('member/index',$data);	
			
		}

//catatan nutrisi		
		public function catatnutrisi()
		{
			$this->load->model('mmakanan');
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer',
			'data_makanan'=>$this->mmakanan->get_makanan()
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisiform']=$this->mnutrisi->getnutrisi();
			$this->load->view('forms/catatnutrisi',$data);
		}
		public function tampilnutrisi()
		{
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer'
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisi']=$this->mnutrisi->getnutrisi();
			$this->load->view('tables/nutrisitbl',$data);
		}
		public function tampilnutrisiharian()
		{
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer'
			];
			$this->load->model('mnutrisi');
			$data['data_nutrisihr']=$this->mnutrisi->getnutrisihr();
			$this->load->view('tables/nutrisiharian',$data);
		}


//catatan aktivitas	
		public function catataktivitas()
		{
			$data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer'
			];
			$this->load->model('maktivitas');
			$data['data_aktivitasform']=$this->maktivitas->getaktivitas();
			$this->load->view('forms/catataktivitas',$data);
		}
		public function tampilaktivitas()
		{
			$data=[
				'header' => 'partials/header',
				'navbar' => 'partials/navbar',
				'sidebar' => 'partials/sidebar',
				'footer' => 'partials/footer'
			];
			$this->load->model('maktivitas');
			$data['data_aktivitas']=$this->maktivitas->getaktivitas();
			$this->load->view('tables/aktivitastbl',$data);
		}
	}
?>