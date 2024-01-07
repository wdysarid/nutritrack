<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mauth');
        $this->load->model('mmember');
        $this->load->model('madmin');
       
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
    
    public function profile()
    {
        $data=[
           $this->mmember->getprofilmember($this->session->userdata('id_member')),
        ];
        $data=[
			'header' => 'partials/header',
            'navbar' => 'partials/navbar',
            'sidebar' => 'partials/sidebar',
			'footer' => 'partials/footer',

            
		];
        $this->load->view('auth/profile',$data);
    }

    public function profileadmin()
    {
        $data=[
           $this->madmin->getprofiladmin($this->session->userdata('id_admin')),
        ];
        $data=[
			'header' => 'partials/header',
            'navbaradmin' => 'partials/navbaradmin',
            'sidebaradmin' => 'partials/sidebaradmin',
			'footer' => 'partials/footer',     
		];
        
        $this->load->view('auth/profileadmin',$data);
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