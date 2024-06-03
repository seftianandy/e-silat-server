<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TombolModel extends CI_Model {
    public function getData($tabel){
        $data = $this->db->get($tabel);
        return $data->result();
    }

    public function updateData($tabel, $data, $where){
        $data = $this->db->update($tabel, $data, $where);
        return $data;
    }
}
