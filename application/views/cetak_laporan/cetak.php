<!-- START TAMPIL DATA TABLE -->
<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->


<script type="text/javascript">
    $(function () {
        $(document).ready(function () {
            $('.semester').hide();
//            $('.ui-datepicker select.ui-datepicker-month').attr('style', 'display:none');
//             $('.ui-datepicker select.ui-datepicker-month').hide();

        });

        $('#bulan').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //            dateFormat: 'MM yy',
            dateFormat: 'mm/yy',
            onClose: function (dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });

        $("#tahun").datepicker({
            dateFormat: 'yy',  
            changeYear: true,  
            showButtonPanel: true,
            changeMonth: false,
            onClose: function (dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }});
    });

</script>

<style>

    /*bulan*/
    .ui-datepicker-calendar {
        display: none;
    }

    /*tahun*/
    /*        .ui-datepicker-calendar {
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

</style>

<!-- START TAMPIL MODAL -->

<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="merah">LAPORAN MONOGRAFI DINAMIS</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="col-lg-12">
                        <form action="<?= site_url('cetak_laporan/excel/') ?>" method="post">
                            <input name="jenis" id="jenis" type="hidden" value="<?= $laporan ?>">
                            <br>
                            <br>
                            <div class="row" style="padding-top:10px">
                                <label class="col-sm-2 control-label">Kelurahan</label>
                                <div class="col-sm-4">
                                    <?php echo $form_kelurahan; ?>
                                </div>
                            </div>
                            <div class="row" style="padding-top:10px">
                                <label class="col-sm-2 control-label">Periode</label>
                                <div class="col-sm-4">

                                    <input name="periode" id="periode" type="text" class="form-control number date-picker" required
                                           autocomplete="off" value="<?= date('m') . '/' . date('Y') ?>">



                                </div>
                            </div>

                            <div class="row semester" style="padding-top:10px">
                                <label class="col-sm-2 control-label">Semester</label>
                                <div class="col-sm-4">
                                    <select  class="form-control"  name="semester" id="semester" required="">
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row" align="right" style="padding-top:30px">
                                <div class="col-sm-6">                            
                                    <button type="submit" id="btn-filter" class="btn_simpan btn btn-success">
                                        <i class="fa fa-file-excel-o"></i></i>  Unduh Laporan Excel</button>
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


