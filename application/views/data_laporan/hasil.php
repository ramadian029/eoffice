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
    });</script>

<script>
            $(document).ready(function() {
//    $('.form-control').val('');    

    $('#data_laporan').DataTable({
    columnDefs: [
    {"orderable": false, "targets": 0},
<?php if ($_SESSION['level'] == '2') { ?>
        {"orderable": false, "targets": - 1, "searchable": false}
<?php } ?>
    ],
            responsive: true,
            searching: false
    });
    });
            function con() {
            //var base_url = '<?php echo site_url(); ?>';
            location.href = "<?= site_url('data_laporan/hasil/' . $id_laporan) ?>";
//        $('.form-control').val('');
                    //location.reload();
            }
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
            $(document).on('click', '#btn-download', function() {

    if ($('#waktu_a').val() == '' || $('#waktu_b').val() == ''){
    $('#modal_form2').modal('show');
            $(".title").text("Periode Harap Diisi");
    } else {
kelurahan = $('#kelurahan').val();

            var waktu_a = '-';
            var waktu_b = '-';
            var awal = $('#waktu_a').val();
            var akhir = $('#waktu_b').val();
            if (awal != ''){
    waktu_a = awal.substring(6, 10) + '-' + awal.substring(3, 5) + '-' + awal.substring(0, 2)
    }

    if (akhir != ''){
    waktu_b = akhir.substring(6, 10) + '-' + akhir.substring(3, 5) + '-' + akhir.substring(0, 2)
    }

    if (kelurahan == ''){
        var kelurahan = '-';
    }


    location.href = "<?php echo site_url('data_laporan/excel2/') . $id_laporan ?>" + '/' +
            kelurahan + '/' + waktu_a + '/' + waktu_b;
    }
    });
            // START SHOW IMAGE
            $(document).on('click', '#show_image', function() {
    $('#modal_form').modal('show');
            $(".modal-header").hide();
            $(".box-footer").hide();
            $("#box-body").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br><img src="' + $(this).attr('src') + '" style="width:100%; height:auto">');
    });
    });</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
            $(function() {
    // PROSES DELETE
    $(document).on('click', '.btn_hapus', function() {
    $('.btn_hapus').prop('disabled', true);
            $("#loading").show();
            $.ajax({
    type: 'POST',
            url: "<?php echo site_url('data_laporan/delete_isi') . '/' ?>" + $(this).attr('id'),
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
    });</script>

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
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <div id='x'class="form-horizontal"> 
                                        <form action="<?= site_url('data_laporan/hasil/' . $id_laporan) ?>" method="post">

                                            <div class="form-group">
                                                <label for="country" class="col-sm-12">Kelurahan</label>
                                                <div class="col-sm-12">
                                                    <?php echo $form_kelurahan; ?>

<!--                                                    <select name="kelurahan"  class="form-control">
                                                    <?php if ($_SESSION['level'] == '1') { ?>
                                                                                                                                                                                                                                            <option value="">Semua</option>

                                                        <?php
                                                    }
                                                    foreach ($form_kelurahan as $kel) {

                                                        if ($kel->id_kel == $post_kelurahan)
                                                            $op = "selected";
                                                        else
                                                            $op = "";
                                                        ?>
                                                                                                                                                                                                                                            <option value="<?php echo $kel->id_kel; ?>" <?php echo $op; ?>><?php echo $kel->kode_kel . ' - ' . $kel->nama_kel ?></option>                                        
                                                        <?php
                                                    }
                                                    ?>    
                                                    </select> -->

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="country" class="col-sm-12">Tanggal</label>
                                                <div class="col-lg-5">
                                                    <input type="text" name="waktu_a" value="<?= !empty($waktu_a) ? $waktu_a : '' ?>" class="date form-control" 
                                                           autocomplete="off" id="waktu_a" placeholder="Dari Tanggal">
                                                </div>
                                                <div class="col-lg-1" style="padding-top: 10px"><center>s.d.</center></div>
                                                <div class="col-lg-5">
                                                    <input type="text" name="waktu_b" value="<?= !empty($waktu_b) ? $waktu_b : '' ?>" class="date form-control" 
                                                           autocomplete="off" id="waktu_b" placeholder="Sampai Tanggal">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="LastName" class="col-sm-2 control-label"></label>
                                                <div class="col-sm-4">
                                                    <button type="submit" id="btn-filter" class="btn tombol-simpan">Filter</button>
                                                    <button type="button" id="btn-reset" class="btn btn-default" onclick="con();">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="text-align: right">
                        <!--<a href="<?= site_url() ?>/data_laporan"-->
                        <button type="button" id="btn-download" class="btn_simpan btn btn-success">
                            <i class="fa fa-file-excel-o"></i></i>  Unduh Laporan Excel</button>
                        <!--</a>-->
                        <br>
                    </div>
                    <div class="col-lg-2" style="text-align: left">
                        <a href="<?= site_url() ?>/data_laporan"
                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br>
                    </div>
                    <!--                    <div class="col-lg-6">
                                            <a href="<?= site_url('data_laporan/form') ?>">
                                                <button class="btn_input btn btn-primary"><i class="fa fa-plus-square"></i> TAMBAH DATA</button>
                                            </a>
                                        </div>-->
                    </br>
                    </br>
                    </br>
                    <div class="col-lg-12">
                        <div id="tampil_data" class="col-lg-12 table-responsive" style="border: 0; !important">
                            <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                <thead style="background-color: #ffffff; color:#666;">
                                    <tr>
                                        <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
                                        <th class="text-center">NO</th>
                                        <th>KELURAHAN</th>
                                        <th class="text-center">TANGGAL</th>
                                        <th class="text-center">WAKTU ENTRI</th>
                                        <?php
                                        foreach ($variabel as $var) {
                                            echo '<th class="text-center">' . $var->variabel . '</th>';
                                        }
                                        ?>
                                        <?php if ($_SESSION['level'] != null) { ?>
                                            <th class="text-center">AKSI</th>
                                        <?php } ?>
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
                                                <td><?php echo isset($row->nama_kel) ? $row->nama_kel : ''; ?></td>
                                                <td align="center">
                                                    <?php
                                                    $tgl = $row->tanggal;
                                                    echo substr($tgl, 8, 2) . '/' .
                                                    substr($tgl, 5, 2) . '/' .
                                                    substr($tgl, 0, 4);
                                                    ?>
                                                </td>
                                                
                                                <td align="center">
                                                    <?php
                                                    $waktu = $row->tgl_entry;
                                                    echo substr($waktu, 8, 2) . '/' .
                                                    substr($waktu, 5, 2) . '/' .
                                                    substr($waktu, 0, 4).' '.
                                                            substr($waktu, 11,8);
                                                    ?>
                                                </td>
                                                <?php
                                                foreach ($variabel as $var) {
                                                    $nilai = $this->db->where('id_pengisi', $row->id_pengisi)
                                                                    ->where('id_variabel', $var->id_variabel)
                                                                    ->get('data_pengisian')->row();
//                                                    echo '<td align="center">' . $nilai . '</td>';

                                                    $n = isset($nilai->nilai) ? $nilai->nilai : '0';
                                                    echo '<td align="center">' . $n . '</td>';
                                                }
                                                ?>
                                                <!--<td><?php //echo isset($row->id_unsur) ? $this->convertion->unsur($row->id_unsur) : '';                                                                                        ?></td>-->
                                                <?php if ($_SESSION['level'] != null) { ?>
                                                    <td align="center">
                                                        <a href="<?= site_url('data_laporan/jawab/' . md5($row->id_laporan) . '/' . md5($row->id_pengisi)) ?>" 
                                                           style='color:#f0ad4e' data-target='tooltip' title='Ubah'>
                                                            <i id="<?= md5($row->id_pengisi) ?>" class='fa fa-edit (alias) '></i></a>
                                                        &nbsp;
                                                        <a href='#' style='color:#d9534f' data-target='tooltip' title='Hapus'>
                                                            <i id="<?= md5($row->id_pengisi) ?>" class='btn_delete fa fa-trash'></i></a>
                                                    </td>
                                                <?php } ?>
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

<div id="modal_form2" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="title modal-title"></h4>
                    </div>
                    <div id="box-body" class="box-body">
                        <div class="col-md-12 text-center">
                            <button data-dismiss="modal" id="btn_batal" class="btn pull-center" >OK</button>&nbsp;&nbsp;
                        </div>
                    </div>
                    <!--<div class="box-footer">
                       
                      <div class="col-md-8 text-left">
                           <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                       </div>
                       <div class="col-md-4">
                           <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                       </div>
                   </div>-->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

