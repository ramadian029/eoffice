<!-- START TAMPIL DATA TABLE -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#tampil_grafik').load("<?php echo site_url('grafik/grafik') ?>");
    });
</script>

<script type="text/javascript">
    $(function(){
        $(document).on('change','#kelurahan',function(){
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('grafik/grafik/') ?>"+$("#kelurahan").val(),
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
                        <a href="<?= site_url() ?>/dashboard"
                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br><br>
                    </div>
                    <div class="col-lg-12">
                    <?php
                        if($_SESSION['level'] == 1){
                    ?>
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
                    <?php   }   ?>
                    <div id="tampil_grafik">
                    </div>
                </div>
                </div>
            </div>      
        </div>
    </div>
</section><!-- /.content -->


