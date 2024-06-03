<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VoteModel extends CI_Model {
    public function getData($id){
        $data = $this->db->query("SELECT
                                    *
                                FROM
                                    vote
                                WHERE
                                    id = ".$id."
                                    AND ( juri_1 = 'y' AND juri_2 = 'y' )
                                    OR id = ".$id."
                                    AND( juri_1 = 'y' AND juri_3 = 'y' )
                                    OR id = ".$id."
                                    AND ( juri_2 = 'y' AND juri_3 = 'y' );
        ");
        return $data->result();
    }

    public function getDataVoteDewan(){
        $data = $this->db->query("SELECT
                                    *
                                FROM
                                    vote
                                ORDER BY
                                    id DESC
                                    LIMIT 1
        ");
        return $data->result();
    }

    public function getDataVoteJuri($juri){
        $data = $this->db->query("SELECT *
                                FROM vote
                                WHERE ".$juri." IS NULL
                                ORDER BY id DESC
                                LIMIT 1;
        ");
        return $data->result();
    }

    public function getDataVoteSkor(){
        $data = $this->db->query("SELECT
                                        *,

	                                    COALESCE(SUM(id), 0) AS id_sum
                                    FROM
                                        vote
                                    WHERE
                                        STATUS = 'open'
                                    ORDER BY
                                        id DESC
                                        LIMIT 1;
        ");
        return $data->result();
    }

    public function updateDataVoteJuri($tabel, $data, $where){
        $data = $this->db->update($tabel, $data, $where);
        return $data;
    }
}
