<!-- START TAMPIL DATA TABLE -->
<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">
    $(function () {
        $("#tahun").datepicker({
            dateFormat: 'yy',  
            changeYear: true,  
            showButtonPanel: true,
            changeMonth: false,
            onClose: function (dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }});

        $('#periode').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //            dateFormat: 'MM yy',
            dateFormat: 'mm/yy',
            onClose: function (dateText, inst) {
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

<script>
    $(document).ready(function() {
//    $('.form-control').val('');    

    $('#data_laporan').DataTable({
    columnDefs: [
    {"orderable": false, "targets": 0},
<?php if ($_SESSION['level'] == '2') { ?>
        {"orderable": false, "targets": - 1, "searchable": false}
<?php } ?>
    ],
            responsive: true,
            searching: false
    });
    });
            function con() {
            //var base_url = '<?php echo site_url(); ?>';
            location.href = "<?= site_url('master_monografi/hasil/' . $id_laporan) ?>";
//        $('.form-control').val('');
                    //location.reload();
            }
</script>

<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
    // START FORM MODAL DELETE
    $(document).on('click', '.btn_delete', function() {
    $('#modal_form').modal('show');
            $(".title").text("Apakah Anda Ingin Menghapus Data Ini?");
            $(".btn_save").append('<i class="fa fa-trash-o"></i> ');
            $(".btn_save").append('HAPUS');
            $(".btn_save").attr("id", $(this).attr('id'));
            $(".btn_save").removeClass("btn_save").addClass("btn_hapus btn btn-danger");
    });
            $(document).on('click', '#btn-download', function() {

    if ($('#waktu_a').val() == '' || $('#waktu_b').val() == ''){
    $('#modal_form2').modal('show');
            $(".title").text("Periode Harap Diisi");
    } else {
    kelurahan = $('#kelurahan').val();
            var waktu_a = '-';
            var waktu_b = '-';
            var awal = $('#waktu_a').val();
            var akhir = $('#waktu_b').val();
            if (awal != ''){
    waktu_a = awal.substring(6, 10) + '-' + awal.substring(3, 5) + '-' + awal.substring(0, 2)
    }

    if (akhir != ''){
    waktu_b = akhir.substring(6, 10) + '-' + akhir.substring(3, 5) + '-' + akhir.substring(0, 2)
    }

    if (kelurahan == ''){
    var kelurahan = '-';
    }


    location.href = "<?php echo site_url('master_monografi/excel2/') . $id_laporan ?>" + '/' +
            kelurahan + '/' + waktu_a + '/' + waktu_b;
    }
    });

    });</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
            $(function() {
            // PROSES DELETE
            $(document).on('click', '.btn_hapus', function() {
            $('.btn_hapus').prop('disabled', true);
                    $("#loading").show();
                    $.ajax({
                    type: 'POST',
                            url: "<?php echo site_url('master_monografi/delete_isi') . '/' ?>" + $(this).attr('id'),
                            success: function(result) {
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

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color: white !important">
                                <div class="panel-heading" style="background-color: #367fa9 !important;font-size: 14px !important;
                                     border-radius: 4px;color: white !important;line-height: 1 !important">
                                    <i class="fa fa-search"></i> FILTER
                                </div>
                            </a>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div id='x'class="form-horizontal"> 
                                        <form action="<?= site_url('master_monografi/hasil/' . $id_laporan) ?>" method="post">
                                            <div class="form-group">
                                                <label for="country" class="col-sm-12">Periode</label>
                                                <div class="col-sm-12">
                                                    <input name="periode" id="periode" type="text" class="form-control number date-picker" required
                                                           autocomplete="off" value="<?= isset($post_periode) ? $post_periode : date('m') . '/' . date('Y') ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class="col-sm-12">Kelurahan</label>
                                                <div class="col-sm-12">
                                                    <?php echo $form_kelurahan; ?>

<!--                                                    <select name="kelurahan"  class="form-control">
                                                    <?php if ($_SESSION['level'] == '1') { ?>
                                                                                                                                                                                                                                                    <option value="">Semua</option>

                                                        <?php
                                                    }
                                                    foreach ($form_kelurahan as $kel) {

                                                        if ($kel->id_kel == $post_kelurahan)
                                                            $op = "selected";
                                                        else
                                                            $op = "";
                                                        ?>
                                                                                                                                                                                                                                                    <option value="<?php echo $kel->id_kel; ?>" <?php echo $op; ?>><?php echo $kel->kode_kel . ' - ' . $kel->nama_kel ?></option>                                        
                                                        <?php
                                                    }
                                                    ?>    
                                                    </select> -->

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="LastName" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-4">
                                                    <button type="submit" id="btn-filter" class="btn tombol-simpan">Filter</button>
                                                    <button type="button" id="btn-reset" class="btn tombol-simpan" onclick="con();">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    <div class="col-lg-4" style="text-align: right">
                        <a href="<?= site_url() ?>/master_monografi"
                        <button type="button" id="btn-download" class="btn_simpan btn btn-success">
                            <i class="fa fa-file-excel-o"></i></i>  Unduh Laporan Excel</button>
                        </a>
                        <br>
                    </div>-->
                    <div class="col-lg-6" style="text-align: right">
                        <a href="<?= site_url() ?>/master_monografi"
                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br>
                    </div>
                    </br>
                    </br>
                    </br>
                    <div class="col-lg-12">
                        <div id="tampil_data" class="col-lg-12 table-responsive" style="border: 0; !important">
                            <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                <thead style="background-color: #ffffff; color:#666;">
                                    <tr>
                                        <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                        <th class="text-center">NO</th>
                                        <th>KELURAHAN</th>
                                        <th class="text-center">PERIODE</th>
                                        <th class="text-center">WAKTU ENTRI</th>

                                        <?php if ($_SESSION['level'] != null) { ?>
                                            <th class="text-center">AKSI</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($jumlah > 0) {
                                        $no = 1;
                                        foreach ($data as $row) {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo isset($row->nama_kel) ? $row->nama_kel : ''; ?></td>
                                                <td align="center">
                                                    <?php
                                                    echo $row->periode;
                                                    ?>
                                                </td>

                                                <td align="center">
                                                    <?php
                                                    $waktu = $row->tgl_input;
                                                    echo substr($waktu, 8, 2) . '/' .
                                                    substr($waktu, 5, 2) . '/' .
                                                    substr($waktu, 0, 4) . ' ' .
                                                    substr($waktu, 11, 8);
                                                    ?>
                                                </td>
                                                <?php if ($_SESSION['level'] != null) { ?>
                                                    <td align="center">
                                                        <a href="<?= site_url('master_monografi/detail/' . md5($row->id_laporan) . '/' . md5($row->id_pengisi)) ?>" 
                                                           style='color: #337ab7' data-target='tooltip' title='Detail'>
                                                            <i id="<?= md5($row->id_pengisi) ?>" class='fa fa-file-text-o'></i></a>
                                                        &nbsp;
                                                        <a href="<?= site_url('master_monografi/jawab/' . md5($row->id_laporan) . '/' . md5($row->id_pengisi)) ?>" 
                                                           style='color:#f0ad4e' data-target='tooltip' title='Ubah'>
                                                            <i id="<?= md5($row->id_pengisi) ?>" class='fa fa-edit (alias) '></i></a>
                                                        &nbsp;
                                                        <a href='#' style='color:#d9534f' data-target='tooltip' title='Hapus'>
                                                            <i id="<?= md5($row->id_pengisi) ?>" class='btn_delete fa fa-trash'></i></a>
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

