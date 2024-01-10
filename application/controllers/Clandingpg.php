<?php
	class Clandingpg extends CI_Controller
	{
		function tampil()
		{
			$this->load->model('martikel');

			// Ganti '=' dengan '=>' pada bagian assignment data1['admin']
			$data1['admin'] = $this->martikel->getartikel($this->session->userdata('id_admin'))->result_array();
		
			// Gabungkan data yang sudah ada dengan data1 menggunakan array_merge
			$data = array_merge(
				[
					'header' => 'artikel/header',
					'navbar' => 'artikel/navbar',
					'footer' => 'artikel/footer',
				],
				$data1
			);
		
			$this->load->view('artikel/index', $data);
		}

		function listartikel()
		{
			$data=[
				'headerblog' => 'artikel/headerblog',
				'navbarblog' => 'artikel/navbarblog',
				'footerblog' => 'artikel/footerblog'
				];
				$this->load->view('artikel/listartikel',$data);	
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

