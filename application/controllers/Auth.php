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

    public function verify($token)
    {
        // Ambil data member berdasarkan token
        $member = $this->db->get_where('tbmember', ['verification_token' => $token])->row_array();

        if ($member) {
            // Ubah status verifikasi menjadi 1 (sudah diverifikasi)
            $this->db->set('is_verified', 1);
            $this->db->where('id_member', $member['id_member']);
            $this->db->update('tbmember');

            $this->session->set_flashdata(['pesan' => 'Verifikasi email berhasil! Silahkan login.', 'color' => 'success']);
            redirect(base_url('auth/login'), 'refresh');
        } else {
            $this->session->set_flashdata(['pesan' => 'Verifikasi email gagal. Token tidak valid.', 'color' => 'danger']);
            redirect(base_url('auth/login'), 'refresh');
        }
    }

    public function lupaPassword()
    {

    }
    

    //test
    public function change_password()
    {
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_member = $this->session->userdata('id_member');
            $current_password = $this->input->post('password');
            $new_password = $this->input->post('newpassword');
            $re_password = $this->input->post('renewpassword');

            // Panggil model untuk mengubah password
                $this->mauth->change_password($id_member, $current_password, $new_password,$re_password);
                redirect('cmember/profilemember');
        }
    }


    //logout
    public function logout()
    {
        session_destroy();
        redirect('auth/login');
    }
}
?>