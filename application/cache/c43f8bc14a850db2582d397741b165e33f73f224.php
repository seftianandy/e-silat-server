<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content" style="background-color: #fff;">
        <div class="modal modal-danger fade" id="modal-merah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Vote Sudut Merah</h4>
                        <div class="btn-group btn-block" style="margin-top: 2rem;">
                            <button class="btn btn-lg btn-block btn-warning"
                            id="vote_jm" atlitId="">Jatuhan</button>
                            <button class="btn btn-lg btn-block btn-warning"
                            id="vote_bm"atlitId=""
                            style="margin-top: 2rem;">Binaan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-info fade" id="modal-biru">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Vote Sudut Biru</h4>
                        <div class="btn-group btn-block" style="margin-top: 2rem;">
                            <button class="btn btn-lg btn-block bg-navy"
                            id="vote_jb" atlitId="">Jatuhan</button>
                            <button class="btn btn-lg btn-block bg-navy"
                            id="vote_bb" atlitId=""
                            style="margin-top: 2rem;">Binaan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-default fade" id="modal-vote">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title">Hasil Vote</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered" id="getDataVote">
                            <tr>
                                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 1</th>
                                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 2</th>
                                <th class="text-center" style="padding: 2rem; vertical-align: middle;">Juri 3</th>
                            </tr>
                        </table>
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
                                            <?php echo e($_SESSION['nama_user']); ?>

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
                        <input type="hidden" name="per_m0" id="per_m0">
                        <input type="hidden" name="per_m1" id="per_m1">
                        <input type="hidden" name="per_m2" id="per_m2">

                        <input type="hidden" name="per_b0" id="per_b0">
                        <input type="hidden" name="per_b1" id="per_b1">
                        <input type="hidden" name="per_b2" id="per_b2">
                        <div class="card-body table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center bg-red">Peringatan</th>
                                        <th class="text-center bg-red">Teguran</th>
                                        <th class="text-center bg-red">Binaan</th>
                                        <th class="text-center bg-red">Hukuman</th>
                                        <th class="text-center bg-red">Jatuhan</th>
                                        <th class="text-center bg-black" width="30">Babak</th>
                                        <th class="text-center bg-blue">Jatuhan</th>
                                        <th class="text-center bg-blue">Hukuman</th>
                                        <th class="text-center bg-blue">Binaan</th>
                                        <th class="text-center bg-blue">Teguran</th>
                                        <th class="text-center bg-blue">Peringatan</th>
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

        <div class="fixed-bottom-buttons">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat btn-danger btn-lg"
                            id="jatuhan_m" atlitId="">
                                Jatuhan
                            </button>
                            <button class="button btn btn-flat btn-danger btn-lg"
                            id="binaan_m" atlitId="" style="margin-top: 1.5rem;">
                                Binaan
                            </button>
                        </div>
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat btn-danger btn-lg"
                            id="teguran_m" atlitId="">
                                Teguran
                            </button>
                            <button class="button btn btn-flat btn-danger btn-lg"
                            id="peringatan_m" atlitId=""
                            style="margin-top: 1.5rem;">
                                Peringatan
                            </button>
                        </div>
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat btn-success btn-lg" data-toggle="modal"
                                data-target="#modal-merah">
                                Vote
                            </button>
                            <button class="button btn btn-flat btn-warning btn-lg"
                            id="hapus_m" atlitId=""
                            style="margin-top: 1.5rem;">
                                Hapus
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-6 text-right">
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat btn-success btn-lg" data-toggle="modal"
                                data-target="#modal-biru">
                                Vote
                            </button>
                            <button class="button btn btn-flat btn-warning btn-lg"
                            id="hapus_b" atlitId=""
                            style="margin-top: 1.5rem;">
                                Hapus
                            </button>
                        </div>
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat bg-blue btn-lg"
                            id="teguran_b" atlitId="">
                                Teguran
                            </button>
                            <button class="button btn btn-flat bg-blue btn-lg"
                            id="peringatan_b" atlitId=""
                            style="margin-top: 1.5rem;">
                                Peringatan
                            </button>
                        </div>
                        <div class="btn-group-vertical" style="margin-right: 1.5rem;">
                            <button class="button btn btn-flat bg-blue btn-lg"
                            id="jatuhan_b" atlitId="">
                                Jatuhan
                            </button>
                            <button class="button btn btn-flat bg-blue btn-lg"
                            id="binaan_b" atlitId=""
                            style="margin-top: 1.5rem;">
                                Binaan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script src="<?= base_url() ?>assets/nilai-dewan/penilaian.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.themplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/www/penjurian/application/views/contents/nilai-dewan/penilaian.blade.php ENDPATH**/ ?>