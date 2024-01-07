
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// application/models/Artikel_model.php

class Artikel_model extends CI_Model {

    public function get_artikel_list() {
        return $this->db->get('tbartikel')->result();
    }

    public function tambah_artikel($data) {
        // Logika untuk menyimpan artikel ke database
        $this->db->insert('tbartikel', $data);
    }

    public function get_artikel_by_id($id) {
        return $this->db->get_where('tbartikel', array('id' => $id))->row();
    }
}
