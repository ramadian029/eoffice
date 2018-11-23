<!-- START TAMPIL DATA TABLE -->
<script type="text/javascript">
    /*  
     
     $(document).ready(function() {
     $("#validasi_simpan").hide();
     $('#tampil_data').load("<?php echo site_url('data_infrastruktur/list_data_temp/' . $this->uri->segment(2)) ?>");
     
     }); 
     */
</script>

<script type="text/javascript">
    $(function() {
        $("input:file").on("change invalid", function() {
            var textfield = $(this).get(0);
            // hapus dulu pesan yang sudah ada
            textfield.setCustomValidity("");
            if (!textfield.validity.valid) {
                textfield.setCustomValidity("Silahkan pilih file terlebih dahulu.");
            }
        });

        // START PROSES UPLOAD
//        $(document).on('click', '#btn_upload', function(e) {
        $("#form_upload").on('submit', function(e) {
            e.preventDefault();
            $("#validasi_simpan").hide();
//            var jenis_infrastruktur = "<?= $this->uri->segment(2) ?>"
//            var parameter = new FormData(this);
            $('#btn_upload').prop('disabled', true);
            $('#loading').show();


            var form = $('#form_upload')[0];
            var data = new FormData(form);
            $.ajax({
                url: '<?= site_url('data_pelayanan/import_') . $layanan ?>',
                type: "POST",
                data: data,
                enctype: 'multipart/form-data',
                contentType: false,
                processData: false,
                dataType: "JSON",
//            error: function() {
//                alert('Gagal Upload File CSV');
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#btn_upload').prop('disabled', false);
                    $('#loading').hide();

                    alert(jqXHR.responseText);
                },
                success: function(respon) {
                    if (respon.status == 'berhasil') {
                        $('#btn_upload').prop('disabled', false);
                        $('#loading').hide();
                        alert(respon.alert);
                        location.href = '<?= site_url('data-pelayanan/') . $layanan ?>';
                    } else {
                        alert('Gagal import data.');
                    }


//                    $('#tampil_data').html(result);
                }
            });
        });
    });
</script>

<script type="text/javascript">
    // PROSES SIMPAN
    /*
     $(document).on('click', '#btn_simpan', function() {
     $("#loading_full").show();
     $("#validasi_simpan").show();
     $('#btn_simpan').prop('disabled', true);
     $.ajax({
     type: 'POST',
     url: "<?php echo site_url('data_infrastruktur/simpan_import') ?>",
     success: function(result) {
     document.getElementById('validasi_simpan').innerHTML = result;
     $('#tampil_data').load("<?php echo site_url('data_infrastruktur/list_data_temp/' . $this->uri->segment(2)) ?>");
     $('#btn_simpan').prop('disabled', true);
     $("#loading_full").hide();
     }
     });
     });
     */

    /*
     // PROSES CANCEl
     $(document).on('click', '#btn_cancel', function() {
     $("#validasi_simpan").hide();
     $("#loading_full").show();
     $('#btn_cancel').prop('disabled', true);
     $.ajax({
     type: 'POST',
     url: "<?php echo site_url('data_infrastruktur/cancel_import_excel') ?>",
     success: function(result) {
     document.getElementById('tampil_data').innerHTML = result;
     $('#btn_cancel').prop('disabled', true);
     $("#loading_full").hide();
     }
     });
     });
     */

    /*
     // PROSES CANCEl
     function hapus_temp_item(id) {
     $("#loading_full").show();
     $.ajax({
     type: 'POST',
     url: "<?php echo site_url('data_infrastruktur/hapus_item_temp/') ?>" + id,
     success: function(result) {
     $('#tampil_data').load("<?php echo site_url('data_infrastruktur/list_data_temp/' . $this->uri->segment(2)) ?>", function() {
     $("#loading_full").hide();
     });
     
     }
     });
     }
     */
</script>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="col-lg-12" style="text-align: right">
                        <a href="<?= site_url() ?>/data-pelayanan/<?= $layanan ?>"
                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br><br>
                    </div>
                    <form id="form_upload" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="file" name="file" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" id="btn_upload" class="btn btn-warning"><i class="fa fa-upload"></i> UNGGAH FILE</button>
                                <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                            </div>
                        </div>
                    </form>
                    <!--                    <div class="row" style="padding-top:3%">
                                            <div id="tampil_data" class="col-md-12"></div>
                                        </div>-->
                    <br><br>
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

