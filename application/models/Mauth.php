<?php
class Mauth extends CI_Model
{
function proseslogin()
    {
        //ambil data dari form 
        $email = $this->input->post('email');
        $password = $this->input->post('password');
    
        // Check in tb_admin (assuming 'username' is the field for admin identification)
        $query=$this->db->get_where('tbadmin',['email'=> $email]);
		if($query->num_rows()>0){
			$data = $query->row_array();
			if(password_verify($password,$data['password'])){
					$array=[
						'id_admin'=>$data['id_admin'],
						'email'=>$data['email'],
					];	
					$this->session->set_userdata($array);	
					redirect(base_url('cadmin/index'),'refresh');
			}else{
				$this->session->set_flashdata(['pesan'=>'Password salah','color'=>'danger']);
				redirect(base_url('auth/login'),'refresh'); 
			}
		}
    
        // Check in tb_member
        else {
            $query1=$this->db->get_where('tbmember',['email'=> $email]);
		if($query1->num_rows()>0){
			$data1 = $query1->row_array();
			if(password_verify($password,$data1['password'])){
					$array1=[
						'id_member'=>$data1['id_member'],
						'email'=>$data1['email'],
					];	
					$this->session->set_userdata($array1);	
					redirect(base_url('cmember/index'),'refresh');
			}else{
				$this->session->set_flashdata(['pesan'=>'Password salah','color'=>'danger']);
				redirect(base_url('auth/login'),'refresh');
			}
		}
       // If not found in tb_admin and tb_member
            else {
                $this->session->set_flashdata(['pesan' => 'Akun anda belum terdaftar, silahkan daftar!', 'color' => 'danger']);
                redirect(base_url('auth/login'), 'refresh');
            }
        }
    }

    public function prosesregister()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password too short!']);

        if ($this->form_validation->run() == FALSE) {
            $this->RegisterError(validation_errors());
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            $this->db->insert('tbmember', $data);

            $this->session->set_flashdata(['pesan' => 'Berhasil Register...', 'color' => 'success']);
            redirect(base_url('auth/register'), 'refresh');
        }
    }
        private function RegisterError($message)
            {
                $this->session->set_flashdata(['pesan' => $message, 'color' => 'danger']);
                redirect(base_url('auth/register'), 'refresh');
            }
}
?>