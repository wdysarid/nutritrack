<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mauth');
    }

    public function login()
    {
        $data=[
			'header' => 'partials/header',
			'footer' => 'partials/footer'
		];
        $this->load->view('auth/login',$data);
    }

    public function proseslogin()
    {
        $this->mauth->proseslogin();
    }

    public function profile() {
        // Make sure the user is logged in
    $this->mauth->login();

        // Get the user ID from the session
    $id_member = $this->session->userdata('id_member');

        // Load the m auth
        $this->load->model('mauth');

        // Fetch the full name from the database
        $data['nama_lengkap'] = $this->mauth->get_full_name($id_member);

        // Load your profile view with the full name data
        $this->load->view('profile', $data);
    }

    public function register()
    {
        $data=[
			'header' => 'partials/header',
			'footer' => 'partials/footer'
		];
        $this->load->view('auth/register',$data);
    }

    public function prosesregister()
    {
        $this->mauth->prosesregister();
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth/login'), 'refresh');
    }
}

?>