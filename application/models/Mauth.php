<?php
class Mauth extends CI_Model
{
    // proseslogin
    function proseslogin()
    {
        // ambil data dari form 
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Check in tb_admin (assuming 'username' is the field for admin identification)
        $query = $this->db->get_where('tbadmin', ['email' => $email]);
        if ($query->num_rows() > 0) {
            $data = $query->row_array();
            if (password_verify($password, $data['password'])) {
                $array = [
                    'nama_lengkap' => $data['nama_lengkap'],
                    'id_admin' => $data['id_admin'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                ];

                // Tidak perlu memeriksa status verifikasi sebelum login
                $this->session->set_userdata($array);
                redirect(base_url('cadmin/index'), 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Gagal Login');
                redirect(base_url('auth/login'), 'refresh');
            }
        }

        // Check in tb_member
        else {
            $query1 = $this->db->get_where('tbmember', ['email' => $email]);
            if ($query1->num_rows() > 0) {
                $data1 = $query1->row_array();
                if (password_verify($password, $data1['password'])) {
                    $array1 = [
                        'nama_lengkap' => $data1['nama_lengkap'],
                        'username' => $data1['username'],
                        'id_member' => $data1['id_member'],
                        'email' => $data1['email'],
                        'jenis_kelamin' => $data1['jenis_kelamin'],
                        'password' => $data1['password'],
                        'tgl_lahir' => $data1['tgl_lahir'],
                    ];

                    // Periksa status verifikasi sebelum login
                    if ($data1['is_verified'] == 1) {
                        $this->session->set_userdata($array1);
                        redirect(base_url('cmember/index'), 'refresh');
                    } else {
                        $this->session->set_flashdata(['pesan' => 'Akun anda belum terverifikasi!', 'color' => 'danger']);
                        redirect(base_url('auth/login'), 'refresh');
                    }
                } else {
                    $this->session->set_flashdata(['pesan' => 'Password salah', 'color' => 'danger']);
                    redirect(base_url('auth/login'), 'refresh');
                }
            }
            // If not found in tb_admin and tb_member
            else {
                $this->session->set_flashdata(['pesan' => 'Akun anda belum terdaftar, silahkan daftar!', 'color' => 'danger']);
                redirect(base_url('auth/login'), 'refresh');
            }
        }
    }

    public function change_password($id_member, $current_password, $new_password, $re_password)
    {
        // Ambil password dari database berdasarkan id_member
        $this->db->where('id_member', $id_member);
        $query = $this->db->get('tbmember');
        $user = $query->row();

        // Verifikasi password lama
        if (password_verify($current_password, $user->password)) {
            // Hash password baru
            if($new_password==$re_password){
                $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Simpan password baru ke database
                $this->db->where('id_member', $id_member);
                $this->db->update('tbmember', ['password' => $hashed_new_password]);
                $this->session->set_flashdata('pesan','Password berhasil diperbarui');
            }
            else{
                $this->session->set_flashdata('error','Password tidak sama!');
            }
        }
        else{
            $this->session->set_flashdata('error','Password salah');
        }
    }

    public function prosesregister()
    {
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->config('email'); // Load konfigurasi email dari file email.php

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('berat_badan', 'Berat Badan', 'required');
        $this->form_validation->set_rules('tinggi_badan', 'Tinggi Badan', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Password too short!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->RegisterError(validation_errors());
        } else {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'berat_badan' => $this->input->post('berat_badan'),
                'tinggi_badan' => $this->input->post('tinggi_badan'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            ];

            // Generate token verifikasi
            $verification_token = bin2hex(random_bytes(16));

            $data += [  // Menambahkan data verifikasi ke dalam $data
                'verification_token' => $verification_token,
                'is_verified' => 0, // Set status verifikasi sebagai belum diverifikasi
            ];

            $this->db->insert('tbmember', $data);

            // Kirim email verifikasi
            $this->sendVerificationEmail($data['email'], $verification_token);

            $this->session->set_flashdata(['pesan' => 'Berhasil Register. Silahkan verifikasi email Anda!', 'color' => 'success']);
            redirect(base_url('auth/register'), 'refresh');
        }
    }

    private function RegisterError($message)
    {
        $this->session->set_flashdata(['pesan' => $message, 'color' => 'danger']);
        redirect(base_url('auth/register'), 'refresh');
    }

    public function sendVerificationEmail($email, $token)
    {
        // Dapatkan nilai konfigurasi email
        $smtp_host = $this->config->item('smtp_host');
        $smtp_port = $this->config->item('smtp_port');
        $smtp_user = $this->config->item('smtp_user');
        $smtp_pass = $this->config->item('smtp_pass');
        $smtp_timeout = $this->config->item('smtp_timeout');
        $charset = $this->config->item('charset');
        $newline = $this->config->item('newline');
        $mailtype = $this->config->item('mailtype');
        $validation = $this->config->item('validation');

        // Set nilai konfigurasi untuk pengiriman email
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = $smtp_host;
        $config['smtp_port'] = $smtp_port;
        $config['smtp_user'] = $smtp_user;
        $config['smtp_pass'] = $smtp_pass;
        $config['smtp_timeout'] = $smtp_timeout;
        $config['charset'] = $charset;
        $config['newline'] = $newline;
        $config['mailtype'] = $mailtype;
        $config['validation'] = $validation;

        $this->email->initialize($config);
        $this->email->set_mailtype("html");

        $subject = 'Verifikasi Email';
        $message = "Silakan klik link berikut untuk verifikasi email Anda: <a href='" . base_url('auth/verify/') . urlencode($token) . "' style='display:inline-block; padding:10px 20px; background-color:#3498db; color:#000000; text-decoration:none; border-radius:5px;'>Verifikasi Email</a>";

        $this->email->from($smtp_user, 'NutriTrack');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            echo 'Email terkirim';
        } else {
            echo 'Email gagal terkirim';
        }
    }

        public function forgot_password($email)
        {
            $member = $this->db->get_where('tbmember', ['email' => $email])->row_array();

            if ($member) {
                $token = bin2hex(random_bytes(32)); // Menggunakan format hex untuk token

                $this->db->set('reset_token', $token);
                $this->db->where('id_member', $member['id_member']);
                $this->db->update('tbmember');

                $this->send_reset_password_email($member['email'], $token);

                return true;
            } else {
                return false;
            }
        }

        private function send_reset_password_email($email, $token)
        {
            $subject = 'Reset Password';
            $reset_link = base_url('auth/reset_password/') . urlencode($token);
            $message = "Klik link berikut untuk mereset password Anda: <a href='$reset_link' style='display:inline-block; padding:10px 20px; background-color:#3498db; color:#000000; text-decoration:none; border-radius:5px;'>Reset Password</a>";

            $this->load->library('email');
            $this->email->from('nutritrackofficial@gmail.com', 'NutriTrack');
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($message);

            if ($this->email->send()) {
                return true;
            } else {
                // Tampilkan pesan debug jika pengiriman email gagal
                echo $this->email->print_debugger();
                return false;
            }
        }

        public function reset_password($token, $new_password, $confirm_password)
        {
            $member = $this->db->get_where('tbmember', ['reset_token' => $token])->row_array();

            if ($member) {
                if ($new_password == $confirm_password) {
                    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $hashed_new_password);
                    $this->db->set('reset_token', null);
                    $this->db->where('id_member', $member['id_member']);
                    $this->db->update('tbmember');

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }




    // public function check_session()
    // {
    //     if ($this->session->userdata('id_admin')) {
    //         // Admin masih memiliki sesi, arahkan ke halaman admin
    //         redirect(base_url('cadmin/index'), 'refresh');
    //     } elseif ($this->session->userdata('id_member')) {
    //         // Member masih memiliki sesi, arahkan ke halaman member
    //         redirect(base_url('cmember/index'), 'refresh');
    //     } else {
    //         // Tidak ada sesi, lanjutkan ke halaman login
    //         redirect(base_url('auth/login'), 'refresh');
    //     }
    // }


    // function getdataadmin(){
    //     return $this->db->get('tbadmin')->result();
    // }
}
?>