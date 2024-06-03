@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="background-color: #fff;">
        <div class="modal modal-primary fade" id="modal-biru" status="close">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Vote Sudut Biru</h4>
                        <h2 class="modal-title" id="title_biru"></h2>
                        <div class="row" style="margin-top: 2rem;">
                            <div class="col-sm-6">
                                <button class="btn btn-lg btn-block bg-orange"
                                id="vote_nb" voteId="" dataM="">NO</button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-lg btn-block bg-olive"
                                id="vote_yb" voteId="" dataM="">YES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-danger fade" id="modal-merah" status="close">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Vote Sudut Merah</h4>
                        <h2 class="modal-title" id="title_merah"></h2>
                        <div class="row" style="margin-top: 2rem;">
                            <div class="col-sm-6">
                                <button class="btn btn-lg btn-block bg-orange"
                                id="vote_nm" voteId="" dataM="">NO</button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-lg btn-block bg-olive"
                                id="vote_ym" voteId="" dataM="">YES</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center h4" colSpan="2">
                                            {{$_SESSION['nama_user']}}
                                            <br />
                                            Arena <span id="arena"></span> - <span id="pertandingan"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <span id="kontingen_merah"></span> <br>
                                            <strong style="font-size: 2.5rem;">
                                                <span id="nama_atlit_merah"></span>
                                            </strong>
                                        </td>
                                        <td class="text-center">
                                            <span id="kontingen_biru"></span> <br>
                                            <strong style="font-size: 2.5rem;">
                                                <span id="nama_atlit_biru"></span>
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center bg-red">Skor</th>
                                        <th class="text-center bg-black" width="30">Babak</th>
                                        <th class="text-center bg-blue">Skor</th>
                                    </tr>
                                </thead>
                                <tbody id="loadRonde">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php  
            $role = $_SESSION['role'];
            if($role == 'juri_1'){
                $kode = 1;
            } elseif($role == 'juri_2'){
                $kode = 2;
            } else {
                $kode = 3;
            }
        ?>
        <div class="fixed-bottom-buttons" id="tombol">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat btn-danger btn-lg"
                            id="pukulan_m" atlitId="" tombol="puk_jm{{$kode}}" >
                                Pukulan(1)
                            </button>
                            <button class="button btn btn-flat btn-danger btn-lg"
                            id="tendangan_m" atlitId="" tombol="ten_jm{{$kode}}"
                            style="margin-top: 1.5rem;">
                                Tendangan(2)
                            </button>
                        </div>
                        <button class="button btn btn-flat btn-warning btn-lg"
                        id="hapus_m" atlitId=""
                        style="margin-top: 6.2rem;">
                            Hapus
                        </button>
                    </div>
                    <div class="col-sm-2 text-center">
                        <button class="button btn btn-flat btn-success btn-lg"
                        id="refresh" atlitId="" style="margin-top: 6.2rem;">
                            Refresh Data
                        </button>
                    </div>
                    <div class="col-sm-5 text-right">
                        <button class="button btn btn-flat btn-warning btn-lg d-block d-sm-none"
                        id="hapus_b" atlitId=""
                        style="margin-top: 6.2rem;">
                            Hapus
                        </button>
                        <div class="btn-group-vertical" style="margin-left: 1.5rem;">
                            <button class="button btn btn-flat btn-primary btn-lg"
                            id="pukulan_b" atlitId="" tombol="puk_jb{{$kode}}">
                                Pukulan(1)
                            </button>
                            <button class="button btn btn-flat btn-primary btn-lg"
                            id="tendangan_b" atlitId="" tombol="ten_jb{{$kode}}"
                            style="margin-top: 1.5rem;">
                                Tendangan(2)
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection

@section('js')
<script src="<?= base_url() ?>assets/nilai-juri/penilaian.js"></script>
@endsection

@extends('layouts.themplate')