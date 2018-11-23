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
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        // $('#tampil_data').load("<?php echo site_url('data_pelayanan/list_data_lahir/') ?>");

        table = $('#table').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "searching": false,
            'info': true,
            'scrollX': true,
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('data_pelayanan/ajax_list_lahir') ?>",
                "type": "POST",
                "data": function(data) {
                    data.nik = $('#nik').val();
                    data.nama = $('#nama').val();
                    data.jenis_kelamin = $('#jenis_kelamin').val();
                    data.wni = $('#wni').val();
                    data.kelurahan = $('#kelurahan').val();
//                    data.jenis_pindah = $('#jenis_pindah').val();
                    data.waktu_a = $('#waktu_a').val();
                    data.waktu_b = $('#waktu_b').val();
                }
            },
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [0], //2 last column (photo)
                    "orderable": false, //set not orderable
                },
            ],
        });

        $('#btn-filter').click(function() { //button filter event click
            table.ajax.reload();  //just reload table
        });
        $('#btn-reset').click(function() { //button reset event click
//            $('#form-filter')[0].reset();
            $(".form-control").val("");
            table.ajax.reload();  //just reload table
        });

    });
</script>

<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // START FORM MODAL DELETE
        $(document).on('click', '.btn_delete', function() {
            $('#modal_form').modal('show');
            $(".title").text("Apakah Anda Ingin Menghapus Data Ini?");
            $(".btn_save").append('<i class="fa fa-trash-o"></i> ');
            $(".btn_save").append('HAPUS');
            $(".btn_save").attr("id", $(this).attr('id'));
            $(".btn_save").removeClass("btn_save").addClass("btn_hapus btn btn-danger");
        });

        // START SHOW IMAGE
        $(document).on('click', '#show_image', function() {
            $('#modal_form').modal('show');
            $(".modal-header").hide();
            $(".box-footer").hide();
            $("#box-body").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br><img src="' + $(this).attr('src') + '" style="width:100%; height:auto">');
        });
    });
</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // PROSES DELETE
        $(document).on('click', '.btn_hapus', function() {
            $('.btn_hapus').prop('disabled', true);
            $("#loading").show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_pelayanan/delete') . '/' ?>" + $(this).attr('id') + '/id_lahir/data_lahir',
                success: function(result) {
                    $(".title").text(result);
                    $(".btn_hapus").hide();
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
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">

<!--                    <a href="<?= site_url('unggah-data-excel-kondisi-infrastruktur/' . $aktif) ?>">
                        <button class="btn_input btn btn-warning"><i class="fa fa-upload"></i> UNGGAH DATA EXCEL</button>
                    </a>
                    <a href="<?= $url_download ?>">
                        <button class="btn_input btn btn-success"><i class="fa fa-download"></i> UNDUH DATA EXCEL</button>
                    </a>-->
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="color: white !important">
                                <div class="panel-heading" style="background-color: #367fa9 !important;font-size: 14px !important;
                                     border-radius: 4px;color: white !important;line-height: 1 !important">
                                    <i class="fa fa-search"></i> FILTER
                                </div>
                            </a>
                            <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <div id='x'class="form-horizontal"> 
                                        <!--<form id="form-filter" class="form-horizontal">-->
                                        <div class="form-group">
                                            <label for="country" class="col-sm-12">Nama</label>
                                            <div class="col-sm-12">
                                                <input type="text" name="nama" value="" class="form-control" id="nama" placeholder="Nama">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-sm-12">Jenis Kelamin</label>
                                            <div class="col-lg-12">
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                    <option value="" selected="">Semua</option>
                                                    <option value="1">Laki-laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-sm-12">WNI / WNA</label>
                                            <div class="col-lg-12">
                                                <select name="wni" id="wni" class="form-control">
                                                    <option value="" selected="">Semua</option>
                                                    <option value="1">WNI</option>
                                                    <option value="0">WNA</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-sm-12">Kelurahan</label>
                                            <div class="col-sm-12">
                                                <?php echo $form_kelurahan; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="country" class="col-sm-12">Tanggal Entri</label>
                                            <div class="col-lg-5">
                                                <input type="text" name="waktu_a" value="" class="date form-control" id="waktu_a" placeholder="Dari Tanggal">
                                            </div>
                                            <div class="col-lg-1" style="padding-top: 10px"><center>s.d.</center></div>
                                            <div class="col-lg-5">
                                                <input type="text" name="waktu_b" value="" class="date form-control" id="waktu_b" placeholder="Sampai Tanggal">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<label for="LastName" class="col-sm-2 control-label"></label>-->
                                            <div class="col-sm-4">
                                                <button type="submit" id="btn-filter" class="btn tombol-simpan">Filter</button>
                                                <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" style="text-align: right">
                        <a href="<?= site_url('tambah-data-pelayanan/lahir') ?>">
                            <button class="btn_input btn btn-primary"><i class="fa fa-plus-square"></i> TAMBAH DATA</button>
                        </a>
                    </div>
                    </br>
                    </br>
                     <div class="col-lg-12">
                    <div id="tampil_data" class="col-lg-12">
                        <table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                            <thead style="background-color: #ffffff; color:#666;">
                                <tr>
                                    <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                    <th>NO</th>
                                    <th>NAMA ANAK</th>
                                    <th>NAMA AYAH</th>
                                    <th>NAMA IBU</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>WNI/WNA</th>
                                    <!--<th>TEMPAT LAHIR</th>-->
                                    <th>TANGGAL LAHIR</th>
                                    <th>TEMPAT LAHIR</th>
                                    <th>KETERANGAN</th>
                                    <th class="text-center">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>

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

