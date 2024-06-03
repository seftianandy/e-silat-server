<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesertaModel extends CI_Model {
    public function getData(){
        $query = $this->db->query('SELECT atlit.*, tim.tim FROM atlit INNER JOIN tim ON tim.id = atlit.tim_id');
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function simpanData($tabel, $data){
        $data = $this->db->insert($tabel, $data);
		return $data;
    }

    public function getWhere($tabel, $tim, $id){
        $data = $this->db->get_where($tabel, array('tim_id'=>$tim, 'no' => $id));
        return $data->result();
    }

	public function updateData($tabel, $data, $where)
	{
		$data = $this->db->update($tabel, $data, $where);
		return $data;
	}


    public function truncate($tabel){
        $data = $this->db->query('TRUNCATE TABLE '.$tabel);
        return $data;
    }
}
