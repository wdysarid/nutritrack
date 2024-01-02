<?php
    class User_model extends CI_Model{
        private $table ="tb_user";

        public function insert($payload)
        {
            return $this->db->insert($this->table,$payload);
        }

    }
?>