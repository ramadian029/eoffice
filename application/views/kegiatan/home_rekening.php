<!-- START TAMPIL DATA TABLE -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#list_data').load("<?php echo site_url('data_anggaran/list_data_rekening') ?>");
    });
</script>
<!-- END TAMPIL DATA TABLE -->

<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // START FORM MODAL INPUT
        $(document).on('click', '.btn_input', function() {
            $('#box-body').load("<?php echo site_url('data_anggaran/form_rekening') ?>", function() {
                $('#modal-popup').modal('show');
                $(".modal-title").text("Tambah Data");
                $('#validasi').text('');
                $("#btn_save").show();
                $("#btn_save").prop('disabled', false);
                $("#btn_save").text('');
                $("#btn_save").append('<i class="fa fa-save"></i>');
                $("#btn_save").append('&nbsp;&nbsp;');
                $("#btn_save").append('SIMPAN');
                $("#btn_save").removeAttr('class');
                $("#btn_save").addClass("btn_save btn btn-success pull-right");
                $("#btn_reset").show();
            });
        });

        // START FORM MODAL EDIT
        $(document).on('click', '.btn_edit', function() {
            $('#box-body').load("<?php echo site_url('data_anggaran/form_rekening') ?>/" + $(this).attr('id'), function() {
                $('#modal-popup').modal('show');
                $(".modal-title").text("Form Ubah Data");
                $('#validasi').text('');
                $("#btn_save").show();
                $("#btn_save").prop('disabled', false);
                $("#btn_save").text('');
                $("#btn_save").append('<i class="fa fa-edit (alias)"></i> ');
                $("#btn_save").append('UBAH');
                $("#btn_save").removeAttr('class');
                $("#btn_save").addClass("btn_save btn btn-warning pull-right");
                $("#btn_reset").hide();
            });
        });

        // START FORM MODAL DELETE
        $(document).on('click', '.btn_delete', function() {
            $('#box-body').load("<?php echo site_url('data_anggaran/form_rekening') ?>/" + $(this).attr('id'), function() {
                $('#modal-popup').modal('show');
                $(".modal-title").text("Apakah Anda Ingin Menghapus Data Ini?");
                $('#validasi').text('');
                $("#box-body").find(".form-control").prop("disabled", true);
                $("#btn_reset").hide();
                $("#btn_save").show();
                $("#btn_save").prop('disabled', false);
                $("#btn_save").text('');
                $("#btn_save").append('<i class="fa fa-trash-o"></i> ');
                $("#btn_save").append('HAPUS');
                $("#btn_save").removeAttr('class');
                $("#btn_save").addClass("btn_hapus btn btn-danger pull-right");
            });
        });
    });
</script>
<!-- END TAMPIL MODAL -->


<script type="text/javascript">
    $(function() {
        // START PROSES SAVE
        $(document).on('click', '.btn_save', function() {
            if ($('#kode_rekening').val() == "") {
                $('#validasi').html("<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Kode Rekening Belum Diisi</font>");
                $('#kode_rekening').focus();
                return (false);
            }
            else if ($('#uraian').val() == "") {
                $('#validasi').html("<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Uraian Belum Diisi</font>");
                $('#uraian').focus();
                return (false);
            }

            $('#btn_save').prop('disabled', true);
            $('#btn_batal').prop('disabled', true);
            
            $('#loading').show();
            var param = 'id_rekening=' + $('#id_rekening').val() +
                    '&kode_rekening=' + $('#kode_rekening').val() +
                    '&uraian=' + $('#uraian').val();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_anggaran/save_rekening') ?>",
                data: param,
                success: function(result) {
                    $('#validasi').html(result);
                    $('#list_data').load("<?php echo site_url('data_anggaran/list_data_rekening') ?>");
                    $('#btn_save').prop('disabled', false);
                    $('#loading').hide();
                }
            });
        });

        // PROSES DELETE
        $(document).on('click', '.btn_hapus', function() {
            $('#btn_save').hide();
            $('#btn_batal').hide();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_anggaran/delete_rekening') ?>",
                data: "id_rekening=" + $('#id_rekening').val(),
                success: function(result) {
                    $("#box-body").html('');
                    $(".modal-title").text(result);
                    $('#list_data').load("<?php echo site_url('data_anggaran/list_data_rekening') ?>");
                }
            });
        });

    });
</script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="merah">DATA REKENING</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 col-md-12">
                            <button class="btn_input btn btn-success btn-flat "><i class="fa fa-plus"></i> TAMBAH REKENING</button>
                        </div>
                    </div>            

                    <!-- DATA TABLE -->
                    <div class="row" style="padding-top:10px">
                        <div id="list_data" class="col-md-12 table-responsive"></div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->

<div id="modal-popup" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <div id="box-body" class="box-body">
                    </div>
                    <div class="box-footer">
                        <div id="validasi" class="col-md-6"></div>
                        <div class="col-md-6">
                            &nbsp;&nbsp;
                            <button id="btn_save" class="btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                            <button data-dismiss="modal" id="btn_batal" class="btn pull-right" >BATAL</button>&nbsp;&nbsp;
                            <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->