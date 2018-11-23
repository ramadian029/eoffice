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
    $(function () {

        $(".numberbox").keydown(function (e) {
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

<script type="text/javascript">
    $(function () {
        $("#tgl_realisasi").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
//            onClose: function(selectedDate) {
//                $("#akhir").datepicker("option", "minDate", selectedDate);
//            }
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
        var c = document.getElementsByClassName('nom').length;
        var str = "";
        var nominal = parseFloat(accounting.unformat(document.getElementById('nominal').value))
        for (i = 0; i < c; i++) {
            str = parseFloat(accounting.unformat(document.getElementsByClassName('nom')[i].value));
            jumlah += str;
        }
        var sisa = nominal - jumlah;
        document.getElementById('total').value = accounting.formatMoney(jumlah, '', 2, '.', ',');
        document.getElementById('sisa').value = accounting.formatMoney(sisa, '', 2, '.', ',');

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
<!--<style>
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
</style>-->

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

            var anggaran_kecamatan = accounting.unformat($("#nominal").val());
            var anggaran_kelurahan = accounting.unformat($("#total").val());

            if (anggaran_kelurahan > anggaran_kecamatan) {
                alert("Anggaran Kelurahan melebihi batas");
                $("#sisa").focus();
                return false;
            }
            var id = "<?= isset($id) ? $id : "" ?>";
            var parameter = new FormData(this);
            $('.btn_simpan').prop('disabled', true);
            $('#loading').show();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('realisasi_anggaran/save/') ?>" + id,
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
                url: "<?php echo site_url('realisasi_anggaran/delete') . '/' ?>" + $(this).attr('id'),
                success: function (result) {
                    $(".btn_hapus").show();
                    $('.btn_hapus').prop('disabled', false);
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
        $(document).on('change', '#rekening', function () {
            $.post("getRekening", {id_rekening: $("#rekening").val()}, function (data) {
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
                        <input name="id_anggaran_kelurahan" type="hidden" value="<?= isset($anggaran) ? $anggaran->id_anggaran_kelurahan : '-' ?>">
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tahun</label>
                            <div class="col-sm-2">
                                <input name="tahun" type="text" class="form-control number date-picker" readonly=""
                                       autocomplete="off" value="<?= isset($rekening) ? $rekening->tahun : '-' ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Kode Rekening</label>
                            <div class="col-sm-3">
                                <input name="kode_rekening" id="kode_rekening" type="text" class="form-control " readonly required
                                       autocomplete="off" value="<?= isset($rekening) ? $rekening->kode_rekening : '-' ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Uraian</label>
                            <div class="col-sm-3">
                                <input name="uraian" id="uraian" type="text" class="form-control " readonly required
                                       autocomplete="off" value="<?= isset($rekening) ? $rekening->uraian : '-' ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Nominal Anggaran</label>
                            <!--                            <div class="col-sm-1">Rp.</div>-->
                            <div class="col-sm-3">
                                <input id="nominal" name="nominal" type="text" required class="numberbox form-control text-right" readonly=""
                                       value="<?= isset($anggaran->nominal) ? number_format($anggaran->nominal, 2, ",", ".") : 0 ?>">

                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Sisa Anggaran</label>
                            <!--                            <div class="col-sm-1">Rp.</div>-->
                            <div class="col-sm-3">
                                <input id="sisa" name="sisa" type="text" required class="numberbox form-control text-right" readonly=""
                                       value="<?= isset($sisa) ? number_format($sisa, 2, ",", ".") : 0 ?>">

                            </div>
                        </div>
                        <br>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-12 control-label"><u>REALISASI ANGGARAN</u></label>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tanggal Realisasi</label>
                            <div class="col-sm-3">
                                <div class='input-group date'>
                                    <?php
                                    $tgl_realisasi = '';
                                    $tgl = ((isset($realisasi)) ? $realisasi->tgl_realisasi : "");
                                    if ($tgl != '')
                                        $tgl_realisasi = substr($tgl, 8, 2) . '/' .
                                                substr($tgl, 5, 2) . '/' .
                                                substr($tgl, 0, 4);
                                    ?>
                                    <input type="text" name="tgl_realisasi" value="<?= $tgl_realisasi ?>" class="date form-control" 
                                           id="tgl_realisasi" required autocomplete="off">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Jenis SPJ</label>
                            <div class="col-sm-3">
                                <select name="spj" class="select2_single form-control" required>
                                    <option value="">-- Pilih Jenis SPJ --</option>
                                    <?php
                                    $spj = ((isset($realisasi)) ? $realisasi->jenis_spj : "");
                                    $s1 = $s2 = $s3 = "";

                                    if ($spj == 1)
                                        $s1 = 'selected';
                                    if ($spj == 2)
                                        $s2 = 'selected';
                                    if ($spj == 3)
                                        $s3 = 'selected';
                                    ?>
                                    <option value="1" <?= $s1 ?>>SPJ - LS Gaji</option>
                                    <option value="2" <?= $s2 ?>>SPJ - LS Barang - Jasa</option>
                                    <option value="3" <?= $s3 ?>>SPJ UP / GU / TU</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Nominal Realisasi</label>
                            <div class="col-sm-3">
                                <input id="realisasi" name="realisasi" type="text" required class="numberbox form-control text-right nom" onkeyup="formatangka(this);" 
                                       value="<?= isset($realisasi) ? number_format($realisasi->nominal_realisasi, 2, ",", ".") : 0 ?>"
                                       onchange='sub_total();'>                                
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">PPN</label>
                            <div class="col-sm-3">
                                <input id="ppn" name="ppn" type="text" required class="numberbox form-control text-right nom" onkeyup="formatangka(this);" 
                                       value="<?= isset($realisasi) ? number_format($realisasi->nominal_ppn, 2, ",", ".") : 0 ?>"
                                       onchange='sub_total();'>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">PPh 4</label>
                            <div class="col-sm-3">
                                <input id="pph4" name="pph4" type="text" required class="numberbox form-control text-right nom" onkeyup="formatangka(this);" 
                                       value="<?= isset($realisasi) ? number_format($realisasi->nominal_pph4, 2, ",", ".") : 0 ?>"
                                       onchange='sub_total();'>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">PPh 21</label>
                            <div class="col-sm-3">
                                <input id="pph21" name="pph21" type="text" required class="numberbox form-control text-right nom" onkeyup="formatangka(this);" 
                                       value="<?= isset($realisasi) ? number_format($realisasi->nominal_pph21, 2, ",", ".") : 0 ?>"
                                       onchange='sub_total();'>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">PPh 22</label>
                            <div class="col-sm-3">
                                <input id="pph22" name="pph22" type="text" required class="numberbox form-control text-right nom" onkeyup="formatangka(this);" 
                                       value="<?= isset($realisasi) ? number_format($realisasi->nominal_pph22, 2, ",", ".") : 0 ?>"
                                       onchange='sub_total();'>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">PPh 23</label>
                            <div class="col-sm-3">
                                <input id="pph23" name="pph23" type="text" required class="numberbox form-control text-right nom" onkeyup="formatangka(this);" 
                                       value="<?= isset($realisasi) ? number_format($realisasi->nominal_pph23, 2, ",", ".") : 0 ?>"
                                       onchange='sub_total();'>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">TOTAL</label>
                            <div class="col-sm-3">
                                <input id="total" type="text" required class="form-control text-right" readonly=""
                                       value="<?= isset($total) ? number_format($total, 2, ",", ".") : 0 ?>">
                            </div>
                        </div>
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
                                    <a href="javascript:window.history.go(-1);">
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




<!--<script type="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            locale: 'id', //Contoh Bahasa Indonesia
        });
    });
</script>-->
