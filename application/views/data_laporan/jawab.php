<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">
    $(function() {
        $("#tgl_laporan").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
//            onClose: function(selectedDate) {
//                $("#akhir").datepicker("option", "minDate", selectedDate);
//            }
        });
    });
</script>

<script type="text/javascript">
    function validasi_foto(value, form_name, validasi_name) {
        // $("#"+parameter).html("<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Tolong pilih foto dengan format .jpg, .jpeg, .png</font>");
        var file = value.files[0];
        var imagefile = file.type;
        var match = ["image/jpeg", "image/png", "image/jpg"];
        if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
            $("#" + validasi_name).html("<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Tolong pilih foto dengan format .jpg, .jpeg, .png</font>");
            $('[name="' + form_name + '"]').val("");
            return false;
        } else {
            $('[name="' + form_name + '"]').html("Format file (.jpeg, .jpg, .png)");
        }
    }

    function show_image(img_url) {
        $('#modal_form').modal('show');
        $("#box-body").html('<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br><img src="' + img_url + '" style="width:100%; height:auto">');
    }
</script>
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
                url: "<?php echo site_url('data_laporan/jawab_db/') ?>" + id,
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
                url: "<?php echo site_url('data_laporan/delete') . '/' ?>" + $(this).attr('id') + '/id_laporan/data_laporan',
                success: function(result) {
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
                        <input type="hidden" name="takok" value="<?= isset($data_laporan->id_laporan) ? $data_laporan->id_laporan : '' ?>"/>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Kelurahan</label>
                            <div class="col-sm-4">
                                <?= $form_kelurahan; ?>
<!--                                <select name="kelurahan" class="select2_single form-control text-uppercase" required>
                                    <option value="">PILIH</option>
                                <?php
//                                foreach ($data_kelurahan as $rows_kelurahan) {
//                                    if ($_SESSION['level'] == 2) {
//                                        $kode = $_SESSION['kode_kelurahan'];
//                                        $id_kelurahan = $this->db->where('kode_kel', $kode)
//                                                        ->get('data_kelurahan')->row()->id_kel;
//                                        if ($rows_kelurahan->id_kel == $id_kelurahan) {
//                                            $selected = "selected";
//                                        } else {
//                                            $selected = "";
//                                        }
//                                    } else {
//                                        $id_kelurahan = ((isset($data_laporan)) ? $data_laporan->id_kelurahan : "");
//                                        if ($rows_kelurahan->id_kel == $id_kelurahan)
//                                            $selected = "selected";
//                                        else
//                                            $selected = "";
//                                    }
//                                    echo '<option value="' . $rows_kelurahan->id_kel . '" ' . $selected . '>' . $rows_kelurahan->kode_kel . ' - ' . $rows_kelurahan->nama_kel . '</option>';
//                                }
                                ?>
                                </select>-->
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-4">
                                <!--<div class="form-group">-->
                                <div class='input-group date'>
                                    <?php
                                    $tgl_laporan = '';
                                    $tgl = ((isset($data_pengisi)) ? $data_pengisi->tanggal : "");

                                    if ($tgl != '')
                                        $tgl_laporan = substr($tgl, 8, 2) . '/' .
                                                substr($tgl, 5, 2) . '/' .
                                                substr($tgl, 0, 4);
                                    ?>
                                    <input type="text" name="tgl_laporan" class="date form-control" 
                                           id="tgl_laporan" value="<?= $tgl_laporan ?>"required>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div  id="F" class="row" style="padding-top:10px">
                            <input type="hidden" name="jml_var" value="<?= $jumlah ?>"/>
                            <label class="col-sm-2 control-label">Variabel</label>
                            <div class="col-lg-6">
                                <div class='table-responsive'> 
                                    <table class="table" width='100%'>
                                        <tr>
                                            <td width="5%">No</td>
                                            <td width="60%" class="text-center">Variabel</td>
                                            <td width="35%" class="text-center">Inputan</td>
                                        </tr>
                                        <?php
                                        $xyz = 1;
                                        foreach ($variabel as $var) {
                                            $nilai = '';
                                            $id_pengisian = '';
                                            if (isset($data_pengisi)) {
                                                $pengisian = $this->db->where("id_pengisi", $data_pengisi->id_pengisi)
                                                                ->where('id_variabel', $var->id_variabel)
                                                                ->from('data_pengisian')->get()->row();
                                                $nilai = ((isset($pengisian)) ? $pengisian->nilai : "");
                                                $id_pengisian = ((isset($pengisian)) ? $pengisian->id_pengisian : "");
                                            }
                                            ?>
                                            <tr id="E<?= $xyz ?>">
                                                <td><?= $xyz ?>. </td>
                                                <td><?= $var->variabel ?></td>
                                                <td><div class="form-group">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control number" placeholder="" 
                                                                   id="nilai<?= $xyz ?>" name="nilai<?= $xyz ?>" 
                                                                   value="<?= $nilai ?>" required="">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_variabel<?= $xyz ?>" 
                                                           value="<?= $var->id_variabel ?>">
                                                    <input type="hidden" name="id_pengisian<?= $xyz ?>" 
                                                           value="<?= $id_pengisian ?>">
                                                </td>
                                            </tr>
                                            <?php
                                            $xyz++;
                                        }
                                        ?>

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
                                        <a href="<?= site_url() ?>/data_laporan/hasil/<?= md5($data_pengisi->id_laporan)?>"
                                           <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                        </a>
                                        <?php
                                        echo '<button type="submit" class="btn_simpan btn btn-warning"><i class="fa fa-edit"></i> EDIT</button>';
                                    } else {
                                        ?>
                                        <a href="<?= site_url() ?>/data_laporan"
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
    $(function() {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            locale: 'id', //Contoh Bahasa Indonesia
        });
    });
</script>