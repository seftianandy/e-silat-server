<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NilaiDewanModel extends CI_Model {
    public function getData($tabel){
        $data = $this->db->get($tabel);
        return $data->result();
    }

    public function getDataPenjurian($partai_id, $ronde_id){
        $data = $this->db->query('SELECT
                                    partai.*,
                                    atlit_biru.nama AS nama_atlit_biru,
                                    atlit_biru.kontingen AS kontingen_biru,
                                    atlit_merah.kontingen AS kontingen_merah,
                                    atlit_merah.nama AS nama_atlit_merah,
                                    status_pertandingan,
                                    arena.arena,
                                    ronde.status_ronde 

                                FROM
                                    partai
                                    JOIN atlit AS atlit_biru ON partai.tim_biru_id = atlit_biru.id
                                    JOIN atlit AS atlit_merah ON partai.tim_merah_id = atlit_merah.id
                                    JOIN ronde ON ronde.partai_id = partai.id
                                    JOIN arena ON ronde.arena_id = arena.id 
                                WHERE
                                    partai_id = "'.$partai_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                GROUP BY
                                    partai.id
        ');
        return $data->result();
    }

    public function getDataPertandinganSelesai($id) {
        $this->db->where('id', $id);
        $this->db->update('partai', array('status_pertandingan' => '1'));

         return $this->db->affected_rows() > 0;
    }

    public function getRonde($partai_id){
        $data = $this->db->query('SELECT
                                    ronde.id AS ronde_id,
                                    ronde.ronde,
                                    ronde.status_ronde
                                FROM
                                    partai
                                    JOIN ronde ON ronde.partai_id = partai.id
                                WHERE
                                    partai_id="'.$partai_id.'"
        ');
        return $data->result();
    }

    public function getPeringatan($atlit_id, $ronde_id, $users_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    penilaian.id,
                                    ronde.ronde,
                                    users.nama AS nama_user,
                                    atlit.nama AS nama_atlit,
                                    SUM( nilai.nilai ) AS nilai
                                FROM
                                    penilaian
                                    JOIN ronde ON penilaian.ronde_id = ronde.id
                                    JOIN users ON penilaian.users_id = users.id
                                    JOIN atlit ON penilaian.atlit_id = atlit.id
                                    JOIN nilai ON penilaian.nilai_id = nilai.id
                                    JOIN partai ON ronde.partai_id = partai.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND users.id = "'.$users_id.'"
                                    AND penilaian.nilai_id = "'.$nilai_id.'"
                                GROUP BY
                                    atlit.id
        ');
        return $data->result();
    }

    public function getJatuhan($atlit_id, $ronde_id, $users_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    penilaian.id,
                                    ronde.ronde,
                                    users.nama AS nama_user,
                                    atlit.nama AS nama_atlit,
                                    GROUP_CONCAT( nilai.nilai SEPARATOR " " ) AS nilai
                                FROM
                                    penilaian
                                    JOIN ronde ON penilaian.ronde_id = ronde.id
                                    JOIN users ON penilaian.users_id = users.id
                                    JOIN atlit ON penilaian.atlit_id = atlit.id
                                    JOIN nilai ON penilaian.nilai_id = nilai.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND users.id = "'.$users_id.'"
                                    AND penilaian.nilai_id = "'.$nilai_id.'"
                                GROUP BY
                                    atlit.id
        ');
        return $data->result();
    }

    public function getTeguran($atlit_id, $ronde_id, $users_id, $nilai_id, $nilai2_id){
        $data = $this->db->query('SELECT
                                    penilaian.id,
                                    ronde.ronde,
                                    users.nama AS nama_user,
                                    atlit.nama AS nama_atlit,
                                    GROUP_CONCAT( nilai.nilai_hitung SEPARATOR " " ) AS nilai
                                FROM
                                    penilaian
                                    JOIN ronde ON penilaian.ronde_id = ronde.id
                                    JOIN users ON penilaian.users_id = users.id
                                    JOIN atlit ON penilaian.atlit_id = atlit.id
                                    JOIN nilai ON penilaian.nilai_id = nilai.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND users.id = "'.$users_id.'"
                                    AND penilaian.nilai_id = "'.$nilai_id.'"
                                    OR atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND users.id = "'.$users_id.'"
                                    AND penilaian.nilai_id = "'.$nilai2_id.'"
                                GROUP BY
                                    atlit.id
        ');
        return $data->result();
    }

    public function getNilai($atlit_id, $ronde_id, $users_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    penilaian.id,
                                    ronde.ronde,
                                    users.nama AS nama_user,
                                    atlit.nama AS nama_atlit,
                                    COUNT( nilai.nilai ) AS nilai
                                FROM
                                    penilaian
                                    JOIN ronde ON penilaian.ronde_id = ronde.id
                                    JOIN users ON penilaian.users_id = users.id
                                    JOIN atlit ON penilaian.atlit_id = atlit.id
                                    JOIN nilai ON penilaian.nilai_id = nilai.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND users.id = "'.$users_id.'"
                                    AND penilaian.nilai_id = "'.$nilai_id.'"
                                GROUP BY
                                    atlit.id
        ');
        return $data->result();
    }

    public function simpanData($tabel, $data){
        $data = $this->db->insert($tabel, $data);
		return $data;
    }

    public function dataNilaiTerakhir($users_id, $atlit_id){
        $data = $this->db->query('SELECT
                                *
                                FROM
                                    penilaian
                                WHERE
                                    users_id = '.$users_id.'
                                    AND atlit_id = '.$atlit_id.'
                                    AND id =(
                                    SELECT
                                        id
                                    FROM
                                        penilaian
                                    WHERE
                                        users_id = '.$users_id.'
                                        AND atlit_id = '.$atlit_id.'
                                    ORDER BY
                                    id DESC
                                    LIMIT 1)
        ');
        return $data->result();
    }

    // public function deleteData($users_id, $atlit_id){
    //     $data = $this->db->query('DELETE 
    //                                 FROM
    //                                     penilaian
    //                                 WHERE
    //                                     users_id = "'.$users_id.'"
    //                                     AND atlit_id = "'.$atlit_id.'"
    //                                     AND id =(
    //                                     SELECT
    //                                         id
    //                                     FROM
    //                                         penilaian
    //                                     WHERE
    //                                         users_id = "'.$users_id.'"
    //                                         AND atlit_id = "'.$atlit_id.'"
    //                                     ORDER BY
    //                                     id DESC
    //                                     LIMIT 1)
    //     ');
    //     return $data;
    // }

     public function deleteData($users_id, $atlit_id){
        $data = $this->db->query('DELETE p1
                                FROM penilaian p1
                                JOIN (
                                    SELECT id
                                    FROM penilaian
                                    WHERE users_id = "'.$users_id.'"
                                    AND atlit_id = "'.$atlit_id.'"
                                    ORDER BY id DESC
                                    LIMIT 1
                                ) p2 ON p1.id = p2.id
                                WHERE p1.users_id = "'.$users_id.'"
                                AND p1.atlit_id = "'.$atlit_id.'";

        ');
        return $data;
    }
}
