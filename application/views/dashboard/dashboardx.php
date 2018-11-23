<!-- START TAMPIL DATA TABLE -->
<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/AdminLTE.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/_all-skins.css">

  <!-- Datetimepicker -->
  <link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/plugins/datetimepicker/css/bootstrap-datetimepicker-standalone.css')?>" rel="stylesheet">

  <!-- Select2 -->
  <link href="<?php echo base_url('assets/plugins/select2/css/select2.min.css')?>" rel="stylesheet">

  <!-- Datatables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.css">

  <link rel="stylesheet" href="<?=base_url()?>assets/css/login-modal.css">

  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/images/logo-k.png">
  
  <link rel="stylesheet" href="<?=base_url()?>assets/css/loading.css">
  <script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script> 

  <!-- Highchart -->
  <script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/highchart_v6.0.7.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/exporting.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tampil_grafik').load("<?php echo site_url('grafik/grafik') ?>");
    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#kelurahan', function() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('grafik/grafik/') ?>" + $("#kelurahan").val(),
                success: function(result) {
                    $('#tampil_grafik').html(result);
                },
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#data_laporan').DataTable({
            columnDefs: [
                {"orderable": false, "targets": 0},
                {"orderable": false, "targets": -1, "searchable": false}
            ],
            responsive: true,
        });
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row" style="padding-top:10px">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Statistik Infrastruktur</strong></div>
                                <div class="panel-body"><a href='<?= site_url('dashboard/infrastrukturx') ?>'>
                                        Kondisi Infrastruktur
                                    </a></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Statistik Bulanan Kependudukan</strong></div>
                                <div class="panel-body">
                                    <a href='<?= site_url('cetak_laporan/statistikx/Bulanan/Pelayanan') ?>'>
                                        Statistik Bulanan Pelayanan
                                    </a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Bulanan/Penduduk') ?>'>
                                        Statistik Bulanan Penduduk
                                    </a><br>                                                                        
                                    <a href='<?= site_url('cetak_laporan/statistikx/Bulanan/Kepala_Keluarga') ?>'>
                                        Statistik Bulanan Kepala Keluarga
                                    </a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Bulanan/Penduduk_Wajib_KTP') ?>'>
                                        Statistik Bulanan Penduduk Wajib KTP
                                    </a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Bulanan/Penduduk_Telah_Memiliki_KTP') ?>'>
                                        Statistik Bulanan Penduduk Telah Memiliki KTP
                                    </a>
                                </div>

                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Statistik Triwulan Kependudukan</strong></div>
                                <div class="panel-body">
                                    <a href='<?= site_url('cetak_laporan/statistikx/Triwulan/Pelayanan') ?>'>
                                        Statistik Triwulan Pelayanan
                                    </a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Triwulan/Penduduk') ?>'>
                                        Statistik Triwulan Penduduk
                                    </a><br>                                                                        
                                    <a href='<?= site_url('cetak_laporan/statistikx/Triwulan/Kepala_Keluarga') ?>'>
                                        Statistik Triwulan Kepala Keluarga
                                    </a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Triwulan/Penduduk_Wajib_KTP') ?>'>
                                        Statistik Triwulan Penduduk Wajib KTP
                                    </a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Triwulan/Penduduk_Telah_Memiliki_KTP') ?>'>
                                        Statistik Triwulan Penduduk Telah Memiliki KTP
                                    </a>
                                </div>
                            </div>                            
                        </div> <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Statistik Semesteran Kependudukan</strong></div>
                                <div class="panel-body"><a href='<?= site_url('cetak_laporan/statistikx/Semesteran/Jumlah_Penduduk_Semester_I') ?>'>
                                        Statistik Jumlah Penduduk Semester I</a><br>
                                    <a href='<?= site_url('cetak_laporan/statistikx/Semesteran/Jumlah_Penduduk_Semester_II') ?>'>
                                        Statistik Jumlah Penduduk Semester II
                                    </a></div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading"><strong>Statistik Breakdown</strong></div>
                                <div class="panel-body">
                                    <div id="tampil_data" class="col-lg-12">
                                        <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                            <thead style="background-color: #ffffff; color:#666;">
                                                <tr>
                                                    <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                                    <th class="text-center">NO</th>
                                                    <th>LAPORAN BREAKDOWN</th>
<!--                                                    <th class="text-center">AKSI</th>-->
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
                                                            <td>
                                                                <a href='<?= site_url('data_laporan/breakdownx/' . md5($row->id_laporan)) ?>'>
                                                                    <?php echo isset($row->laporan) ? $row->laporan : ''; ?>
                                                                </a>
                                                            </td>
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
        </div>
    </div>
</section><!-- /.content -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/js/adminlte.min.js"></script>

<!-- Datapicker -->
<script href="<?=base_url()?>assets/js/datepicker.js"></script>

<!-- DataTables -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>



<!-- Datetimepicker -->
<script src="<?=base_url()?>assets/js/moment.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/locale/id.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/plugins/select2/js/select2.full.min.js') ?>"></script>


