<!-- START TAMPIL MODAL -->
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
            var id = "<?= $this->uri->segment(3) ?>"
            var parameter = new FormData(this);
            $('.btn_simpan').prop('disabled', true);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_infrastruktur/save/') ?>" + id,
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
                url: "<?php echo site_url('pengguna/delete/') . '/' ?>" + $(this).attr('id'),
                success: function(result) {
                    document.getElementById('tampil_form').innerHTML = result;
                    $('#list_data').load("<?php echo site_url('pengguna/list_data') ?>");
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
                        <div class="row">
                            <input name="id_jenis_infrastruktur" type="hidden" value="<?= $id_jenis_infra ?>">
                            <label for="" class="col-sm-2 control-label">Kelurahan</label>
                            <div class="col-sm-6">
                                <select name="kelurahan" class="select2_single form-control text-uppercase" required>
                                    <option value="">PILIH</option>
                                    <?php
                                    foreach ($data_kelurahan as $rows_kelurahan) {
                                        if (isset($data_infra)) {
                                            if ($rows_kelurahan->id_kel == $data_infra->id_kelurahan) {
                                                $selected = "selected";
                                            } else {
                                                $selected = "";
                                            }
                                        } else {
                                            $selected = "";
                                        }
                                        echo '<option value="' . $rows_kelurahan->id_kel . '" ' . $selected . '>' . $rows_kelurahan->kode_kel . ' - ' . $rows_kelurahan->nama_kel . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-6">
                                <input name="alamat" type="text" class="form-control" placeholder="Jl. xxx" value="<?= ((isset($data_infra)) ? $data_infra->alamat : "") ?>" required>
                            </div>
                            <label class="col-sm-1 text-right control-label">Rt</label>
                            <div class="col-sm-1">
                                <input name="rt" type="text" class="number form-control" placeholder="000" maxlength="3" value="<?= ((isset($data_infra)) ? $data_infra->rt : "") ?>">
                            </div>
                            <label class="col-sm-1 text-right control-label">Rw</label>
                            <div class="col-sm-1">
                                <input name="rw" type="text" class="number form-control" placeholder="000" maxlength="3" value="<?= ((isset($data_infra)) ? $data_infra->rw : "") ?>">
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Panjang</label>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input name="panjang" type="text" class="number form-control" placeholder="00.00" value="<?= ((isset($data_infra)) ? $data_infra->panjang : "") ?>">
                                    <div class="input-group-addon">Meter</div>
                                </div>
                            </div>
                            <label class="col-sm-2 control-label text-right">Lebar</label>
                            <div class="col-sm-2">
                                <div class="input-group">
                                    <input name="lebar" type="text" class="number form-control" placeholder="00.00" value="<?= ((isset($data_infra)) ? $data_infra->lebar : "") ?>">
                                    <div class="input-group-addon">Meter</div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">

                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Kondisi</label>
                            <div class="col-sm-10">
                                <?php
                                foreach ($jenis_kondisi as $rows_kond) {
                                    if (isset($data_infra)) {
                                        if ($rows_kond->id_jenis_kondisi == $data_infra->id_jenis_kondisi) {
                                            $checked = "checked";
                                        } else {
                                            $checked = "";
                                        }
                                    } else {
                                        $checked = "";
                                    }
                                    echo '<label class="radio-inline">';
                                    echo '<input type="radio" name="kondisi" value="' . $rows_kond->id_jenis_kondisi . '" ' . $checked . '>' . ucwords($rows_kond->nama_kondisi);
                                    echo '</label>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Material</label>
                            <div class="col-sm-10">
                                <?php
                                if (count($jenis_material) > 0) {
                                    foreach ($jenis_material as $rows_material) {
                                        if (isset($data_infra)) {
                                            if ($rows_material->id_material == $data_infra->id_material) {
                                                $checked = "checked";
                                            } else {
                                                $checked = "";
                                            }
                                        } else {
                                            $checked = "";
                                        }
                                        echo '<label class="radio-inline">';
                                        echo '<input type="radio" name="material" value="' . $rows_material->id_material . '" ' . $checked . '>' . ucwords($rows_material->nama_material);
                                        echo '</label>';
                                    }
                                } else {
                                    echo "<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i>Jenis material belum diisi, mohon diisi terlebih dahulu</font>";
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Foto 1</label>
                            <div class="col-sm-4">
                                <input type="file" name="foto1" class="form-control" onchange="validasi_foto(this, 'foto1', 'validasi_foto1')">
                                <?php
                                if (isset($data_infra) && $data_infra->foto1 != '') {
                                    echo "<a href='javascript:show_image(`$data_infra->foto1`)'>Lihat Gambar</a>";
                                } else if (isset($data_infra) && $data_infra->foto1 == '') {
                                    echo "<font style='color:#e08e0b'>Gambar 1 belum ada</font>";
                                }
                                ?> 
                            </div>
                            <div id="validasi_foto1" class="col-md-6">Format file (.jpeg, .jpg, .png)</div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Foto 2</label>
                            <div class="col-sm-4">
                                <input type="file" name="foto2" class="form-control" onchange="validasi_foto(this, 'foto2', 'validasi_foto2')">
                                <?php
                                if (isset($data_infra) && $data_infra->foto2 != '') {
                                    echo "<a href='javascript:show_image(`$data_infra->foto2`)'>Lihat Gambar</a>";
                                } else if (isset($data_infra) && $data_infra->foto2 == '') {
                                    echo "<font style='color:#e08e0b'>Gambar 2 belum ada</font>";
                                }
                                ?> 
                            </div>
                            <div id="validasi_foto2" class="col-md-6">Format file (.jpeg, .jpg, .png)</div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Foto 3</label>
                            <div class="col-sm-4">
                                <input type="file" name="foto3" class="form-control" onchange="validasi_foto(this, 'foto3', 'validasi_foto3')" data-buttonText="Your label here.">
                                <?php
                                if (isset($data_infra) && $data_infra->foto3 != '') {
                                    echo "<a href='javascript:show_image(`$data_infra->foto3`)'>Lihat Gambar</a>";
                                } else if (isset($data_infra) && $data_infra->foto3 == '') {
                                    echo "<font style='color:#e08e0b'>Gambar 3 belum ada</font>";
                                }
                                ?> 
                            </div>
                            <div id="validasi_foto3" class="col-md-6">Format file (.jpeg, .jpg, .png)</div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tanggal Pencatatan</label>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' name="tgl_pencatatan" class="form-control" autocomplete="off"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-6">
                                <textarea name="keterangan" class="form-control" rows="3"><?= ((isset($data_infra)) ? $data_infra->keterangan : "") ?></textarea>
                                <!-- <input name="keterangan" type="text" class="form-control" value="<?= ((isset($data_infra)) ? $data_infra->keterangan : "") ?>"> -->
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
                                    <a href="<?= site_url() ?>/kondisi-infrastruktur/<?= $this->uri->segment(2) ?>">
                                        <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                    </a>
                                    <?php
                                    if (isset($data_infra)) {
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