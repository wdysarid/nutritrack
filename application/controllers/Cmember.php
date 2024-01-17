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
				//getdatamember
		
				$member=$this->mmember->getprofilmember($this->session->userdata('id_member'))->row();
		
				if (!empty($_FILES['foto_member']['name'])) {
		
					// melakukan penghapusan gambar sebelumnya dari path agar lebih hemat :)
					if(!empty($member->foto_member)){
						unlink('assets/imgmember/' .$member->foto_member);
					}
		
					// Config untuk upload file berupa foto
					$config['upload_path']   = './assets/imgmember'; //tempat upload logonya nanti
					$config['allowed_types'] = 'jpg|png'; // esktesion yang diperbolehkan
					$config['max_size']      = 2048; // set ukuran menjadi 5mb

			
					$this->load->library('upload', $config); 
			
					//jika file gambar diupload
					if ($this->upload->do_upload('foto_member')) {
						// upload
						$upload_data = $this->upload->data();
						// lalu simpan pada path
						$logo_path = 'assets/imgmember/'.$upload_data['file_name'];
		
						$file_name = $upload_data['file_name'];
			
						// menyimpan logo ke database
						$this->mmember->save_gambar($member->id_member, $file_name);
		
					} else {
						// mengatasi jika error
						$error = $this->upload->display_errors();
						$this->session->set_flashdata('error', $error);
						// echo $error;
						redirect('cmember/profilemember');
					}
				}

			//mengambil inputan user
			$nama=$this->input->post('nama_lengkap');
			$user=$this->input->post('username');
			$tgl=$this->input->post('tgl_lahir');
			$jk=$this->input->post('jenis_kelamin');
			$bb=$this->input->post('berat_badan');
			$tb=$this->input->post('tinggi_badan');
			$email=$this->input->post('email');

			$this->mmember->simpanprofile($nama, $user, $tgl, $jk, $bb, $tb, $email, $member->id_member);
			$this->session->set_flashdata('pesan', $error);
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