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
<script type="text/javascript">
    /*
     $(document).ready(function() {
     // $('#tampil_data').load("<?php echo site_url('data_laporan/list_data_lahir/') ?>");
     
     table = $('#table').DataTable({
     "processing": true, //Feature control the processing indicator.
     "serverSide": true, //Feature control DataTables' server-side processing mode.
     "order": [], //Initial no order.
     "searching": false,
     'info': true,
     'scrollX': true,
     // Load data for the table's content from an Ajax source
     "ajax": {
     "url": "<?php echo site_url('data_laporan/ajax_list') ?>",
     "type": "POST",
     "data": function(data) {
     data.perihal = $('#perihal').val();
     data.resume = $('#resume').val();
     data.kelurahan = $('#kelurahan').val();
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
     */
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
                url: "<?php echo site_url('data_laporan/delete') . '/' ?>" + $(this).attr('id') + '/id_laporan/data_laporan',
                success: function(result) {
                    $(".title").text(result);
                    $(".btn_hapus").hide();
                    $("#loading").hide();
                    $('#modal_form').modal('hide');
                    //table.ajax.reload(null, false); //reload datatable ajax 
                    location.reload();
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

                    <div class="col-lg-6">
                        <a href="<?= site_url('data_laporan/form') ?>">
                            <button class="btn_input btn btn-primary"><i class="fa fa-plus-square"></i> TAMBAH DATA</button>
                        </a>
                    </div>
                    </br>
                    </br>
                    </br>
                    <div class="col-lg-12">
                        <div id="tampil_data" class="col-lg-12">
                            <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                <thead style="background-color: #ffffff; color:#666;">
                                    <tr>
                                        <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                        <th class="text-center">NO</th>
                                        <th>LAPORAN BREAKDOWN</th>
                                        <th class="text-center">AKSI</th>
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
                                                <td><?php echo isset($row->laporan) ? $row->laporan : ''; ?></td>
                                                <!--<td><?php //echo isset($row->id_unsur) ? $this->convertion->unsur($row->id_unsur) : '';                     ?></td>-->
                                                <td align="center">
                <!--                                                    <a href="<?= site_url() ?>/data_laporan/form/<?= md5(sha1($row->id_pertanyaan)) ?>" class="edit"  title="Edit"><img src="<?= base_url('images') ?>/edit.png" style="width:15px;height:15px;"></a>&nbsp;&nbsp;&nbsp;
                                                            <a href="<?= site_url() ?>/data_laporan/delete/<?= md5(sha1($row->id_pertanyaan)) ?>" class="delete"  title="Delete" onclick="return confirm('Yakin hapus data?');"><img src="<?= base_url('images') ?>/delete.png" style="width:15px;height:15px;"></a>-->
                                                    <a href='<?= site_url('data_laporan/jawab/' . md5($row->id_laporan)) ?>'>
                                                        <span class="label label-success">ISI</span></a>&nbsp;&nbsp;&nbsp;
                                                    <a href='<?= site_url('data_laporan/hasil/' . md5($row->id_laporan)) ?>' 
                                                       style='color:#f0ad4e' data-target='tooltip' title='Hasil'>
                                                        <i id="<?= md5($row->id_laporan) ?>" class='fa fa-file-text-o' style='color: #337ab7'></i></a>
                                                    &nbsp;
                                                    <?php if ($_SESSION['level'] == '1') { ?>
<!--                                                        <a href='<?= site_url('data_laporan/cetak/' . md5($row->id_laporan)) ?>' 
                                                           style='color:#4defa9' data-target='tooltip' title='Cetak'>
                                                            <i id="<?= md5($row->id_laporan) ?>" class='fa fa-print'></i></a>
                                                        &nbsp;-->
                                                        <a href="<?= site_url('data_laporan/form/' . md5($row->id_laporan)) ?>" 
                                                           style='color:#f0ad4e' data-target='tooltip' title='Ubah'>
                                                            <i id="<?= md5($row->id_laporan) ?>" class='fa fa-edit (alias) '></i></a>
                                                        &nbsp;
                                                        <a href='#' style='color:#d9534f' data-target='tooltip' title='Hapus'>
                                                            <i id="<?= md5($row->id_laporan) ?>" class='btn_delete fa fa-trash'></i></a>
                                                    <?php } ?>
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

