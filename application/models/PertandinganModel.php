<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PertandinganModel extends CI_Model {
    public function getData(){
        $data = $this->db->query("SELECT
                                    partai.*,
                                    atlit_biru.nama AS nama_atlit_biru,
                                    atlit_merah.nama AS nama_atlit_merah,
                                    atlit_biru.kontingen AS kontingen_atlit_biru,
                                    atlit_merah.kontingen AS kontingen_atlit_merah,
                                    ronde.id AS ronde_id,
                                    ronde.ronde,
                                    ronde.status_ronde,
                                    ronde.waktu_pertandingan,
                                    arena.arena 
                                FROM
                                    partai
                                    JOIN atlit AS atlit_biru ON partai.tim_biru_id = atlit_biru.id
                                    JOIN atlit AS atlit_merah ON partai.tim_merah_id = atlit_merah.id
                                    JOIN ronde ON ronde.partai_id = partai.id
                                    JOIN arena ON ronde.arena_id = arena.id
                                    GROUP BY partai.partai
        ");
        return $data->result();
    }

    public function getWhere($tabel, $id){
        $data = $this->db->get_where($tabel, array('partai_id' => $id));
        return $data->result();
    }
}
