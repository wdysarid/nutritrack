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
			$data=[
				'headerblog' => 'artikel/headerblog',
				'navbarblog' => 'artikel/navbarblog',
				'footerblog' => 'artikel/footerblog'
				];
				$this->load->view('artikel/blog',$data);	
		}

		function blog2()
		{
			$data=[
				'headerblog' => 'artikel/headerblog',
				'navbarblog' => 'artikel/navbarblog',
				'footerblog' => 'artikel/footerblog'
				];
				$this->load->view('artikel/blog2',$data);	
		}

		function blog3()
		{
			$data=[
				'headerblog' => 'artikel/headerblog',
				'navbarblog' => 'artikel/navbarblog',
				'footerblog' => 'artikel/footerblog'
				];
				$this->load->view('artikel/blog3',$data);	
		}


	}
	
?>

