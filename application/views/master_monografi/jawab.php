<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

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

        $('#periode').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //            dateFormat: 'MM yy',
            dateFormat: 'mm/yy',
            onClose: function (dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });</script>
<style>
    /*    .ui-datepicker-calendar {
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
        }*/

    .ui-datepicker-calendar {
        display: none;
    }
</style>


<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function () {
        // NEW FORM
        $(document).on('click', '#btn_tambah_data', function () {
            $('#form_input')[0].reset();
            $("input:text, input:radio, input:file, select").prop("disabled", false);
            $('#btn_tambah_data').hide();
            $('.btn_simpan').show();
        });


        $("input:text, input:radio, select").on("change invalid", function () {
            var textfield = $(this).get(0);
            // hapus dulu pesan yang sudah ada
            textfield.setCustomValidity("");
            if (!textfield.validity.valid) {
                textfield.setCustomValidity("Tidak boleh kosong!");
            }
        });

        // START PROSES SAVE
        $("#form_input").on('submit', function (e) {
            e.preventDefault();
            var id = "<?= isset($id) ? $id : "" ?>";
            var parameter = new FormData(this);
            $('.btn_simpan').prop('disabled', true);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('master_monografi/jawab_db/') ?>" + id,
                data: parameter,
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                dataType: 'JSON',
                success: function (result) {
                    if (result['status'] == 'sukses') {
                        if (id == '') {
                            $('.btn_simpan').prop('disabled', false);
                            $('.btn_simpan').hide();
                            $("input:text, input:radio, input:file, select").prop("disabled", true);
                            $('#btn_tambah_data').show();
                        }
                    }
                    $('.btn_simpan').prop('disabled', false);
                    $('#loading').hide();
                    $("#validasi").html(result['validasi']);
                }
            });
        });

        // PROSES DELETE
        $(document).on('click', '.btn_hapus', function () {
            $('.btn_save').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('master_monografi/delete') . '/' ?>" + $(this).attr('id') + '/id_laporan/data_laporan',
                success: function (result) {
                    table.ajax.reload(null, false); //reload datatable ajax 
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        });


    });
</script>


<script type="text/javascript">
    $(function () {
        // START CLEAR VALIDASI
        $(document).on('click', '.form-control', function () {
            document.getElementById('validasi').innerHTML = "";
        });
    });
</script>
<!-- END CLEAR VALIDASI -->
<script type="text/javascript">
    $(document).ready(function () {
        $(".number").keydown(function (e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    // Allow: Ctrl+A, Command+A
                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                    }
                });
    });
</script>
<!-- Main content -->
<form method="post" id="form_input" enctype="multipart/form-data" >
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
                <div class="box box-danger">
                    <div class="box-body">
                        <input type="hidden" name="takok" value="<?= isset($master_monografi->id_laporan) ? $master_monografi->id_laporan : '' ?>"/>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Kelurahan</label>
                            <div class="col-sm-5">
                                <?= $form_kelurahan; ?>

                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-5">
                                <?php
                                $readonly = '';
                                isset($id) ? $readonly = 'readonly' : $readonly = '';
                                ?>
                                <input name="periode" id="periode" type="text" class="form-control number date-picker" required <?= $readonly ?>
                                       autocomplete="off" value="<?= isset($post_periode) ? $post_periode : date('m') . '/' . date('Y') ?>">
                            </div>
                        </div>
                        <br><br>
                        <div class="row" style="padding-top:10px">
                            <div class="col-lg-12">
                                <div id="list_data" class="col-md-12 table-responsive">
                                    <input type="hidden" name="jumlah_kolom" value="<?= $jumlah_kolom ?>"/>
                                    <input type="hidden" name="jumlah_baris" value="<?= $jumlah_baris ?>"/>
                                    <table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap; width:100%">
                                        <thead style="background-color: #ffffff; color:#666;">
                                        <td width="5%">NO</td>
                                        <td width="10%" class="text-center">VARIABEL</td>
                                        <?php foreach ($data_kolom AS $kolom) { ?>
                                            <td width="20%" class="text-center"><?= $kolom->variabel ?></td>
                                        <?php } ?>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $n = $y = $x = 0;
                                            foreach ($data_baris AS $baris) {
                                                $y++;
                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $baris->variabel ?></td>
                                                    <?php
                                                    foreach ($data_kolom AS $kolom) {
                                                        $x++;
                                                        $n = $x + $y;

                                                        $nilai = 0;
                                                        $id_pengisian = '';
                                                        if (isset($data_pengisi)) {
                                                            $pengisian = $this->db->where("id_pengisi", $data_pengisi->id_pengisi)
                                                                            ->where('id_variabel', $kolom->id_variabel)
                                                                            ->where('id_variabel2', $baris->id_variabel)
                                                                            ->from('data_pengisian')->get()->row();
                                                            $nilai = ((isset($pengisian)) ? $pengisian->nilai : "0");
                                                            $id_pengisian = ((isset($pengisian)) ? $pengisian->id_pengisian : "0");
                                                        }
                                                        ?>
                                                        <td><?php //echo $x . ' (' . $baris->variabel . ',' . $kolom->variabel . ')'       ?>
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <input type="text" class="form-control number text-right" placeholder="" 
                                                                           id="nilai<?= $x ?>" name="nilai<?= $x ?>" 
                                                                           value="<?= $nilai ?>" required="">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_pengisian<?= $x ?>" 
                                                                   value="<?= $id_pengisian ?>">
                                                            <input type="hidden" name="kolom<?= $x ?>" value="<?= $kolom->id_variabel ?>"/>
                                                            <input type="hidden" name="baris<?= $x ?>" value="<?= $baris->id_variabel ?>"/>
                                                        </td>
                                                    <?php }
                                                    ?>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="container">				
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-8 text-left">
                                    <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                                    <div id="validasi"></div>
                                </div>
                                <div class="col-md-4 text-right">


                                    <?php
                                    if (isset($data_pengisi)) {
                                        ?>
                                        <a href="<?= site_url() ?>/master_monografi/hasil/<?= md5($data_pengisi->id_laporan) ?>"
                                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                        </a>
                                        <?php
                                        echo '<button type="submit" class="btn_simpan btn btn-warning"><i class="fa fa-edit"></i> EDIT</button>';
                                    } else {
                                        ?>
                                        <a href="<?= site_url() ?>/master_monografi"
                                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                        </a>
                                        <?php
                                        echo '<button type="submit" class="btn_simpan btn btn-primary"><i class="fa fa-save"></i> SIMPAN</button>';
                                    }
                                    ?>
                                    <!-- <a href="#"> -->
                                    <button type="button" id="btn_tambah_data" class="btn btn-success" style="display:none"><i class="fa fa-add"></i> TAMBAH DATA</button>
                                    <!-- </a> -->
                                </div>
                            </div>
                        </div><!-- /.box-footer -->
                    </div>      
                </div>
            </div>
    </section><!-- /.content -->
</form>

<div id="modal_form" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div id="box-body" class="box-body"></div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->




<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            locale: 'id', //Contoh Bahasa Indonesia
        });
    });
</script>