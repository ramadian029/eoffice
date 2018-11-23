<!-- START TAMPIL MODAL -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">-->

<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript">
    $(function() {
        $('.date-picker').datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            //            dateFormat: 'MM yy',
            dateFormat: 'mm/yy',
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
        });
    });
</script>
<style>
    .ui-datepicker-calendar {
        display: none;
    }
</style>

<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function() {
        // NEW FORM
        $(document).on('click', '#btn_tambah_data', function() {
            $('#form_input')[0].reset();
            $("input:text, input:radio, input:file, select").prop("disabled", false);
            $('#btn_tambah_data').hide();
            $('.btn_simpan').show();
        });


        $("input:text, input:radio, select").on("change invalid", function() {
            var textfield = $(this).get(0);
            // hapus dulu pesan yang sudah ada
            textfield.setCustomValidity("");
            if (!textfield.validity.valid) {
                textfield.setCustomValidity("Tidak boleh kosong!");
            }
        });

        // START PROSES SAVE
        $("#form_input").on('submit', function(e) {
            e.preventDefault();
            var id = "<?= isset($id) ? $id : "" ?>";
            var parameter = new FormData(this);
            $('.btn_simpan').prop('disabled', true);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_rekap/save/') . $table . '/' . $where . '/' ?>" + id,
                data: parameter,
                contentType: false, // The content type used when sending data to the server.
                cache: false, // To unable request pages to be cached
                processData: false, // To send DOMDocument or non processed data file it is set to false
                dataType: 'JSON',
                success: function(result) {
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
        $(document).on('click', '.btn_hapus', function() {
            $('.btn_save').prop('disabled', true);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_rekap/delete') . '/' ?>" + $(this).attr('id') + '/<?= $where ?>/<?= $table ?>',
                success: function(result) {
                    $(".btn_hapus").show();
                    $('.btn_hapus').prop('disabled', false);
                    table.ajax.reload(null, false); //reload datatable ajax 
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
        });


    });
</script>


<script type="text/javascript">
    $(function() {
        // START CLEAR VALIDASI
        $(document).on('click', '.form-control', function() {
            document.getElementById('validasi').innerHTML = "";
        });
    });
</script>
<!-- END CLEAR VALIDASI -->
<script type="text/javascript">
    $(document).ready(function() {
        $(".number").keydown(function(e) {
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
                        <!--                        <div class="row"  style="padding-top:10px">
                                                    <label for="" class="col-sm-2 control-label">Kecamatan</label>
                                                    <div class="col-sm-6">
                                                        <select name="kecamatan" class="select2_single form-control text-uppercase" required>
                                                            <option value="1">Gajahmungkur</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                        <div class="row"  style="padding-top:10px">
                                                    <!--<input name="id_jenis_infrastruktur" type="hidden" value="<?= $id_jenis_infra ?>">-->
                            <label for="" class="col-sm-2 control-label">Kelurahan</label>
                            <div class="col-sm-3">
                                <select name="kelurahan" class="select2_single form-control text-uppercase" required>
                                    <option value="">PILIH</option>
                                    <?php
                                    foreach ($data_kelurahan as $rows_kelurahan) {
                                        if ($_SESSION['level'] == 2) {
                                            $kode = $_SESSION['kode_kelurahan'];
                                            $id_kelurahan = $this->db->where('kode_kel', $kode)
                                                            ->get('data_kelurahan')->row()->id_kel;
                                            if ($rows_kelurahan->id_kel == $id_kelurahan) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                        } else {
                                            $id_kelurahan = ((isset($data_rekap)) ? $data_rekap->id_kelurahan : "");
                                            if ($rows_kelurahan->id_kel == $id_kelurahan)
                                                $selected = "selected";
                                            else
                                                $selected = "";
                                        }
                                        echo '<option value="' . $rows_kelurahan->id_kel . '" ' . $selected . '>' . $rows_kelurahan->kode_kel . ' - ' . $rows_kelurahan->nama_kel . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row"  style="padding-top:10px">
                            <label for="" class="col-sm-2 control-label">WNI/WNA</label>
                            <div class="col-sm-3">
                                <select name="wni" class="select2_single form-control text-uppercase" required>
                                    <?php
                                    $wni = ((isset($data_rekap)) ? $data_rekap->wni : "1");
                                    $selw1 = "";
                                    $selw2 = "";

                                    if ($wni == 1)
                                        $selw1 = 'selected';
                                    if ($wni == 0)
                                        $selw2 = 'selected';
                                    ?>
                                    <option value="1" <?= $selw1 ?>>WNI</option>
                                    <option value="0" <?= $selw2 ?>>WNA</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Bulan</label>
                            <div class="col-sm-3">
                                <!--<input name="startDate" id="startDate" class="date-picker" />-->
                                <input name="bulan" type="text" class="form-control number date-picker" required
                                       autocomplete="off" value="<?= ((isset($data_rekap)) ? $data_rekap->bulan : "") ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">

                            <label class="col-sm-2 control-label">Laki-laki</label>
                            <div class="col-sm-2">
                                <input name="laki" type="text" class="form-control number" required
                                       value="<?= ((isset($data_rekap)) ? $data_rekap->laki : "0") ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Perempuan</label>
                            <div class="col-sm-2">
                                <input name="perempuan" type="text" class="form-control number" required
                                       value="<?= ((isset($data_rekap)) ? $data_rekap->perempuan : "0") ?>">
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
                                    <a href="<?= site_url() ?>/data-rekap/<?= $rekap ?>"
                                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                    </a>
                                    <?php
                                    if (isset($data_rekap)) {
                                        echo '<button type="submit" class="btn_simpan btn btn-warning"><i class="fa fa-edit"></i> EDIT</button>';
                                    } else {
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
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            locale: 'id', //Contoh Bahasa Indonesia
        });
    });
</script>