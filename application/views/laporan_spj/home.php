<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript">
    $(function() {
        $("#tahun").datepicker({
            dateFormat: 'yy',  
            changeYear: true,  
            showButtonPanel: true,
            changeMonth: false,
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }});
    });</script>
<style>
    .ui-datepicker-calendar {
        display: none;
    }
    .ui-datepicker-month {
        display: none;
    }
    .ui-datepicker-prev{
        display: none;
    }
    .ui-datepicker-next{
        display: none;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {

        $('#table').DataTable({
            columnDefs: [
                {"orderable": false, "targets": 0},
            ],
            responsive: true,
            searching: false
        });
    });
    function con() {
        //var base_url = '<?php echo site_url(); ?>';
        location.href = "<?= site_url('laporan_spj') ?>";
    }

    function verifikasi(con, periode, id_kelurahan) {
        $('.btn_hapus').prop('disabled', true);
        $("#loading").show();

//        $.ajax({
//            type: 'POST',
//            url: "<?php echo site_url('realisasi_anggaran/delete') . '/' ?>" + $(this).attr('id'),
//            success: function (result) {
//                $(".title").text(result);
//                $(".btn_hapus").show();
//                $('.btn_hapus').prop('disabled', false);
//                $("#loading").hide();
//                $('#modal_form').modal('hide');
//                table.ajax.reload(null, false); //reload datatable ajax 
//            }
//        });

        $.ajax({
            url: "<?php echo site_url('laporan_spj/verifikasi') ?>?con=" + con + "&periode=" + periode,
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
                    location.href = "<?= site_url('laporan_spj') ?>";
                }
            }
        });

    }

    function ver_modal(con, periode) {
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
        $("#btn_save").attr("onclick", "verifikasi(" + con + ",'" + periode + "')");


    }
</script>

<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // START FORM MODAL DELETE
        $(document).on('click', '.btn_delete', function() {
            $('#modal_form').modal('show');
            $(".title").text("Apakah Anda Yakin?");
            $(".btn_save").append('<i class="fa fa-trash-o"></i> ');
            $(".btn_save").append('HAPUS');
            $(".btn_save").attr("id", $(this).attr('id'));
            $(".btn_save").removeClass("btn_save").addClass("btn_hapus btn btn-danger");
        });

    });</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
//    $(function () {
//        // PROSES DELETE
//        $(document).on('click', '.btn_hapus', function () {
//            $('.btn_hapus').prop('disabled', true);
//            $("#loading").show();
//            $.ajax({
//                type: 'POST',
//                url: "<?php echo site_url('realisasi_anggaran/delete') . '/' ?>" + $(this).attr('id'),
//                success: function (result) {
//                    $(".title").text(result);
//                    $(".btn_hapus").show();
//                    $('.btn_hapus').prop('disabled', false);
//                    $("#loading").hide();
//                    $('#modal_form').modal('hide');
//                    table.ajax.reload(null, false); //reload datatable ajax 
//                }
//            });
//        });
//    });
</script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="merah">LAPORAN SPJ BELANJA</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-8" style="padding-top: 20px !important;">
                                        <div id='x'class="form-horizontal"> 
                                            <form action="<?= site_url('laporan_spj') ?>" method="post">
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Tahun</label>
                                                    <div class="col-sm-12">
                                                        <input name="tahun" id="tahun" type="text" class="form-control number date-picker" required
                                                               autocomplete="off" value="<?= isset($post_tahun) ? $post_tahun : date('Y') ?>">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Kec / Kel</label>
                                                    <div class="col-sm-12 lang">
                                                        <?php echo $form_kelurahan; ?>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="form-group">
                                                        <button type="submit" id="btn-filter" class="btn tombol-simpan">Filter</button>
                                                        <button type="button" id="btn-reset" class="btn tombol-simpan" onclick="con();">Reset</button>
                                                </div>
                                                </div>
                                        </div>
                        </div>
                    </div>
                    </br>
                    <div class="row" style="padding-top:10px">
                        <div class="col-lg-12">
                            <div id="list_data" class="col-md-12 table-responsive">
                                <table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap; width:100%">
                                    <thead style="background-color: #ffffff; color:#666;">
                                        <tr>
                                            <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                            <th class="text-center">NO</th>
                                            <th class="text-center">PERIODE</th>
                                            <!--<th class="text-center">KELURAHAN</th>-->
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center">AKSI</th>
                                        </tr>

                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        if ($jumlah > 0) {
                                            $no = 1;
                                            foreach ($data as $row) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no; ?></td>
                                                    <td align="center">
                                                        <?php
                                                        $periode = substr($row->tgl_realisasi, 0, 4) . '-' . substr($row->tgl_realisasi, 5, 2);
                                                        echo $periode;
                                                        ?>
                                                    </td>
                                                    <!--<td><?php echo isset($row->nama_kel) ? $row->nama_kel : ''; ?></td>-->
                                                    <td><?php
                                                        $is_verified = $this->convertion->cek_verified($periode);
                                                        if ($is_verified == 0) {
                                                            echo " <span class='label label-danger'>Belum Terverifikasi</span>";
                                                        }
                                                        else
                                                            echo " <span class='label label-success'>Sudah Terverifikasi</span>";
                                                        ?></td>
                                                    <?php if ($_SESSION['level'] != null) { ?>
                                                        <td align="center">                                                                
                                                            <?php if ($is_verified == 1) { ?>
                                                                <a href="#" onclick="ver_modal('0', '<?= $periode ?>');" style='color: #d9534f' data-target='tooltip' title='Batalkan Verifikasi'>
                                                                    <i  class='fa fa-close (alias) '></i></a>
                                                                    &nbsp;
                                                            <a href='<?= site_url('laporan_spj/xls/' . $periode.'/'.$post_kelurahan) ?>' style='color:#f0ad4e' data-target='tooltip' title='Detail'>
                                                                <i id="<?= $periode ?>" class='fa fa-print' style='color: #f39c12'></i></a>
                                                            <?php } else if ($is_verified == 0) {
                                                                ?>
                                                                <a href="#" onclick="ver_modal('1', '<?= $periode ?>');"style='color: #00a65a' data-target='tooltip' title='Verifikasi'>
                                                                    <i class='fa fa-check-square-o (alias) '></i></a>
                                                                <?php
                                                            }
                                                            ?> &nbsp;
                                                            <a href='<?= site_url('laporan_spj/detail/' . $periode.'/'.$post_kelurahan) ?>' style='color:#f0ad4e' data-target='tooltip' title='Detail'>
                                                                <i id="<?= $periode ?>" class='fa fa-file-text-o' style='color: #337ab7'></i></a>
                                                                

                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php $no++; ?>
                                                <?php
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

