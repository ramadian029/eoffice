<!-- START TAMPIL DATA TABLE -->
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>assets/css/AdminLTE.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/css/_all-skins.css">

<!-- Datetimepicker -->
<link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker-standalone.css') ?>" rel="stylesheet">

<!-- Select2 -->
<link href="<?php echo base_url('assets/plugins/select2/css/select2.min.css') ?>" rel="stylesheet">

<!-- Datatables -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/login-modal.css">

<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo-k.png">

<link rel="stylesheet" href="<?= base_url() ?>assets/css/loading.css">
<script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script> 

<!-- Highchart -->
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/highchart_v6.0.7.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/exporting.js"></script>

<!-- START TAMPIL DATA TABLE -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tampil_grafik').load("<?php echo site_url('grafik/grafikx') ?>");
    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#kelurahan', function() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('grafik/grafikx/') ?>" + $("#kelurahan").val(),
                success: function(result) {
                    $('#tampil_grafik').html(result);
                },
            });
        });
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="col-lg-12" style="text-align: right">
                        <a href="<?= site_url() ?>/dashboard/chart"
                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br><br>
                    </div>
                    <div class="col-lg-12">
                        <?php
                        //if($_SESSION['level'] == 1){
                        ?>
                        <div class="row" style="padding-top:10px">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                <label>KELURAHAN</label>
                                <select id="kelurahan" class="form-control">
                                    <option value="all">SEMUA KELURAHAN</option>
                                    <?php
                                    foreach ($data_kelurahan as $rows) {
                                        echo '<option value="' . $rows->id_kel . '">' . $rows->kode_kel . ' - ' . strtoupper($rows->nama_kel) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php //}   ?>
                        <div id="tampil_grafik">
                        </div>
                    </div>
                </div>
            </div>      
        </div>
    </div>
</section><!-- /.content -->


<!-- jQuery 3 -->
<!--<script src="<?= base_url() ?>assets/js/jquery.min.js"></script>-->

<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/js/adminlte.min.js"></script>

<!-- Datapicker -->
<!--<script href="<?= base_url() ?>assets/js/datepicker.js"></script>-->

<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>



<!-- Datetimepicker -->
<script src="<?= base_url() ?>assets/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/locale/id.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>