<!-- START TAMPIL MODAL -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>-->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">-->
<script src="<?php echo base_url('assets/js/accounting.js') ?>"></script>
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript">
//    Number.prototype.format = function (n, x, s, c) {
//        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
//                num = this.toFixed(Math.max(0, ~~n)).replace(".", ",");
//
//        return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
//    };
    $(function() {
        $("#tahun").datepicker({
            dateFormat: 'yy',  
            changeYear: true,  
            showButtonPanel: true,
            changeMonth: false,
            onClose: function(dateText, inst) {
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }});

        $(".numberbox").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and 
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 188]) !== -1 ||
                    // Allow: Ctrl+A
                            (e.keyCode == 65 && e.ctrlKey === true) ||
                            // Allow: home, end, left, right, down, up
                                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                        // let it happen, don't do anything
                        return;
                    }
                    // Ensure that it is a number and stop the keypress
                    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                        e.preventDefault();
                        $("#jumlah_barang").focus();
                        return false();
                    }
                });
    });

</script>
<!-- START NUMBER FORMAT INPUT -->
<script language="JavaScript">
    function formatangka(objek) {

        objek.value = format_number(objek.value);

//        val = objek.value;
//        b = val.replace(/\./g, "");
//        nominal_gapok = b.replace(",", ".");

//        jkk = parseFloat((nominal_gapok) * 0.3 / 100).format(2, 3, '.');
//        jkm = parseFloat((nominal_gapok) * 0.54 / 100).format(2, 3, '.');
//        jht_perusahaan = parseFloat((nominal_gapok) * 3.7 / 100).format(2, 3, '.');
//        jht_karyawan = parseFloat((nominal_gapok) * 2 / 100).format(2, 3, '.');
//        jpk_perusahaan = parseFloat((nominal_gapok) * 4 / 100).format(2, 3, '.');
//        jpk_karyawan = parseFloat((nominal_gapok) * 1 / 100).format(2, 3, '.');
//        ttl_iuran_karyawan = (parseFloat((nominal_gapok) * 2 / 100) + parseFloat((nominal_gapok) * 1 / 100)).format(2, 3, '.')

        var jumlah = 0;
        var c = document.getElementsByClassName('nom_kel').length;
        var str = "";

        for (i = 0; i < c; i++) {
            str = parseFloat(accounting.unformat(document.getElementsByClassName('nom_kel')[i].value));
            jumlah += str;
        }
        document.getElementById('total').value = accounting.formatMoney(jumlah, '', 2, '.', ',');

    }


    /* Function */
    function format_number(number, prefix, thousand_separator, decimal_separator) {
        var thousand_separator = thousand_separator || '.',
                decimal_separator = decimal_separator || ',',
                regex = new RegExp('[^' + decimal_separator + '\\d]', 'g'),
                number_string = number.replace(regex, '').toString(),
                split = number_string.split(decimal_separator),
                rest = split[0].length % 3,
                result = split[0].substr(0, rest),
                thousands = split[0].substr(rest).match(/\d{3}/g);

        if (thousands) {
            separator = rest ? thousand_separator : '';
            result += separator + thousands.join(thousand_separator);
        }
        result = split[1] != undefined ? result + decimal_separator + split[1] : result;
        return prefix == undefined ? result : (result ? prefix + result : '');
    }
    ;

</script>
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

            var anggaran_kecamatan = accounting.unformat($("#nominal").val());
            var anggaran_kelurahan = accounting.unformat($("#total").val());

            if (anggaran_kelurahan > anggaran_kecamatan) {
                alert("Anggaran Kelurahan melebihi batas");
                return false;
            }
            var id = "<?= isset($id) ? $id : "" ?>";
            var parameter = new FormData(this);
            $('.btn_simpan').prop('disabled', true);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('data_anggaran/save/') ?>" + id,
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
                url: "<?php echo site_url('data_anggaran/delete') . '/' ?>" + $(this).attr('id'),
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
        $(document).on('change', '#rekening', function() {
            $.post("getRekening", {id_rekening: $("#rekening").val()}, function(data) {
                $("#kode_rekening").val(data['kode_rekening']);
                $("#uraian").val(data['uraian']);
            }, "json");
        });
    });

    function sub_total() {

    }
</script>

<!-- Main content -->
<form method="post" id="form_input" enctype="multipart/form-data" >
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
                <div class="box box-danger">
                    <div class="box-body">

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-2">
                                <?php
                                $readonly = "";
//                                var_dump($data_anggaran);
                                if ($id != null) {
                                    $readonly = 'readonly';
                                }
                                ?>
                                <input name="tahun" id="tahun" type="text" class="form-control number date-picker" required <?= $readonly ?>
                                       autocomplete="off" value="<?= ((isset($data_anggaran)) ? $data_anggaran->tahun : date('Y')) ?>">
                            </div>
                        </div>
                        <?php if ($id == null) { ?>
                            <div class="row" style="padding-top: 10px">
                                <label class="col-sm-2 control-label">Cari Rekening</label>
                                <div class="col-sm-3">
                                    <select id="rekening" name="rekening" class="form-control" width="100%" required>
                                        <option value="">Pilih</option>
                                        <?=
                                        ((isset($data_anggaran)) ? "<option value='" . $data_anggaran->id_rekening .
                                                "' selected>" . $data_anggaran->kode_rekening . ' - ' . $data_anggaran->uraian . "</option>" : "")
                                        ?>
                                    </select>
                                </div>
                            </div>
                        <?php } else if ($id != null) {
                            ?>
                            <input type="hidden" name="rekening" value="<?= ((isset($data_anggaran)) ? $data_anggaran->id_rekening : "") ?>">
                            <?php
                        }
                        ?>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Kode Rekening</label>
                            <div class="col-sm-4">
                                <input name="kode_rekening" id="kode_rekening" type="text" class="form-control " readonly required
                                       autocomplete="off" value="<?= ((isset($data_anggaran)) ? $data_anggaran->kode_rekening : '') ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Uraian</label>
                            <div class="col-sm-4">
                                <input name="uraian" id="uraian" type="text" class="form-control " readonly required
                                       autocomplete="off" value="<?= ((isset($data_anggaran)) ? $data_anggaran->uraian : '') ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Nominal Anggaran</label>
                            <!--                            <div class="col-sm-1">Rp.</div>-->
                            <div class="col-sm-3">
                                <input id="nominal" name="nominal" type="text" required class="numberbox form-control text-right" onkeyup="formatangka(this);" 
                                       value="<?= isset($data_anggaran->nominal) ? number_format($data_anggaran->nominal, 2, ",", ".") : 0 ?>">

                            </div>
                        </div>
                        <br>
                        <?php
                        if ($jml_kelurahan > 0) {
                            ?>
                            <div class="row" style="padding-top:10px">
                                <label class="col-sm-12 control-label"><u>ANGGARAN</u></label>
                            </div>
                            <?php
                            $i = 0;
                            $total = 0;
                            foreach ($data_kelurahan AS $kel) {
                                $i++;
                                $id_kel = $kel->id_kel;
                                $anggaran_kel = $this->db->where('id_kelurahan', $id_kel)
                                                ->where('md5(id_anggaran)', $id)
                                                ->where('flag', 0)
                                                ->get('anggaran_kelurahan')->row();

                                $total += isset($anggaran_kel) ? (float) $anggaran_kel->nominal : 0;
                                ?>
                                <div class="row" style="padding-top:10px">
                                    <?php if ($id_kel == 0) { ?>
                                        <label class="col-sm-2 control-label">Kecamatan <?= $kel->nama_kel ?></label>
                                    <?php } else { ?>
                                        <label class="col-sm-2 control-label">Kelurahan <?= $kel->nama_kel ?></label>
                                    <?php } ?>
                                    <div class="col-sm-3">
                                        <input id="nominal_<?= $i ?>" name="nominal_<?= $i ?>" type="text" required class="numberbox form-control text-right nom_kel" onkeyup="formatangka(this);" 
                                               value="<?php
                                               if (strpos(isset($anggaran_kel) ? $anggaran_kel->nominal : 0, '.') != false) {
                                                   echo isset($anggaran_kel) ? number_format($anggaran_kel->nominal, '2', ',', '.') : 0;
                                               } else {
                                                   echo isset($anggaran_kel) ? number_format($anggaran_kel->nominal, '0', ',', '.') : 0;
                                               }
                                               ?>"
                                               onchange='sub_total();'>
                                        <input type="hidden" name="id_kelurahan_<?= $i ?>" value="<?= $id_kel ?>">
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="row" style="padding-top:10px">
                                <label class="col-sm-2 control-label">TOTAL</label>
                                <div class="col-sm-3">
                                    <input id="total" type="text" required class="form-control text-right" readonly=""
                                           value="<?= isset($total) ? number_format($total, 2, ",", ".") : 0 ?>">
                                </div>
                            </div>
                        <?php }
                        ?>
                        <input type="hidden" name="jml_kelurahan" value="<?= $jml_kelurahan ?>">
                        <br><br>
                        <div class="container">				
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-2 text-left">
                                    <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                                    <div id="validasi"></div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="<?= site_url('data_anggaran') ?>"
                                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                    </a>
                                    <?php
                                    if (isset($data_anggaran)) {
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
<script language="javascript">
    $(document).ready(function() {
        $('#rekening').select2({
            // placeholder: 'Masukkan nama karyawan',
            ajax: {
                url: '<?= site_url("Data_anggaran/getListRekening") ?>',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
        });
    });
</script>