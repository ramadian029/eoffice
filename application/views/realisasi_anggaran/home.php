<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
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
    });</script>
<style>
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
</style>
<script type="text/javascript">
    $(document).ready(function () {
        // $('#tampil_data').load("<?php echo site_url('data_anggaran/list_data_kk/') ?>");

        table = $('#table').DataTable({
//            "aaSorting": [[1, 'desc'], [2, 'desc']],
//            "order": [
//                [1, "desc"],
//                [2, "desc"]
//            ],
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.

            "searching": false,
            'info': true,
            'scrollX': true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('realisasi_anggaran/ajax_list') ?>",
                "type": "POST",
                "data": function (data) {
                    data.tahun = $('#tahun').val();
                    data.rekening = $('#rekening').val();
                }
            },
            'language': {
                'url': '<?= base_url("assets/js/dataTables-language-id.json") ?>',
                'sEmptyTable': 'Tidak ada data untuk ditampilkan'
            },
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [0], //2 last column (photo)
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [1],
                    "orderData": [1, 2]
                },
            ],
        });
        $('#btn-filter').click(function () { //button filter event click
            table.ajax.reload(); //just reload table
        });
        $('#btn-reset').click(function () { //button reset event click
//            $('#form-filter')[0].reset();
            $(".form-control").val("");
            table.ajax.reload(); //just reload table
        });
    });</script>

<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function () {
        // START FORM MODAL DELETE
        $(document).on('click', '.btn_delete', function () {
            $('#modal_form').modal('show');
            $(".title").text("Apakah Anda Ingin Menghapus Data Ini?");
            $(".btn_save").append('<i class="fa fa-trash-o"></i> ');
            $(".btn_save").append('HAPUS');
            $(".btn_save").attr("id", $(this).attr('id'));
            $(".btn_save").removeClass("btn_save").addClass("btn_hapus btn btn-danger");
        });
        // START SHOW IMAGE
        $(document).on('click', '#show_image', function () {
            $('#modal_form').modal('show');
            $(".modal-header").hide();
            $(".box-footer").hide();
            $("#box-body").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br><img src="' + $(this).attr('src') + '" style="width:100%; height:auto">');
        });
    });</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function () {
        // PROSES DELETE
        $(document).on('click', '.btn_hapus', function () {
            $('.btn_hapus').prop('disabled', true);
            $("#loading").show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('realisasi_anggaran/delete') . '/' ?>" + $(this).attr('id'),
                success: function (result) {
                    $(".title").text(result);
                    $(".btn_hapus").show();
                    $('.btn_hapus').prop('disabled', false);
                    $("#loading").hide();
                    $('#modal_form').modal('hide');
                    table.ajax.reload(null, false); //reload datatable ajax 
                }
            });
        });
    });
</script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="merah">REALISASI ANGGARAN</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-8" style="padding-top: 20px !important;">
                                        <div id='x'class="form-horizontal"> 
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country" class="col-sm-12">Tahun</label>
                                                <div class="col-sm-12">
                                                    <input name="tahun" id="tahun" type="text" class="form-control number date-picker" required
                                                           autocomplete="off" value="<?= date('Y') ?>">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country" class="col-sm-12">Rekening</label>
                                                <div class="col-sm-12">
                                                    <input name="rekening" id="rekening" type="text" class="form-control" placeholder="Kode Rekening / Uraian"
                                                           autocomplete="off" value="">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                            <div class="form-group">
                                                    <button type="submit" id="btn-filter" class="btn tombol-simpan">Filter</button>
                                                    <button type="button" id="btn-reset" class="btn tombol-simpan">Reset</button>
                                            </div>
                                            </div>

                                        </div>
                        </div>
                        <!--                        <div class="col-lg-6" style="text-align: right">
                                                    <a href="<?= site_url('data_anggaran/form') ?>">
                                                        <button class="btn_input btn btn-primary"><i class="fa fa-plus-square"></i> TAMBAH DATA</button>
                                                    </a>
                                                </div>-->
                    </div>
                    </br>
                    <div class="row" style="padding-top:10px">
                        <div id="list_data" class="col-md-12 table-responsive">
                            <table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap; width:100%">
                                <thead style="background-color: #ffffff; color:#666;">
                                    <tr>
                                        <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                        <th class="text-center">NO</th>
                                        <th class="text-center">TAHUN</th>
                                        <th class="text-center">KODE REKENING</th>
                                        <th class="text-center">URAIAN</th>
                                        <!--<th class="text-center">NOMINAL (RP)</th>-->
                                        <th class="text-center">AKSI</th>
                                    </tr>

                                </thead>
                                <tbody class="text-center">

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
                        <div class="col-md-6 text-left">
                            <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                        <div class="col-md-6">
                            &nbsp;&nbsp;
                            <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                            <button data-dismiss="modal" id="btn_batal" class="btn pull-right" >BATAL</button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

