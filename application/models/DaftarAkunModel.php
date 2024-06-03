<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DaftarAkunModel extends CI_Model {
    public function getData($tabel){
        $data = $this->db->get($tabel);
        return $data->result();
    }
}
