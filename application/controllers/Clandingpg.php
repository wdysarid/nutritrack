<?php
	class Clandingpg extends CI_Controller
	{
		function tampil()
		{
			$data=[
			'header' => 'artikel/header',
			'navbar' => 'artikel/navbar',
			'footer' => 'artikel/footer'
			];
			$this->load->view('artikel/landingpage',$data);	
		}
		
		function artikel1()
		{
			$this->load->view('artikel/artikel1');
		}

		function artikel2()
		{
			$this->load->view('artikel/artikel2');
		}
		function artikel3()
		{
			$this->load->view('artikel/artikel3');
		}


	}
	
?>