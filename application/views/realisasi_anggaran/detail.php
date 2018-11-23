<!-- START TAMPIL DATA TABLE -->
<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">
    $(function () {
        $("#waktu_a").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            onClose: function (selectedDate) {
                $("#waktu_b").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#waktu_b").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            onClose: function (selectedDate) {
                $("#waktu_a").datepicker("option", "maxDate", selectedDate);
            }
        });
    });</script>

<script>
    $(document).ready(function () {
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
    $(function () {
        // START FORM MODAL DELETE
        $(document).on('click', '.btn_delete', function () {
            $('#modal_form').modal('show');
            $(".title").text("Apakah Anda Ingin Menghapus Data Ini?");
            $(".btn_save").append('<i class="fa fa-trash-o"></i> ');
            $(".btn_save").append('HAPUS');
            $(".btn_save").attr("id", $(this).attr('id'));
            $(".btn_save").removeClass("btn_save").addClass("btn_hapus btn btn-danger");
        });
        // START SHOW IMAGE
        $(document).on('click', '#show_image', function () {
            $('#modal_form').modal('show');
            $(".modal-header").hide();
            $(".box-footer").hide();
            $("#box-body").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br><img src="' + $(this).attr('src') + '" style="width:100%; height:auto">');
        });
    });</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function () {
        // PROSES DELETE
        $(document).on('click', '.btn_hapus', function () {
            $('.btn_hapus').prop('disabled', true);
            $("#loading").show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('realisasi_anggaran/delete') . '/' ?>" + $(this).attr('id'),
                success: function (result) {
                    $(".title").text(result);
                    $(".btn_hapus").hide();
                    $("#loading").hide();
                    $('#modal_form').modal('hide');
                    //table.ajax.reload(null, false); //reload datatable ajax 
                    location.reload();
                }
            });
        });
    });</script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <?php // echo site_url('realisasi_anggaran').'/form/' . isset($rekening) ? $rekening->tahun : '-' . '/' . isset($rekening) ? md5($rekening->id_rekening) : '-' ?>
                    <div class="col-lg-12" style="text-align: right">
                        <?php
                        $tahun = isset($rekening) ? $rekening->tahun : '-';
                        $id_rekening = isset($rekening) ? md5($rekening->id_rekening) : '-';
                        
                        ?>
                        <a href="<?= site_url('realisasi_anggaran/form/') . $tahun . '/' . $id_rekening ?>">
                            <button class="btn_input btn btn-primary"><i class="fa fa-plus-square"></i> TAMBAH DATA</button>
                        </a>
                        <a href="javascript:window.history.go(-1);">
                            <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br>
                    </div>
                    </br>
                    </br>
                    <div class="row" style="padding-top:10px">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-hover" width="100%">
                                <tr>
                                    <td width="20%">Tahun</td><td><?= isset($rekening) ? $rekening->tahun : '-' ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Kode Rekening</td><td><?= isset($rekening) ? $rekening->kode_rekening : '-' ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Uraian</td><td><?= isset($rekening) ? $rekening->uraian : '-' ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Nominal Anggaran</td><td><?= isset($anggaran) ? 'Rp. ' . number_format($anggaran->nominal, 2, ",", ".") : '-' ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="padding-top:10px">
                        <div class="col-lg-12"> 
                            <div id="tampil_data" class="table-responsive" style="border: 0; !important">
                                <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                    <thead style="background-color: #ffffff; color:#666;">
                                        <tr>
                                            <th class="text-center">NO</th>
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
                                            <th class="text-center">AKSI</th>
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

//                                            $pajak = $row->jenis_pajak;
//                                            if ($pajak == 1)
//                                                $ppn = $row->nominal_pajak;
//                                            else if ($pajak == 2)
//                                                $pph4 = $row->nominal_pajak;
//                                            else if ($pajak == 3)
//                                                $pph21 = $row->nominal_pajak;
//                                            else if ($pajak == 4)
//                                                $pph22 = $row->nominal_pajak;
//                                            else if ($pajak == 5)
//                                                $pph23 = $row->nominal_pajak;

                                                $ppn = $row->nominal_ppn;
                                                $pph4 = $row->nominal_pph4;
                                                $pph21 = $row->nominal_pph21;
                                                $pph22 = $row->nominal_pph22;
                                                $pph23 = $row->nominal_pph23;
                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
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
                                                    <td>
                                                        <a href='<?= site_url('realisasi_anggaran/form/' . $tahun . '/' . $id_rekening .'/'. md5($row->id_realisasi))
                                                ?>' style='color:#f0ad4e' data-target='tooltip' title='Ubah'>
                                                            <i id="<?= md5($row->id_realisasi) ?> " class='fa fa-edit (alias) '></i></a>
                                                        &nbsp;
                                                        <a href='#' style='color:#d9534f' data-target='tooltip' title='Hapus'>
                                                            <i id="<?= md5($row->id_realisasi) ?> " class='btn_delete fa fa-trash'></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                        }
                                        ?>

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
                        <div class="col-md-8 text-left">
                            <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                        <div class="col-md-4">
                            <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

<div id="modal_form2" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="title modal-title"></h4>
                    </div>
                    <div id="box-body" class="box-body">
                        <div class="col-md-12 text-center">
                            <button data-dismiss="modal" id="btn_batal" class="btn pull-center" >OK</button>&nbsp;&nbsp;
                        </div>
                    </div>
                    <!--<div class="box-footer">
                       
                      <div class="col-md-8 text-left">
                           <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                       </div>
                       <div class="col-md-4">
                           <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                       </div>
                   </div>-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

