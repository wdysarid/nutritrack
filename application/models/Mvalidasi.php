<?php
    class Mvalidasi extends CI_Model{
        function validasi()
        {
            if (empty($this->session->userdata('id_member')))
            {
                if(empty($this->session->userdata('id_admin'))){
                    echo "<script>alert ('Anda tidak dapat mengakses halaman ini..!');</script>";
                    redirect('auth/login','refresh');
            }
            } 
        }

    }