<?php
class Mauth extends CI_Model
{

//proseslogin
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
                        'nama_lengkap'=>$data['nama_lengkap'],
						'id_admin'=>$data['id_admin'],
						'email'=>$data['email'],
					];	
					$this->session->set_userdata($array);	
					redirect(base_url('cadmin/index'),'refresh');
			}else{
				$this->session->set_flashdata(['pesan'=>'password salah','color'=>'danger']);
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
						'nama_lengkap'=>$data1['nama_lengkap'],
						'id_member'=>$data1['id_member'],
						'email'=>$data1['email'],
					];	
					$this->session->set_userdata($array1);	
					redirect(base_url('cmember/index'),'refresh');
			}else{
				$this->session->set_flashdata(['pesan'=>'password salah','color'=>'danger']);
				redirect(base_url('auth/login'),'refresh');
			}
		}
       // If not found in tb_admin and tb_member
            else {
                $this->session->set_flashdata(['pesan' => 'Anda belum punya akun', 'color' => 'danger']);
               redirect(base_url('auth/login'), 'refresh');
            }
        }
    }

    //profile
    public function get_full_name($id_member) {
        $this->db->select('nama_lengkap');
        $this->db->where('id_member', $id_member);
        $query = $this->db->get('tbmember');

        if ($query->num_rows() > 0) {
            return $query->row()->$nama_lengkap;
        } else {
            return false;
        }
    }

    public function prosesregister()
    {
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
    function getdatamember(){
        return $this->db->get('tbmember')->result();
    }
}
?>
