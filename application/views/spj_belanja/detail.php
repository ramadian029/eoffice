<!-- START TAMPIL DATA TABLE -->
<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">

    function verifikasi(con, id) {
        $('.btn_hapus').prop('disabled', true);
        $("#loading").show();

        var url = "<?php echo site_url('spj_belanja/verifikasi_realisasi') ?>?con=" + con + "&id=" + id;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            error: function() {
                alert('Terjadi Kesalahan Dalam Database.');
            },
            success: function(respon) {
                if (respon.status == 'berhasil') {
                    $(".btn_hapus").show();
                    $('.btn_hapus').prop('disabled', false);
                    $("#loading").hide();
                    $('#modal_form').modal('hide');
//                    location.href = "<?= site_url('spj_belanja') ?>";
                    location.reload();
                }
            }
        });

    }

    function verifikasi_all(con, periode, id_anggaran_kelurahan) {
        $('.btn_hapus').prop('disabled', true);
        $("#loading").show();

        var url = "<?php echo site_url('spj_belanja/verifikasi_all') ?>?con=" + con + "&periode="
                + periode + "&id_anggaran_kelurahan=" + id_anggaran_kelurahan;

        $.ajax({
            url: url,
            type: "POST",
            dataType: "JSON",
            error: function() {
                alert('Terjadi Kesalahan Dalam Database.');
            },
            success: function(respon) {
                if (respon.status == 'berhasil') {
                    $(".btn_hapus").show();
                    $('.btn_hapus').prop('disabled', false);
                    $("#loading").hide();
                    $('#modal_form').modal('hide');
//                    location.href = "<?= site_url('spj_belanja') ?>";
                    location.reload();
                }
            }
        });

    }

    function ver_modal(con, periode, all, anggaran_kelurahan) {
        $('#modal_form').modal('show');
        $(".title").text("Apakah Anda Yakin?");
//        $(".btn_save").append('<i class="fa fa-trash-o"></i> ');

        if (con == 0) {
            document.getElementById("btn_save").innerHTML = 'Batalkan Verifikasi';
            $("#btn_save").removeClass("btn_save btn-danger btn-success");
            $("#btn_save").addClass("btn_save btn btn-danger");
        } else if (con == 1) {
            document.getElementById("btn_save").innerHTML = 'Verifikasi';
            $("#btn_save").removeClass("btn_save btn-danger btn-success");
            $("#btn_save").addClass("btn_save btn btn-success");
        }
//        $(".btn_save").attr("id", $(this).attr('id'));
        if (all == 'all')
            $("#btn_save").attr("onclick", "verifikasi_all(" + con + ",'" + periode + "','" + anggaran_kelurahan + "')");
        else
            $("#btn_save").attr("onclick", "verifikasi(" + con + ",'" + periode + "')");


    }
</script>
<script>
    $(document).ready(function() {
//    $('.form-control').val('');    

        $('#data_laporan').DataTable({
            columnDefs: [
                {"orderable": false, "targets": 0},
            ],
            responsive: true,
            searching: false
        });
    });</script>

<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // START FORM MODAL DELETE
        $(document).on('click', '.btn_delete', function() {
            $('#modal_formx').modal('show');
            $(".titlex").text("Apakah Anda Ingin Menghapus Data Ini?");
            $(".btn_savex").append('<i class="fa fa-trash-o"></i> ');
            $(".btn_savex").append('HAPUS');
            $(".btn_savex").attr("id", $(this).attr('id'));
            $(".btn_savex").removeClass("btn_savex").addClass("btn_hapusx btn btn-danger");
        });

    });</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // PROSES DELETE
        $(document).on('click', '.btn_hapusx', function() {
            $('.btn_hapusx').prop('disabled', true);
            $("#loadingx").show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('spj_belanja/delete') . '/' ?>" + $(this).attr('id'),
                success: function(result) {
                    $(".titlex").text(result);
                    $(".btn_hapusx").show();
                    $('.btn_hapusx').prop('disabled', false);
                    $("#loadingx").hide();
                    $('#modal_formx').modal('hide');
//                    table.ajax.reload(null, false); //reload datatable ajax 
                    location.reload();
                }
            });
        });
    });
</script>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <?php // echo site_url('realisasi_anggaran').'/form/' . isset($rekening) ? $rekening->tahun : '-' . '/' . isset($rekening) ? md5($rekening->id_rekening) : '-' ?>
                    <div class="col-lg-12" style="text-align: right">
                        <?php
                        if ($jumlah > 0) {
                            ?>
                            <!--                            <a class="btn btn-success btn_verifikasi" href="#" 
                                                           onclick="ver_modal('1', '<?= $periode ?>', 'all', '<?= $id_anggaran_kelurahan ?>');">VERIFIKASI SEMUA</a>-->
                            <?php
                        }
                        ?>
                        <!--href="javascript:window.history.go(-1);"-->
                        <a href="<?= site_url('spj_belanja/index/') . $id_kelurahan . '/' . $periode ?>">
                            <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br>
                    </div>
                    </br>
                    </br>
                    <div class="row" style="padding-top:10px">
                        <!--                        <div class="col-lg-12 text-center text-bold">
                                                    SPJ BELANJA ADMINISTRATIF
                                                </div>-->
                        <div class="col-lg-12 text-bold text-uppercase">
                            <table class="table table-bordered table-hover" width="100%">
                                <tr>
                                    <td width="20%">KODE REKENING</td><td><?= $kode_rekening ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">URAIAN</td><td><?= $uraian ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">KEC/KEL</td><td><?= strtoupper($kelurahan) ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">PERIODE</td><td><?= $nm_bulan . ' ' . $tahun ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="padding-top:10px">
                        <div class="col-lg-12"> 
                            <div id="tampil_data" class="table-responsive" style="border: 0; !important">
                                <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                    <thead style="background-color: #ffffff; color:#666;" class="text-bold text-center">
                                        <tr>
                                            <th class="text-center">NO</th>
                                            <th class="text-center">AKSI</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center">TANGGAL REALISASI</th>
                                            <th class="text-center">SPJ</th>                                        
                                            <th class="text-center">NOMINAL REALISASI</th>
                                            <th class="text-center">PPN</th>
                                            <th class="text-center">PPH4</th>
                                            <th class="text-center">PPH21</th>
                                            <th class="text-center">PPH22</th>
                                            <th class="text-center">PPH23</th>
    <!--                                        <th class="text-center">SP2D</th>
                                            <th class="text-center">LAIN-LAIN</th>-->                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($jumlah > 0) {
                                            $no = 1;
                                            foreach ($data as $row) {

                                                if ($row->jenis_spj == 1)
                                                    $jenis_spj = 'LS Gaji';
                                                else if ($row->jenis_spj == 2)
                                                    $jenis_spj = 'LS Barang - Jasa';
                                                else if ($row->jenis_spj == 3)
                                                    $jenis_spj = 'UP / GU / TU';
                                                else
                                                    $jenis_spj = '-';

                                                $ppn = $pph4 = $pph21 = $pph22 = $pph23 = 0;

                                                $ppn = $row->nominal_ppn;
                                                $pph4 = $row->nominal_pph4;
                                                $pph21 = $row->nominal_pph21;
                                                $pph22 = $row->nominal_pph22;
                                                $pph23 = $row->nominal_pph23;
                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td>
                                                        <!--                                                        <a class="btn btn-success btn-xs btn_verifikasi" href="#"  style="padding: 4px 8px; font-size: 12px"
                                                                                                                   onclick="ver_modal('1', '<?= $row->id_realisasi ?>');">Verifikasi</a>-->
                                                        <?php if ($row->verified == 1) { ?>
                                                            <a href="#" onclick="ver_modal('0', '<?= $row->id_realisasi ?>', '');" style='color: #d9534f' data-target='tooltip' title='Batalkan Verifikasi'>
                                                                <i id="<?= md5($row->id_realisasi) ?> " class='fa fa-close (alias) '></i></a>
                                                        <?php } else { ?>
                                                            <a href="#" onclick="ver_modal('1', '<?= $row->id_realisasi ?>', '');" style='color: #00a65a' data-target='tooltip' title='Verifikasi'>
                                                                <i id="<?= md5($row->id_realisasi) ?> " class='fa fa-check-square-o (alias) '></i></a>

                                                        <?php }
                                                        ?>
                                                        &nbsp;<a href='<?= site_url('spj_belanja/form/' . md5($id_kelurahan) . '/'. md5($id_rekening) . '/' . md5($row->id_realisasi))
                                                        ?>' style='color:#f0ad4e' data-target='tooltip' title='Ubah'>
                                                            <i id="<?= md5($row->id_realisasi) ?> " class='fa fa-edit (alias) '></i></a>
                                                        &nbsp;
                                                        <a href='#' style='color:#d9534f' data-target='tooltip' title='Hapus'>
                                                            <i id="<?= md5($row->id_realisasi) ?> " class='btn_delete fa fa-trash'></i></a>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->verified == 0) {
                                                            echo " <span class='label label-danger'>Belum Terverifikasi</span>";
                                                        }
                                                        else
                                                            echo " <span class='label label-success'>Sudah Terverifikasi</span>";
                                                        ?>
                                                    </td>
                                                    <td><?= $row->tgl_realisasi ?></td>
                                                    <td><?= $jenis_spj ?></td>
                                                    <td class="text-right"><?= number_format($row->nominal_realisasi, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($ppn, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($pph4, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($pph21, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($pph22, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($pph23, 2, ",", ".") ?></td>
        <!--                                                <td class="text-right"><?= number_format($row->nominal_sp2d, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($row->nominal_lain, 2, ",", ".") ?></td>-->

                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                        } else {
                                            ?>
                                        <td class="text-center" colspan="8">Tidak Ada Data</td>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>      
        </div>
    </div>
</section><!-- /.content -->


<div id="modal_form" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="title modal-title"></h4>
                    </div>
                    <div id="box-body" class="box-body">
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 text-left">
                            <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                        <div class="col-md-6">
                            &nbsp;&nbsp;

                            <button data-dismiss="modal" id="btn_batal" class="btn pull-right" style="margin-left:10px">Tutup</button>&nbsp;&nbsp; 
                            <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

<div id="modal_formx" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="titlex modal-title"></h4>
                    </div>
                    <div id="box-body" class="box-body">
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 text-left">
                            <image id="loadingx" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                        <div class="col-md-6">
                            &nbsp;&nbsp;
                            <button id="btn_savex" class="btn_savex btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                            <button data-dismiss="modal" id="btn_batalx" class="btn pull-right" >BATAL</button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

