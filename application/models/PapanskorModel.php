<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PapanskorModel extends CI_Model {

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
									atlit_merah.logo AS logo_merah,
									atlit_biru.logo AS logo_biru,
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

    public function getCountHukuman($atlit_id, $ronde_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    atlit.id AS atlit_id,
                                    COALESCE(COUNT(nilai.nilai), 0) AS nilai
                                FROM
                                    atlit
                                LEFT JOIN penilaian ON atlit.id = penilaian.atlit_id
                                LEFT JOIN nilai ON penilaian.nilai_id = nilai.id AND nilai.id = "'.$nilai_id.'"
                                LEFT JOIN ronde ON penilaian.ronde_id = ronde.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                GROUP BY
                                    atlit.id;
        ');
        return $data->result();
    }

    public function getCountHukumanPeringatan($atlit_id, $partai_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    atlit.id AS atlit_id,
                                    COALESCE ( COUNT( nilai.nilai ), 0 ) AS nilai
                                FROM
                                    atlit
                                    LEFT JOIN penilaian ON atlit.id = penilaian.atlit_id
                                    LEFT JOIN nilai ON penilaian.nilai_id = nilai.id AND nilai.id = "'.$nilai_id.'"
                                    LEFT JOIN ronde ON penilaian.ronde_id = ronde.id
                                    LEFT JOIN partai ON partai.id = ronde.partai_id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND partai.id = "'.$partai_id.'"
                                GROUP BY
                                    atlit.id;
        ');
        return $data->result();
    }

    public function getCountHukumanTeguran($atlit_id, $ronde_id){
        $data = $this->db->query('SELECT
                                    penilaian.id,
                                    ronde.ronde,
                                    users.nama AS nama_user,
                                    atlit.nama AS nama_atlit,
                                    nilai.nilai
                                FROM
                                    penilaian
                                    JOIN ronde ON penilaian.ronde_id = ronde.id
                                    JOIN users ON penilaian.users_id = users.id
                                    JOIN atlit ON penilaian.atlit_id = atlit.id
                                    JOIN nilai ON penilaian.nilai_id = nilai.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND penilaian.nilai_id = "5"
                                    OR atlit.id = "'.$atlit_id.'"
                                    AND ronde.id = "'.$ronde_id.'"
                                    AND penilaian.nilai_id = "7"
                                ORDER BY penilaian.id DESC
                                LIMIT 1
        ');
        return $data->result();
    }

    public function getNilaiDewan($atlit_id, $ronde_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    p.ronde_id,
                                    p.atlit_id,
                                    SUM( n.nilai ) AS total_nilai
                                FROM
                                    penilaian p
                                    JOIN nilai n ON p.nilai_id = n.id
                                    JOIN ronde r ON p.ronde_id = r.id
                                WHERE
                                    r.partai_id = '.$ronde_id.'
                                    AND p.atlit_id = '.$atlit_id.'
                                    AND p.nilai_id = '.$nilai_id.'
                                GROUP BY
                                    r.partai_id,
                                    p.atlit_id;

        ');
        return $data->result();
    }

    public function getNilaiPeringatanDewan($atlit_id, $partai_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    p.ronde_id,
                                    p.atlit_id,
                                    SUM( n.nilai ) AS total_nilai
                                FROM
                                    penilaian p
                                    JOIN nilai n ON p.nilai_id = n.id
                                    JOIN ronde m ON p.ronde_id = m.id
                                WHERE
                                    m.partai_id = '.$partai_id.'
                                    AND p.atlit_id = '.$atlit_id.'
                                    AND p.nilai_id = '.$nilai_id.'
                                GROUP BY
                                    m.partai_id,
                                    p.atlit_id;
        ');
        return $data->result();
    }

    public function getNilaiTeguranDewan($atlit_id, $partai_id){
        $data = $this->db->query('SELECT
                                    penilaian.id,
                                    ronde.ronde,
                                    users.nama AS nama_user,
                                    atlit.nama AS nama_atlit,
                                    SUM(nilai.nilai) as total_nilai
                                FROM
                                    penilaian
                                    JOIN ronde ON penilaian.ronde_id = ronde.id
                                    JOIN users ON penilaian.users_id = users.id
                                    JOIN atlit ON penilaian.atlit_id = atlit.id
                                    JOIN nilai ON penilaian.nilai_id = nilai.id
                                WHERE
                                    atlit.id = "'.$atlit_id.'"
                                    AND ronde.partai_id = "'.$partai_id.'"
                                    AND penilaian.nilai_id = "5"
                                    OR atlit.id = "'.$atlit_id.'"
                                    AND ronde.partai_id = "'.$partai_id.'"
                                    AND penilaian.nilai_id = "7"
                                    GROUP BY atlit.id
        ');
        return $data->result();
    }

    public function getNilaiJuri($atlit_id, $partai_id, $nilai_id){
        $data = $this->db->query('SELECT
                                    p.ronde_id,
                                    p.atlit_id,
                                    p.nilai_id,
                                    n.jenis AS jenis_nilai,
                                    SUM( n.nilai ) AS total_nilai,
                                    COUNT(*) AS jumlah_data
                                FROM
                                    penilaian p
                                    JOIN nilai n ON p.nilai_id = n.id
                                    JOIN ronde r ON p.ronde_id = r.id
                                    AND r.partai_id = '.$partai_id.'
                                    AND p.atlit_id = '.$atlit_id.'
                                    AND p.nilai_id = '.$nilai_id.'
                                GROUP BY
                                    r.partai_id,
                                    p.atlit_id,
                                    p.nilai_id,
                                    n.jenis
        ');
        return $data->result();
    }

    public function getTombolJuri(){
        $data = $this->db->get('tombol');
        return $data->result();
    }
}
