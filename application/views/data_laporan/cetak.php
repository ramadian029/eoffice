<!-- START TAMPIL DATA TABLE -->
<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">
    $(function() {
    $("#waktu_a").datepicker({
    changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            onClose: function(selectedDate) {
    $("#waktu_b").datepicker("option", "minDate", selectedDate);
    }
    });
            $("#waktu_b").datepicker({
    changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
            onClose: function(selectedDate) {
    $("#waktu_a").datepicker("option", "maxDate", selectedDate);
    }
    });
    });</script>

<script type="text/javascript">
            $(function() {
    $('.date-picker').datepicker({
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
<!--<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>-->

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
            location.href = "<?= site_url('data_laporan/hasil/' . $id_laporan) ?>";
//        $('.form-control').val('');
                    //location.reload();
            }
</script>

<!-- START TAMPIL MODAL -->

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="col-lg-12">
                        <form action="<?= site_url('data_laporan/excel/') ?>" method="post">
                            <div class="form-group">
                                <br>
                                <br>
                                <label for="country" class="col-sm-12"></label>
                                <div class="col-lg-3">
                                    <input type="text" name="waktu_a" value="<?= !empty($waktu_a) ? $waktu_a : '' ?>" class="date form-control" 
                                           id="waktu_a" placeholder="Dari Tanggal" autocomplete="off">
                                </div>
                                <div class="col-lg-1" style="padding-top: 10px"><center>s.d.</center></div>
                                <div class="col-lg-3">
                                    <input type="text" name="waktu_b" value="<?= !empty($waktu_b) ? $waktu_b : '' ?>" class="date form-control" 
                                           id="waktu_b" placeholder="Sampai Tanggal" autocomplete="off">
                                </div>
                                <!--                                <label class="col-sm-1 control-label">Bulan</label>
                                                                <div class="col-sm-4">
                                                                    <input name="startDate" id="startDate" class="date-picker" />
                                                                    <input name="bulan" type="text" class="form-control number date-picker" required
                                                                           value="">
                                                                </div>-->
                                <div class="col-sm-4">
                                    <input type="hidden" name="id_laporan" value="<?= $id_laporan ?>"/>

                                    <button type="submit" id="btn-filter" class="btn_simpan btn btn-success">
                                        <i class="fa fa-file-excel-o"></i></i>  Unduh Laporan Excel</button>
                                    <!--                                <button type="button" id="btn-reset" class="btn btn-default" onclick="con();">Reset</button>-->
                                </div>
                            </div>
                        </form>
                        <br>
                        <br>
                        <br>
                        <br>

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

