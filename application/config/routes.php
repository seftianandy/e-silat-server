<?php
defined('BASEPATH') or exit('No direct script access allowed');
$route['default_controller'] = 'Auth';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Auth/index';
$route['sign'] = 'Auth/login';
$route['logout'] = 'Auth/logout';

$route['dashboard'] = 'Dashboard/index';
$route['datakop'] = 'Dashboard/tampilData';
$route['updatelogokop'] = 'Dashboard/updateLogo';
$route['updatekop'] = 'Dashboard/updateKop';

$route['akun'] = 'DaftarAkun/index';
$route['dataakun'] = 'DaftarAkun/tampilData';

$route['nilai'] = 'Nilai/index';
$route['datanilai'] = 'Nilai/tampilData';

$route['peserta'] = 'Peserta/index';
$route['datapeserta'] = 'Peserta/tampilData';
$route['tambahpeserta'] = 'Peserta/tambahPeserta';
$route['updatelogo'] = 'Peserta/updateLogo';
$route['resetpeserta'] = 'Peserta/resetData';

$route['pertandingan'] = 'Pertandingan/index';
$route['datapertandingan'] = 'Pertandingan/tampilDataPertandingan';


$route['nilaijuri'] = 'NilaiJuri/index';
$route['penjurian'] = 'NilaiJuri/penjurian';
$route['datanilaijuri'] = 'NilaiJuri/tampilData';
$route['datarondejuri'] = 'NilaiJuri/tampilRonde';
$route['datanilaiatlitjuri'] = 'NilaiJuri/tampilNilaiAtlitJuri';

$route['tambahnilai'] = 'NilaiJuri/tambahNilai';
$route['datarondeconjuri'] = 'NilaiJuri/tampilDataRondecon';
$route['updaterondeconjuri'] = 'NilaiJuri/updateDataRondecon';
$route['datavotejuri'] = 'NilaiJuri/tampilDataVote';
$route['updatevotejuri'] = 'NilaiJuri/updateDataVote';
$route['hapusnilai'] = 'NilaiJuri/hapusNilai';

$route['nilaidewan'] = 'NilaiDewan/index';
$route['penjuriandewan'] = 'NilaiDewan/penjurian';
$route['datanilaidewan'] = 'NilaiDewan/tampilData';
$route['datarondedewan'] = 'NilaiDewan/tampilRonde';
$route['datanilaiatlitdewan'] = 'NilaiDewan/tampilNilaiAtlitDewan';
$route['datanilaiperingatandewan'] = 'NilaiDewan/tampilNilaiPeringatan';
$route['datanilaijatuhandewan'] = 'NilaiDewan/tampilNilaiJatuhan';
$route['datanilaitegurandewan'] = 'NilaiDewan/tampilNilaiTeguran';
$route['datanilaihukumandewan'] = 'NilaiDewan/tampilNilaiHukuman';
$route['selesaipertandingan'] = 'NilaiDewan/updateStatusPertandingan';

$route['tambahnilaidewan'] = 'NilaiDewan/tambahNilai';
$route['tambahrondecondewan'] = 'NilaiDewan/tambahRondecon';
$route['tambahvotedewan'] = 'NilaiDewan/tambahVote';
$route['datavotedewan'] = 'NilaiDewan/tampilDataVote';
$route['hasilvotedewan'] = 'NilaiDewan/hasilVote';
$route['hapusnilaidewan'] = 'NilaiDewan/hapusNilai';

$route['papanskor'] = 'PapanSkor/index';
$route['datanilaiskor'] = 'PapanSkor/tampilData';
$route['datarondeskor'] = 'PapanSkor/tampilRonde';
$route['datahukumanskor'] = 'PapanSkor/tampilDataHukuman';
$route['dataperingatanskor'] = 'PapanSkor/tampilDataHukumanPeringatan';
$route['datateguranskor'] = 'PapanSkor/tampilDataHukumanTeguran';
$route['datatotalskor'] = 'PapanSkor/tampilDataNilaiSkor';
$route['datatomboljuriskor'] = 'PapanSkor/tampilTombol';
$route['datavoteskor'] = 'PapanSkor/tampilDataVote';

$route['history'] = 'History/index';
$route['log'] = 'History/log';
$route['datalog'] = 'History/tampilData';

$route['timer'] = 'Timer/index';

$route['updatetombol'] = 'Tombol/updateData';
