<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">
    $(function () {
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
                url: "<?php echo site_url('master_monografi/save/') ?>" + id,
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

        $('#H').hide();
        $('#F').hide();
<?php
for ($ab = 1; $ab <= 20; $ab++) {
    ?>
            $('#E<?= $ab ?>').hide();
            $("#variabel_kolom<?= $ab ?>").removeAttr("required");

            $('#G<?= $ab ?>').hide();
            $("#variabel_baris<?= $ab ?>").removeAttr("required");
    <?php
}
?>

        $("#jumlah_kolom").change(function () {
            var str = parseInt($(this).val());
<?php
for ($xx = 1; $xx <= 20; $xx++) {
    ?>
                if (str == '<?= $xx ?>') {
                    $('#F').show();
    <?php
    for ($yy = 1; $yy <= 20; $yy++) {
        if ($xx >= $yy) {
            ?>
                            $('#E<?= $yy ?>').show();
                            $("#variabel_kolom<?= $yy ?>").attr("required", '');
            <?php
        } else {
            ?>
                            $('#E<?= $yy ?>').hide();
                            $("#variabel_kolom<?= $yy ?>").removeAttr("required");
            <?php
        }
    }
    ?>
                }
    <?php
    if ($xx != 20) {
        echo "else";
    }
}
?>

        });

        $("#jumlah_baris").change(function () {
            var str = parseInt($(this).val());
<?php
for ($xx = 1; $xx <= 20; $xx++) {
    ?>
                if (str == '<?= $xx ?>') {
                    $('#H').show();
    <?php
    for ($yy = 1; $yy <= 20; $yy++) {
        if ($xx >= $yy) {
            ?>
                            $('#G<?= $yy ?>').show();
                            $("#variabel_baris<?= $yy ?>").attr("required", '');
            <?php
        } else {
            ?>
                            $('#G<?= $yy ?>').hide();
                            $("#variabel_baris<?= $yy ?>").removeAttr("required");
            <?php
        }
    }
    ?>
                }
    <?php
    if ($xx != 20) {
        echo "else";
    }
}
?>

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
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Nama Laporan</label>
                            <div class="col-sm-6">
                                <input name="laporan" type="text" class="form-control" required
                                       value="<?= ((isset($master_monografi)) ? $master_monografi->laporan : "") ?>">
                            </div>
                        </div>
                        <div  id="E" class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Jumlah Variabel Kolom</label>
                            <div class="col-sm-6">
                                <select  class="form-control"  name="jumlah_kolom" id="jumlah_kolom" required="">
                                    <option value="">Jumlah Variabel Kolom</option>
                                    <?php
                                    for ($zz = 1; $zz <= 20; $zz++) {
                                        ?>
                                        <option value="<?= $zz ?>"><?= $zz ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div  id="F" class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Variabel Kolom</label>
                            <div class="col-lg-6">
                                <div class='table-responsive'> 
                                    <table class="table" width='100%'>
                                        <tr>
                                            <td width="5%">No</td>
                                            <td width="95%" class="text-center">Variabel Kolom</td>
                                        </tr>
                                        <?php for ($z = 1; $z <= 20; $z++) { ?>
                                            <tr id="E<?= $z ?>">

                                                <td><?= $z ?>. </td>
                                                <td><div class="form-group">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control" placeholder="" 
                                                                   id="variabel_kolom<?= $z ?>" name="variabel_kolom<?= $z ?>" value="" required="">
                                                        </div>
                                                    </div></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div  id="G" class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Jumlah Variabel Baris</label>
                            <div class="col-sm-6">
                                <select  class="form-control"  name="jumlah_baris" id="jumlah_baris" required="">
                                    <option value="">Jumlah Variabel Baris</option>
                                    <?php
                                    for ($aa = 1; $aa <= 20; $aa++) {
                                        ?>
                                        <option value="<?= $aa ?>"><?= $aa ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        <div  id="H" class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Variabel Baris</label>
                            <div class="col-lg-6">
                                <div class='table-responsive'> 
                                    <table class="table" width='100%'>
                                        <tr>
                                            <td width="5%">No</td>
                                            <td width="95%" class="text-center">Variabel Baris</td>
                                        </tr>
                                        <?php for ($a = 1; $a <= 20; $a++) { ?>
                                            <tr id="G<?= $a ?>">

                                                <td><?= $a ?>. </td>
                                                <td><div class="form-group">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control" placeholder="" 
                                                                   id="variabel_baris<?= $a ?>" name="variabel_baris<?= $a ?>" value="" required="">
                                                        </div>
                                                    </div></td>
                                            </tr>
                                            <?php
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
                                    <a href="<?= site_url() ?>/master_monografi"
                                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                    </a>
                                    <?php
                                    if (isset($master_monografi)) {
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
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            locale: 'id', //Contoh Bahasa Indonesia
        });
    });
</script>