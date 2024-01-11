<?php
class Mmember extends CI_Model
{
    function getprofilmember($id_member){
        return $this->db->get_where('tbmember',['id_member'=>$id_member]);
    }
    //get data dari member
    function getdatamember(){
        return $this->db->get('tbmember');
    }

    //profile
    function simpanprofile(){
        //getdatamember

        $member=$this->getprofilmember($this->session->userdata('id_member'))->row();
        //mengambil inputan user
        $data=array(
            'nama_lengkap'=>$this->input->post('nama_lengkap'),
            'username'=>$this->input->post('username'),
            'tgl_lahir'=>$this->input->post('tgl_lahir'),
            'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
            'email'=>$this->input->post('email')
        );
        
        if(!empty($_FILES['foto_member']['name'])){
            //unlink
            if(!empty($member->foto_member)){
                unlink('assets/imgadmin/'.$member->foto_member);
            }
            $config['upload_path']   = './assets/imgadmin/'; //tempat upload logonya nanti
            $config['allowed_types'] = 'jpg|png'; // esktesion yang diperbolehkan
            $config['max_size']      = 5048; // set ukuran menjadi 5mb

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto_member')) {
                $upload_data = $this->upload->data();
                $logo_path = 'assets/imgadmin/' . $upload_data['file_name'];
                $file_name = $upload_data['file_name'];
                $this->save_gambar($member->id_member,$file_name);
            } else {
                $error = $this->upload->display_errors();
                echo $error;
            }
        }
        $this->db->where('id_member',$this->input->post('id_member'));
        $this->db->update('tbmember',$data);
    }

    function save_gambar($id_member,$file_name){
        $this->db->where('id_member',$id_member);
        $this->db->update('tbmember',array('foto_member'=>$file_name));

    }

    // //simpan profile member
    // function simpandata()
    //     {
    //         //ambil data dari form 
    //         $data=$_POST;
    //         $id_member=$data['id_member'];

    //         $update=array(
    //             'id_member'=>$id_member
    //         );
    //         $this->db->where($update);
    //         $this->db->update('tbmember',$data);
    //         $sql="select * from tbmember where id_member='".$id_member."'";
    //         $query=$this->db->query($sql);
    //         if($query->num_rows()>0)
    //         {
    //         //session
    //             $data=$query->row();
    //             $array=array(
    //                 'id_member'=>$data['id_member'],
    //                 'nama_lengkap'=>$data['nama_lengkap'],
    //                 'username'=>$data['username'],
    //                 'email'=>$data['email'],
    //                 'jenis_kelamin'=>$data['jenis_kelamin'],
    //                 'password'=>$data['password'],
    //                 'tgl_lahir'=>$data['tgl_lahir'],
    //             );	
    //         $this->session->set_userdata($array);
    //         $this->session->set_flashdata('pesan','Data sudah diedit...');
    //         redirect('Cmember/profile','refresh');	
    //     } 
    // }

}
?>
