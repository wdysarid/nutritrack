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

        function sumkaloriharian($id_member){
            $this->db->select('SUM(total_kalori) as Total_Kalori');
            $this->db->from('nutrisiharian');
            $this->db->where(
                array(
                    'id_member' => $id_member,
                    'tgl_catatan' => date('Y-m-d') // Menggunakan format 'Y-m-d' untuk sesuaikan dengan format tanggal di database
                )
            );
            return $this->db->get()->row()->Total_Kalori;
        }

        function sumkarboharian($id_member){
            $this->db->select('SUM(total_karbohidrat) as Total_Karbohidrat');
            $this->db->from('nutrisiharian');
            $this->db->where(
                array(
                    'id_member' => $id_member,
                    'tgl_catatan' => date('Y-m-d') // Menggunakan format 'Y-m-d' untuk sesuaikan dengan format tanggal di database
                )
            );
            return $this->db->get()->row()->Total_Karbohidrat;
        }

        function sumproteinharian($id_member){
            $this->db->select('SUM(total_protein) as Total_Protein');
            $this->db->from('nutrisiharian');
            $this->db->where(
                array(
                    'id_member' => $id_member,
                    'tgl_catatan' => date('Y-m-d') // Menggunakan format 'Y-m-d' untuk sesuaikan dengan format tanggal di database
                )
            );
            return $this->db->get()->row()->Total_Protein;
        }

        function sumlemakharian($id_member){
            $this->db->select('SUM(total_lemak) as Total_Lemak');
            $this->db->from('nutrisiharian');
            $this->db->where(
                array(
                    'id_member' => $id_member,
                    'tgl_catatan' => date('Y-m-d') // Menggunakan format 'Y-m-d' untuk sesuaikan dengan format tanggal di database
                )
            );
            return $this->db->get()->row()->Total_Lemak;
        }


    }