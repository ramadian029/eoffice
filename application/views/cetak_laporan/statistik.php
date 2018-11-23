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
        $('#bulan').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //            dateFormat: 'MM yy',
            dateFormat: 'mm/yy',
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
        $("#tahun").datepicker({
            dateFormat: 'yy',
            changeYear: true,
            showButtonPanel: true,
            changeMonth: false,
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }});
    });</script>

<style>
<?php if ($periode == 'Bulanan') { ?>
        /*bulan*/
        .ui-datepicker-calendar {
            display: none;
        }
<?php } else { ?>
        /*tahun*/
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
<?php } ?>
</style>

<script type="text/javascript">
    $(document).ready(function() {
<?php if ($periode == 'Semesteran') { ?>
            var tahun = $("#tahun").val();
            var jenis = '<?= $jenis ?>';
            $('#tampil_grafik').load("<?php echo site_url('cetak_laporan/grafik_semesteran/') ?>" + jenis + '/' + tahun);
<?php } else if ($periode == 'Triwulan') { ?>
            var tahun = $("#tahun").val();
            var triwulan = $("#triwulan").val();
            var jenis = '<?= $jenis ?>';
            $('#tampil_grafik').load("<?php echo site_url('cetak_laporan/grafik_triwulan/') ?>" + jenis + '/' + tahun + '/' + triwulan);
<?php } else if ($periode == 'Bulanan') { ?>
            var str = $("#bulan").val();
            // 08/1994
            var bulan = str.substring(0, 2) + '-' + str.substring(3, 7);
            var jenis = '<?= $jenis ?>';
            $('#tampil_grafik').load("<?php echo site_url('cetak_laporan/grafik_bulanan/') ?>" + jenis + '/' + bulan);
<?php } ?>

    });</script>

<script type="text/javascript">
    $(function() {
        $(document).on('click', '#btn-grafik', function() {
//            var str = $("#waktu_a").val();
//            var awal = str.substring(6, 10) + '-' + str.substring(3, 5) + '-' + str.substring(0, 2);
//
//            var str2 = $("#waktu_b").val();
//            var akhir = str2.substring(6, 10) + '-' + str2.substring(3, 5) + '-' + str2.substring(0, 2);
<?php if ($periode == 'Semesteran') { ?>
                var tahun = $("#tahun").val();
                var jenis = '<?= $jenis ?>';
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('cetak_laporan/grafik_semesteran/') ?>" + jenis + '/' + tahun
                            + '/' + $("#kelurahan").val(),
                    success: function(result) {
                        $('#tampil_grafik').html(result);
                    },
                });
<?php } else if ($periode == 'Triwulan') { ?>
                var tahun = $("#tahun").val();
                var triwulan = $("#triwulan").val();
                var jenis = '<?= $jenis ?>';
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('cetak_laporan/grafik_triwulan/') ?>" + jenis + '/' + tahun
                            + '/' + triwulan + '/' + $("#kelurahan").val(),
                    success: function(result) {
                        $('#tampil_grafik').html(result);
                    },
                });
<?php } else if ($periode == 'Bulanan') { ?>
                var str = $("#bulan").val();
                // 08/1994
                var bulan = str.substring(0, 2) + '-' + str.substring(3, 7);
                var jenis = '<?= $jenis ?>';
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('cetak_laporan/grafik_bulanan/') ?>" + jenis + '/' + bulan
                            + '/' + $("#kelurahan").val(),
                    success: function(result) {
                        $('#tampil_grafik').html(result);
                    },
                });
<?php } ?>
        });
    });
</script>

<section class="content">
    <div class="row">          
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="col-lg-12" style="text-align: right">
                        <a href="<?= site_url() ?>/dashboard"
                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br><br>
                    </div>
                    <div class="col-lg-12">
                        <div id='x'class="form-horizontal"> 
                            <br>
                            <div class="form-group">
                                <label for="country" class="col-sm-2">Kelurahan</label>
                                <div class="col-sm-4">
                                    <?php echo $form_kelurahan; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-2">Periode</label>
                                <div class="col-sm-2">
                                    <?php if ($periode == 'Bulanan') { ?>
                                        <input name="bulan" id="bulan" type="text" class="form-control number date-picker" required
                                               value="<?= date('m') . '/' . date('Y') ?>" autocomplete="off">
                                           <?php } else { ?>
                                        <input name="tahun" id="tahun" type="text" class="form-control number date-picker" required
                                               value="<?= date('Y') ?>" autocomplete="off">
                                           <?php } ?>
                                </div>
                                <?php if ($periode == 'Triwulan') { ?>
                                    <label class="col-sm-1 control-label">Triwulan</label>
                                    <div class="col-sm-1">
                                        <select  class="form-control"  name="triwulan" id="triwulan" required="">
                                            <option value="I">I</option>
                                            <option value="II">II</option>
                                            <option value="III">III</option>
                                            <option value="IV">IV</option>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="col-sm-2">
                                    <button type="submit" id="btn-grafik" class="btn_simpan btn btn-success">
                                        <i class="fa fa-chart"></i></i>  Grafik</button>
                                </div>
                            </div>
                            <!--                        <div class="form-group">
                                                        <div class="col-sm-7" style="text-align: right">
                                                            <button type="submit" id="btn-grafik" class="btn_simpan btn btn-success">
                                                                <i class="fa fa-chart"></i></i>  Grafik</button>
                                                        </div>
                                                    </div>-->
                            <div class="col-sm-12">
                                <div id="tampil_grafik">
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
</section><!-- /.content -->


