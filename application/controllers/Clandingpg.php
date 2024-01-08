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
			$this->load->view('artikel/index',$data);	
		}
		
		function blog()
		{
			$this->load->view('artikel/blog');
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