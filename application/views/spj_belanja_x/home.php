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

        $('#periode').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //            dateFormat: 'MM yy',
            dateFormat: 'mm/yy',
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });</script>
<style>
    /*    .ui-datepicker-calendar {
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
        }*/

    .ui-datepicker-calendar {
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
        location.href = "<?= site_url('spj_belanja') ?>";
    }

    function verifikasi(con, periode, id_kelurahan) {
        $('.btn_hapus').prop('disabled', true);
        $("#loading").show();

        $.ajax({
            url: "<?php echo site_url('spj_belanja/verifikasi') ?>?con=" + con + "&periode=" + periode,
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
                    location.href = "<?= site_url('spj_belanja') ?>";
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


<!-- Main content -->
<section class="content">
    <div class="row">
                        <div class="merah">SPJ BELANJA ADMINISTRATIF</div>

        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-8">
                                    <div class="panel-body">
                                        <div id='x'class="form-horizontal"> 
                                            <form action="<?= site_url('spj_belanja') ?>" method="post">
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Kelurahan</label>
                                                    <div class="col-sm-12">
                                                        <?php echo $form_kelurahan; ?>
                                                    </div>
                                                </div></div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Bulan</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control">
                                                            <option>Januari</option>
                                                            <option>Februari</option>
                                                            <option>Maret</option>
                                                            <option>April</option>
                                                            <option>Mei</option>
                                                            <option>Juni</option>
                                                            <option>Juli</option>
                                                            <option>Agustus</option>
                                                            <option>September</option>
                                                            <option>Oktober</option>
                                                            <option>November</option>
                                                            <option>Desember</option>
                                                        </select>
                                                    </div>
                                                </div></div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Tahun</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control">
                                                            <option>2016</option>
                                                            <option>2017</option>
                                                            <option>2018</option>
                                                        </select>
                                                    </div>
                                                </div></div>

<!--                                                 <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Periode</label>
                                                    <div class="col-sm-12">
                                                        <input name="periode" id="periode" type="text" class="form-control number date-picker" required
                                                               autocomplete="off" value="<?= isset($post_periode) ? $post_periode : date('m') . '/' . date('Y') ?>">
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="country" class="col-sm-12">Rekening</label>
                                                    <div class="col-sm-12">
                                                        <input name="rekening" id="rekening" type="text" class="form-control" placeholder="Kode Rekening / Uraian"
                                                               autocomplete="off" value="<?= isset($post_rekening) ? $post_rekening : '' ?>">
                                                    </div>
                                                </div></div> -->
                                                <div class="col-md-3">
                                                <div class="form-group">
                                                    <!--<label for="LastName" class="col-sm-2 control-label"></label>-->
                                                    <div class="col-sm-12">
                                                        <button type="submit" id="btn-filter" class="btn btn-warning tombol-simpan">Filter</button>
                                                        <!-- <button type="button" id="btn-reset" class="btn btn-default" onclick="con();">Reset</button> -->
                                                    </div>
                                                </div></div>

                                        </div>
                                    </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success btn-download"><i class="fa fa-file"></i> Download</button>
                        </div>
                    </div>
                    </br>
                    </br>
                    <div class="row" style="padding-top:10px">
                        <div class="col-lg-12">
                            <div id="list_data" class="col-md-12 table-responsive">
                                <table id="table" class="table table-bordered table-striped table-hover gariss" style="white-space: nowrap; width:100%">
                                    <thead style="background-color: #ffffff; color:#666;">
                                      <tr>
                                        <th class="text-center gariss" rowspan="2">Kode Rekening</th>
                                        <th class="text-center gariss" rowspan="2">Uraian</th>
                                        <th class="text-center gariss" rowspan="2">Jumlah Anggaran</th>
                                        <th class="text-center gariss" colspan="3">SPJ - LS Gaji</th>
                                        <th class="text-center gariss" colspan="3">SPJ - LS Barang Jasa</th>
                                        <th class="text-center gariss" colspan="3">SPJ - LS UP/GU/TU</th>
                                        <th class="text-center gariss" rowspan="2">Jumlah SPJ (LS+UP/GU/TU) S.d. Bulan Ini</th>
                                        <th class="text-center gariss" rowspan="2">Sisa Pagu Anggaran</th>
                                      </tr>
                                      <tr>
                                        <th class="text-center gariss">S.d Bulan Lalu</th>
                                        <th class="text-center gariss">Bulan Ini</th>
                                        <th class="text-center gariss">S.d Bulan ini</th>
                                        <th class="text-center gariss">S.d Bulan Lalu</th>
                                        <th class="text-center gariss">Bulan Ini</th>
                                        <th class="text-center gariss">S.d Bulan Ini</th>
                                        <th class="text-center gariss">S.d Bulan Lalu</th>
                                        <th class="text-center gariss">Bulan Ini</th>
                                        <th class="text-center gariss">S.d Bulan Ini</th>
                                      </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php
                                        if ($jumlah > 0) {
                                            $no = 1;
                                            foreach ($data as $row) {
                                                ?>
                                                <tr>
                                                    <td><?= isset($row->kode_rekening) ? $row->kode_rekening : '-' ?></td>
                                                    <td><?= isset($row->uraian) ? $row->uraian : '-' ?></td>
                                                    <td></td>
                                                    <td class="text-right"><?= isset($row->total_anggaran) ? number_format($row->total_anggaran, 2, ",", ".") : '0' ?></td>
                                                <td></td>
                                                    <td align="center">
                                                        <?= $post_periode ?>
                                                    </td>
                                                    <td><?= isset($row->nama_kel) ? $row->nama_kel : '-'; ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
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

