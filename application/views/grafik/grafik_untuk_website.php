<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
<script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/jquery/jquery-3.2.1.min.js"></script> 

<!-- Highchart -->
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/highchart_v6.0.7.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets/plugins/highchart/exporting.js"></script>


<!-- START TAMPIL DATA TABLE -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#tampil_grafik').load("<?php echo site_url('grafik_untuk_website/grafik') ?>");
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#kelurahan',function(){
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('grafik_untuk_website/grafik/') ?>"+$("#kelurahan").val(),
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
                    <div class="row" style="padding-top:10px">
                        <div class="col-md-6 col-md-offset-3 text-center">
                            <label>KELURAHAN</label>
                            <select id="kelurahan" class="form-control">
                                <option value="all">SEMUA KELURAHAN</option>
                                <?php
                                    foreach($data_kelurahan as $rows){
                                        echo '<option value="'.$rows->id_kel.'">'.$rows->kode_kel.' - '.strtoupper($rows->nama_kel).'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div id="tampil_grafik">
                    </div>
                </div>
            </div>      
        </div>
    </div>
</section><!-- /.content -->


