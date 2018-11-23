<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">
    $(function() {
        $("#tgl_lahir").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd/mm/yy",
//            onClose: function(selectedDate) {
//                $("#akhir").datepicker("option", "minDate", selectedDate);
//            }
        });
        $("#tgl_meninggal").datepicker({
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
                url: "<?php echo site_url('data_pelayanan/save_mati/') ?>" + id,
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
                url: "<?php echo site_url('data_pelayanan/delete') . '/' ?>" + $(this).attr('id') + '/id_mati/data_mati',
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

        $("#wni").change(function() {
            var str = $(this).val();
            if (str == 1) {
                $('.nik').show();
//                $("#nik").attr("required", '');
            } else if (str == 0) {
                $('.nik').hide();
//                $("#nik").removeAttr("required");
            }
        });
    });</script>
<!-- Main content -->
<form method="post" id="form_input" enctype="multipart/form-data" >
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
                <div class="box box-danger">
                    <div class="box-body">
                        <div class="row"  style="padding-top:10px">
                               <label class="col-sm-12 control-label"><span style="color: red"><i>*) Wajib diisi </i></span></label>
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> WNI/WNA</label>
                            <div class="col-sm-6">
                                <select name="wni" id="wni" class="select2_single form-control text-uppercase" required>
                                    <?php
                                    $wni = ((isset($data_layanan)) ? $data_layanan->wni : "1");
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
                        <div class="row nik" style="padding-top:10px">
                            <label class="col-sm-2 control-label"><span style="color: red">* </span> NIK</label>
                            <div class="col-sm-6">
                                <input name="nik" id="nik" type="text" class="form-control" maxlength="16"
                                       value="<?= ((isset($data_layanan)) ? $data_layanan->nik : "") ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label"><span style="color: red">* </span> Nama</label>
                            <div class="col-sm-6">
                                <input name="nama" type="text" class="form-control" required
                                       value="<?= ((isset($data_layanan)) ? $data_layanan->nama : "") ?>">
                            </div>
                        </div>
                        <div class="row"  style="padding-top:10px">
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select name="jenis_kelamin" class="select2_single form-control text-uppercase" required>
                                    <?php
                                    $jk = ((isset($data_layanan)) ? $data_layanan->jenis_kelamin : "");
                                    $selj1 = "";
                                    $selj2 = "";

                                    if ($jk == 1)
                                        $selj1 = 'selected';
                                    if ($jk == 2)
                                        $selj2 = 'selected';
                                    ?>
                                    <option value="1" <?= $selj1 ?>>Laki-laki</option>
                                    <option value="2" <?= $selj2 ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label"><span style="color: red">* </span> Tempat Lahir</label>
                            <div class="col-sm-6">
                                <input name="tempat_lahir" type="text" class="form-control" required
                                       value="<?= ((isset($data_layanan)) ? $data_layanan->tempat_lahir : "") ?>">
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label"><span style="color: red">* </span> Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <!--<div class="form-group">-->
                                <div class='input-group date'>
                                    <?php
                                    $tgl_lahir = '';
                                    $tgl = ((isset($data_layanan)) ? $data_layanan->tgl_lahir : "");
                                    if ($tgl != '')
                                        $tgl_lahir = substr($tgl, 8, 2) . '/' .
                                                substr($tgl, 5, 2) . '/' .
                                                substr($tgl, 0, 4);
                                    ?>
                                    <input type="text" name="tgl_lahir" value="<?= $tgl_lahir ?>" class="date form-control" 
                                           id="tgl_lahir" required autocomplete="off">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label"><span style="color: red">* </span> Tanggal Meninggal</label>
                            <div class="col-sm-6">
                                <!--<div class="form-group">-->
                                <div class='input-group date'>
                                    <?php
                                    $tgl_meninggal = '';
                                    $tgl2 = ((isset($data_layanan)) ? $data_layanan->tgl_meninggal : "");
                                    if ($tgl2 != '')
                                        $tgl_meninggal = substr($tgl, 8, 2) . '/' .
                                                substr($tgl, 5, 2) . '/' .
                                                substr($tgl, 0, 4);
                                    ?>
                                    <input type="text" name="tgl_meninggal" value="<?= $tgl_meninggal ?>" class="date form-control" 
                                           id="tgl_meninggal" required autocomplete="off">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row"  style="padding-top:10px">
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> Pendidikan</label>
                            <div class="col-sm-6">
                                <!--<select name="pendidikan" class="select2_single form-control text-uppercase" required>-->
                                <?php
                                $opt_pendidikan[''] = 'PILIH';
                                $opt_pendidikan['TIDAK/BELUM SEKOLAH'] = 'TIDAK/BELUM SEKOLAH';
                                $opt_pendidikan['BELUM TAMAT SD'] = 'BELUM TAMAT SD';
                                $opt_pendidikan['SD/SEDERAJAT'] = 'SD/SEDERAJAT';
                                $opt_pendidikan['SLTP/SEDERAJAT'] = 'SLTP/SEDERAJAT';
                                $opt_pendidikan['SLTA/SEDERAJAT'] = 'SLTA/SEDERAJAT';
                                $opt_pendidikan['DIPLOMA I/II'] = 'DIPLOMA I/II';
                                $opt_pendidikan['AKADEMI/DIPLOMA III/S. MUDA'] = 'AKADEMI/DIPLOMA III/S. MUDA';
                                $opt_pendidikan['DIPLOMA IV/STRATA I'] = 'DIPLOMA IV/STRATA I';
                                $opt_pendidikan['STRATA II'] = 'STRATA II';
                                $opt_pendidikan['STRATA III'] = 'STRATA III';


                                echo form_dropdown('pendidikan', $opt_pendidikan, ((isset($data_layanan)) ? $data_layanan->pendidikan : ""), 'id="pendidikan" class="select2_single form-control text-uppercase" required');
                                ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="row"  style="padding-top:10px">
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> Pekerjaan</label>
                            <div class="col-sm-6">
                                <!--<select name="pendidikan" class="select2_single form-control text-uppercase" required>-->
                                <?php
//WIRASWASTA, PEDAGANG, GURU, 
//KARYAWAN SWASTA, PETANI/PERKEBUNAN, PEGAWAI NEGERI SIPIL (PNS), 
//PENSIUNAN, PELAJAR/MAHASISWA, MENGURUS RUMAH TANGGA, 
// LAIN-LAIN
                                $opt_pekerjaan[''] = 'PILIH';

                                $opt_pekerjaan['Akuntan'] = 'Akuntan';
                                $opt_pekerjaan['Anggota BPK'] = 'Anggota BPK';
                                $opt_pekerjaan['Anggota DPD'] = 'Anggota DPD';
                                $opt_pekerjaan['Anggota DPRD Kabupaten / Kota'] = 'Anggota DPRD Kabupaten / Kota';
                                $opt_pekerjaan['Anggota DPRD Propinsi'] = 'Anggota DPRD Propinsi';
                                $opt_pekerjaan['Anggota DPR-RI'] = 'Anggota DPR-RI';
                                $opt_pekerjaan['Anggota Kabinet / Kementerian'] = 'Anggota Kabinet / Kementerian';
                                $opt_pekerjaan['Anggota Mahkamah Konstitusi'] = 'Anggota Mahkamah Konstitusi';
                                $opt_pekerjaan['Apoteker'] = 'Apoteker';
                                $opt_pekerjaan['Arsitek'] = 'Arsitek';
                                $opt_pekerjaan['Belum / Tidak Bekerja'] = 'Belum / Tidak Bekerja';
                                $opt_pekerjaan['Biarawati'] = 'Biarawati';
                                $opt_pekerjaan['Bidan'] = 'Bidan';
                                $opt_pekerjaan['Bupati'] = 'Bupati';
                                $opt_pekerjaan['Buruh Harian Lepas'] = 'Buruh Harian Lepas';
                                $opt_pekerjaan['Buruh Nelayan / Perikanan'] = 'Buruh Nelayan / Perikanan';
                                $opt_pekerjaan['Buruh Peternakan'] = 'Buruh Peternakan';
                                $opt_pekerjaan['Buruh Tani / Perkebunan'] = 'Buruh Tani / Perkebunan';
                                $opt_pekerjaan['Dokter'] = 'Dokter';
                                $opt_pekerjaan['Dosen'] = 'Dosen';
                                $opt_pekerjaan['Duta Besar'] = 'Duta Besar';
                                $opt_pekerjaan['Gubernur'] = 'Gubernur';
                                $opt_pekerjaan['Guru'] = 'Guru';
                                $opt_pekerjaan['Imam Masjid'] = 'Imam Masjid';
                                $opt_pekerjaan['Industri'] = 'Industri';
                                $opt_pekerjaan['Juru Masak'] = 'Juru Masak';
                                $opt_pekerjaan['Karyawan BUMD'] = 'Karyawan BUMD';
                                $opt_pekerjaan['Karyawan BUMN'] = 'Karyawan BUMN';
                                $opt_pekerjaan['Karyawan Honorer'] = 'Karyawan Honorer';
                                $opt_pekerjaan['Karyawan Swasta'] = 'Karyawan Swasta';
                                $opt_pekerjaan['Kepala Desa'] = 'Kepala Desa';
                                $opt_pekerjaan['Kepolisian RI'] = 'Kepolisian RI';
                                $opt_pekerjaan['Konstruksi'] = 'Konstruksi';
                                $opt_pekerjaan['Konsultan'] = 'Konsultan';
                                $opt_pekerjaan['Mekanik'] = 'Mekanik';
                                $opt_pekerjaan['Mengurus Rumah Tangga'] = 'Mengurus Rumah Tangga';
                                $opt_pekerjaan['Nelayan / Perikanan'] = 'Nelayan / Perikanan';
                                $opt_pekerjaan['Notaris'] = 'Notaris';
                                $opt_pekerjaan['Paraji'] = 'Paraji';
                                $opt_pekerjaan['Paranormal'] = 'Paranormal';
                                $opt_pekerjaan['Pastur'] = 'Pastur';
                                $opt_pekerjaan['Pedagang'] = 'Pedagang';
                                $opt_pekerjaan['Pegawai Negeri Sipil'] = 'Pegawai Negeri Sipil';
                                $opt_pekerjaan['Pelajar / Mahasiswa'] = 'Pelajar / Mahasiswa';
                                $opt_pekerjaan['Pelaut'] = 'Pelaut';
                                $opt_pekerjaan['Pembantu Rumah Tangga'] = 'Pembantu Rumah Tangga';
                                $opt_pekerjaan['Penata Busana'] = 'Penata Busana';
                                $opt_pekerjaan['Penata Rambut'] = 'Penata Rambut';
                                $opt_pekerjaan['Penata Rias'] = 'Penata Rias';
                                $opt_pekerjaan['Pendeta'] = 'Pendeta';
                                $opt_pekerjaan['Peneliti'] = 'Peneliti';
                                $opt_pekerjaan['Pengacara'] = 'Pengacara';
                                $opt_pekerjaan['Pensiunan'] = 'Pensiunan';
                                $opt_pekerjaan['Penterjemah'] = 'Penterjemah';
                                $opt_pekerjaan['Penyiar Radio'] = 'Penyiar Radio';
                                $opt_pekerjaan['Penyiar Televisi'] = 'Penyiar Televisi';
                                $opt_pekerjaan['Perancang Busana'] = 'Perancang Busana';
                                $opt_pekerjaan['Perangkat Desa'] = 'Perangkat Desa';
                                $opt_pekerjaan['Perawat'] = 'Perawat';
                                $opt_pekerjaan['Perdagangan'] = 'Perdagangan';
                                $opt_pekerjaan['Petani / Pekebun'] = 'Petani / Pekebun';
                                $opt_pekerjaan['Peternak'] = 'Peternak';
                                $opt_pekerjaan['Pialang'] = 'Pialang';
                                $opt_pekerjaan['Pilot'] = 'Pilot';
                                $opt_pekerjaan['Presiden'] = 'Presiden';
                                $opt_pekerjaan['Promotor Acara'] = 'Promotor Acara';
                                $opt_pekerjaan['Psikiater / Psikolog'] = 'Psikiater / Psikolog';
                                $opt_pekerjaan['Seniman'] = 'Seniman';
                                $opt_pekerjaan['Sopir'] = 'Sopir';
                                $opt_pekerjaan['Tabib'] = 'Tabib';
                                $opt_pekerjaan['Tentara Nasional Indonesia'] = 'Tentara Nasional Indonesia';
                                $opt_pekerjaan['Transportasi'] = 'Transportasi';
                                $opt_pekerjaan['Tukang Batu'] = 'Tukang Batu';
                                $opt_pekerjaan['Tukang Cukur'] = 'Tukang Cukur';
                                $opt_pekerjaan['Tukang Gigi'] = 'Tukang Gigi';
                                $opt_pekerjaan['Tukang Jahit'] = 'Tukang Jahit';
                                $opt_pekerjaan['Tukang Kayu'] = 'Tukang Kayu';
                                $opt_pekerjaan['Tukang Las / Pandai Besi'] = 'Tukang Las / Pandai Besi';
                                $opt_pekerjaan['Tukang Listrik'] = 'Tukang Listrik';
                                $opt_pekerjaan['Tukang Sol Sepatu'] = 'Tukang Sol Sepatu';
                                $opt_pekerjaan['Ustadz / Mubaligh'] = 'Ustadz / Mubaligh';
                                $opt_pekerjaan['Wakil Bupati'] = 'Wakil Bupati';
                                $opt_pekerjaan['Wakil Gubernur'] = 'Wakil Gubernur';
                                $opt_pekerjaan['Wakil Presiden'] = 'Wakil Presiden';
                                $opt_pekerjaan['Wakil Walikota'] = 'Wakil Walikota';
                                $opt_pekerjaan['Walikota'] = 'Walikota';
                                $opt_pekerjaan['Wartawan'] = 'Wartawan';
                                $opt_pekerjaan['Wiraswasta'] = 'Wiraswasta';


                                echo form_dropdown('pekerjaan', $opt_pekerjaan, ((isset($data_layanan)) ? $data_layanan->pekerjaan : ""), 'id="pekerjaan" class="select2_single form-control text-uppercase" required');
                                ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="row"  style="padding-top:10px">
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> Agama</label>
                            <div class="col-sm-6">
                                <!--<select name="pendidikan" class="select2_single form-control text-uppercase" required>-->
                                <?php
                                $opt_agama[''] = 'PILIH';
                                $opt_agama['ISLAM'] = 'ISLAM';
                                $opt_agama['KRISTEN'] = 'KRISTEN';
                                $opt_agama['KATHOLIK'] = 'KATHOLIK';
                                $opt_agama['HINDU'] = 'HINDU';
                                $opt_agama['BUDHA'] = 'BUDHA';
                                $opt_agama['KHONGHUCU'] = 'KHONGHUCU';
                                $opt_agama['Penghayat Kepercayaan'] = 'Penghayat Kepercayaan';
                                $opt_agama['Lainnya'] = 'Lainnya';

                                echo form_dropdown('agama', $opt_agama, ((isset($data_layanan)) ? $data_layanan->agama : ""), 'id="agama" class="select2_single form-control text-uppercase" required');
                                ?>
                                <!--</select>-->
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label"><span style="color: red">* </span> Alamat</label>
                            <div class="col-sm-6">
<!--                                <input name="alamat" type="text" class="form-control" placeholder="Jl. xxx" 
                                       value="<?= ((isset($data_layanan)) ? $data_layanan->alamat : "") ?>" required>-->
                                 <textarea name="alamat" class="form-control" rows="3" 
                                          required><?= ((isset($data_layanan)) ? $data_layanan->alamat : "") ?></textarea>
                            </div>

                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label"></label>
                            <label class="col-sm-1 text-right control-label"><span style="color: red">* </span> Rt</label>
                            <div class="col-sm-1">
                                <input name="rt" type="text" class="number form-control" placeholder="000" maxlength="3" required
                                       value="<?= ((isset($data_layanan)) ? $data_layanan->rt : "") ?>">
                            </div>
                            <label class="col-sm-1 text-right control-label"><span style="color: red">* </span> Rw</label>
                            <div class="col-sm-1">
                                <input name="rw" type="text" class="number form-control" placeholder="000" maxlength="3" required
                                       value="<?= ((isset($data_layanan)) ? $data_layanan->rw : "") ?>">
                            </div>
                        </div>
                        <div class="row"  style="padding-top:10px">
                                                    <!--<input name="id_jenis_infrastruktur" type="hidden" value="<?= $id_jenis_infra ?>">-->
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> Kelurahan</label>
                            <div class="col-sm-6">
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
                                            $id_kelurahan = ((isset($data_layanan)) ? $data_layanan->id_kelurahan : "");
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
                            <label for="" class="col-sm-2 control-label"><span style="color: red">* </span> Kecamatan</label>
                            <div class="col-sm-6">
                                <select name="kecamatan" class="select2_single form-control text-uppercase" disabled required>
                                    <option value="1">Gajahmungkur</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">

                        </div>

                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-6">
                                <textarea name="keterangan" class="form-control" rows="3"><?= ((isset($data_layanan)) ? $data_layanan->keterangan : "") ?></textarea>
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
                                    <a href="<?= site_url() ?>/data-pelayanan/mati"
                                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                                    </a>
                                    <?php
                                    if (isset($data_layanan)) {
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
    $(function() {
        $('#datetimepicker2').datetimepicker({
            format: 'DD/MM/YYYY HH:mm',
            locale: 'id', //Contoh Bahasa Indonesia
        });
    });
</script>