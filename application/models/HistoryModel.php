<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HistoryModel extends CI_Model {
    public function getData($partai_id){
        $data = $this->db->query("SELECT
                                    r.ronde,
                                    u.nama AS nama_users,
                                    a.nama AS nama_atlit,
                                    n.nilai_hitung,
                                    n.jenis,
                                    p.status,
                                    p.insert_time AS time
                                FROM
                                    log p
                                    JOIN ronde r ON p.ronde_id = r.id
                                    JOIN users u ON p.users_id = u.id
                                    JOIN atlit a ON p.atlit_id = a.id
                                    JOIN nilai n ON p.nilai_id = n.id 
                                WHERE
                                    r.partai_id = ".$partai_id."
                                ORDER BY p.insert_time
                                ASC
        ");
        return $data->result();
    }
}
