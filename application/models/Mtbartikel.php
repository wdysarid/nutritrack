<?php
class Mtartikel extends CI_Model {

    public function tambah_artikel($data) {
        return $this->db->insert('tbartikel', $data);
    }

    public function get_artikel_list() {
        $query = $this->db->get('tbartikel');
        return $query->result();
    }

    // Metode lain sesuai kebutuhan

}

?>


