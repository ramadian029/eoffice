<!-- START TAMPIL DATA TABLE -->
<!-- START TAMPIL MODAL -->
<link href="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css">
<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-ui-1.9.2.custom.min.js"></script>
<!--<script src="<?= base_url() ?>assets/jquery-ui-1.9.2.custom/js/jquery-1.8.3.js"></script>-->

<script type="text/javascript">

    function verifikasi(con, periode, id_kelurahan) {
        $('.btn_hapus').prop('disabled', true);
        $("#loading").show();

        $.ajax({
            url: "<?php echo site_url('spj_belanja/verifikasi') ?>?con=" + con + "&periode=" + periode,
            type: "POST",
            dataType: "JSON",
            error: function() {
                alert('Terjadi Kesalahan Dalam Database.');
            },
            success: function(respon) {
                if (respon.status == 'berhasil') {
                    $(".btn_hapus").show();
                    $('.btn_hapus').prop('disabled', false);
                    $("#loading").hide();
                    $('#modal_form').modal('hide');
//                    location.href = "<?= site_url('spj_belanja') ?>";
                    location.reload();
                }
            }
        });

    }

    function ver_modal(con, periode) {
        $('#modal_form').modal('show');
        $(".title").text("Apakah Anda Yakin?");
//        $(".btn_save").append('<i class="fa fa-trash-o"></i> ');

        if (con == 0) {
            document.getElementById("btn_save").innerHTML = 'Batalkan Verifikasi';
            $("#btn_save").removeClass("btn_save btn-danger btn-success");
            $("#btn_save").addClass("btn_save btn btn-danger");
        } else if (con == 1) {
            document.getElementById("btn_save").innerHTML = 'Verifikasi';
            $("#btn_save").removeClass("btn_save btn-danger btn-success");
            $("#btn_save").addClass("btn_save btn btn-success");
        }
//        $(".btn_save").attr("id", $(this).attr('id'));
        $("#btn_save").attr("onclick", "verifikasi(" + con + ",'" + periode + "')");


    }
</script>


<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
            <div class="box box-danger">
                <div class="box-body">
                    <?php // echo site_url('realisasi_anggaran').'/form/' . isset($rekening) ? $rekening->tahun : '-' . '/' . isset($rekening) ? md5($rekening->id_rekening) : '-' ?>
                    <div class="col-lg-12" style="text-align: right">
                        <?php
                        $is_verified = $this->convertion->cek_verified($periode);
                        if ($is_verified == 0) {
                            ?>
<!--                            <a class="btn btn-success btn_verifikasi" href="#" 
                               onclick="ver_modal('1', '<?= $periode ?>');">VERIFIKASI</a>-->
                           <?php } else if ($is_verified == 1) {
                               ?>
                            <a class="btn btn-warning btn" 
                               href="<?= site_url('laporan_spj/xls/' . $periode.'/'.$post_kelurahan) ?>"  style="padding: 4px 8px; font-size: 12px"
                             >CETAK LAPORAN</a>
<!--                            <a class="btn btn-danger btn_verifikasi" href="#"  style="padding: 4px 8px; font-size: 12px"
                               onclick="ver_modal('0', '<?= $periode ?>');">BATALKAN VERIFIKASI</a>-->
                               <?php
                           }
                           ?>
                        <!--href="javascript:window.history.go(-1);"-->
                        <a href="<?= site_url('laporan_spj/index/') . $post_tahun . '/' . $post_kelurahan ?>">
                            <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                        </a>
                        <br>
                    </div>
                    </br>
                    </br>
                    <div class="row" style="padding-top:10px">
                        <!--                        <div class="col-lg-12 text-center text-bold">
                                                    SPJ BELANJA ADMINISTRATIF
                                                </div>-->
                        <div class="col-lg-12 text-bold text-uppercase">
                            <table class="table table-bordered table-hover" width="100%">
                                <tr>
                                    <td width="20%">SKPD</td><td><?= $skpd ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Tahun Anggaran</td><td><?= isset($tahun) ? $tahun : '-' ?></td>
                                </tr>
                                <tr>
                                    <td width="20%">Periode</td><td><?= $nm_bulan . ' ' . $tahun ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="padding-top:10px">
                        <div class="col-lg-12"> 
                            <div id="tampil_data" class="table-responsive" style="border: 0; !important">
                                <table id="data_laporan" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
                                    <thead style="background-color: #ffffff; color:#666;" class="text-bold text-center">
                                        <tr>
                                            <td rowspan="2">Kode Rekening</td>
                                            <td rowspan="2">Uraian</td>
                                            <td rowspan="2">Jumlah Anggaran</td>
                                            <td colspan="3">SPJ - LS Gaji</td>
                                            <td colspan="3">SPJ - LS Barang - Jasa</td>
                                            <td colspan="3">SPJ UP / GU / TU</td>
                                            <td rowspan="2">Jumlah SPJ</td>
                                            <td rowspan="2">Sisa Anggaran</td>
                                        </tr>
                                        <tr>
                                            <td>s.d. Bulan Lalu</td>
                                            <td>Bulan Ini</td>
                                            <td>s.d. Bulan Ini</td>
                                            <td>s.d. Bulan Lalu</td>
                                            <td>Bulan Ini</td>
                                            <td>s.d. Bulan Ini</td>
                                            <td>s.d. Bulan Lalu</td>
                                            <td>Bulan Ini</td>
                                            <td>s.d. Bulan Ini</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if ($jumlah > 0) {
                                            $no = 1;
                                            $t_anggaran = $t_spj = $t_sisa = (float) 0;
                                            $t_spj1_a = $t_spj1_b = $t_spj1_c = (float) 0;
                                            $t_spj2_a = $t_spj2_b = $t_spj2_c = (float) 0;
                                            $t_spj3_a = $t_spj3_b = $t_spj3_c = (float) 0;

                                            foreach ($rekening as $row) {
                                                $total_anggaran = (float) isset($row->total_anggaran) ? $row->total_anggaran : '0';
                                                ?>
                                                <tr>
                                                    <td><?= isset($row->kode_rekening) ? $row->kode_rekening : '-' ?></td>
                                                    <td><?= isset($row->uraian) ? $row->uraian : '-' ?></td>
                                                    <td class="text-right"><?= isset($row->total_anggaran) ? number_format($row->total_anggaran, 2, ",", ".") : '0' ?></td>
                                                    <?php
                                                    $id_anggaran_kelurahan = "";

                                                    if ($post_kelurahan != null) {
                                                        $this->db->where('b.id_anggaran_kelurahan', $row->id_anggaran_kelurahan);
                                                        $id_anggaran_kelurahan = $row->id_anggaran_kelurahan;
                                                    }

                                                    $q_realisasi = $this->db->select('a.id_anggaran, b.id_anggaran_kelurahan, b.tgl_realisasi,'
                                                                    . ' b.nominal_realisasi, b.jenis_spj')
                                                            ->join('realisasi_anggaran b', 'b.id_anggaran_kelurahan = a.id_anggaran_kelurahan', 'left')
                                                            ->from('anggaran_kelurahan a')
                                                            ->where('a.flag = 0')
                                                            ->like('b.tgl_realisasi', $periode)
                                                            ->where('b.tgl_realisasi IS NOT NULL', null, false)
                                                            ->where('a.id_anggaran', isset($row->id_anggaran) ? $row->id_anggaran : '-')
                                                            ->get();

                                                    $total_spj = $sisa = $spj1 = $spj2 = $spj3 = (float) 0;
                                                    $spj1x = $spj2x = $spj3x = (float) 0;

                                                    if ($q_realisasi->num_rows() > 0) {
                                                        foreach ($q_realisasi->result() AS $realisasi) {
                                                            $jenis_spj = isset($realisasi->jenis_spj) ? $realisasi->jenis_spj : '';
                                                            $nominal = isset($realisasi->nominal_realisasi) ? (float) $realisasi->nominal_realisasi : (float) 0;

                                                            if ($jenis_spj == 1) {
                                                                $spj1 += $nominal;
                                                            } else if ($jenis_spj == 2) {
                                                                $spj2 += $nominal;
                                                            } else if ($jenis_spj == 3) {
                                                                $spj3 += $nominal;
                                                            }
                                                        }
                                                    }
                                                    $total_spj = $spj1 + $spj2 + $spj3;

                                                    $sd_bulan_ini = $this->convertion->sd_bulan_ini($periode, $row->id_anggaran, $id_anggaran_kelurahan);

                                                    $sisa = $total_anggaran - $sd_bulan_ini['total_spj'];

                                                    $spj1x = $sd_bulan_ini['spj1'] - $spj1;
                                                    $spj2x = $sd_bulan_ini['spj2'] - $spj2;
                                                    $spj3x = $sd_bulan_ini['spj3'] - $spj3;
                                                    ?>
                                                    <td class="text-right"><?= number_format($spj1x, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($spj1, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($sd_bulan_ini['spj1'], 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($spj2x, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($spj2, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($sd_bulan_ini['spj2'], 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($spj3x, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($spj3, 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($sd_bulan_ini['spj3'], 2, ",", ".") ?></td>
                                                    <td class="text-right"><?= number_format($sd_bulan_ini['total_spj'], 2, ",", ".") ?></td>

                                                    <td class="text-right"><?= number_format($sisa, 2, ",", ".") ?></td>
                                                </tr>
                                                <?php
                                                $no++;
                                                $t_anggaran += $total_anggaran;
                                                $t_sisa += $sisa;
                                                $t_spj += $sd_bulan_ini['total_spj'];

                                                $t_spj1_a += $spj1x;
                                                $t_spj1_b += $spj1;
                                                $t_spj1_c += $sd_bulan_ini['spj1'];

                                                $t_spj2_a += $spj2x;
                                                $t_spj2_b += $spj2;
                                                $t_spj2_c += $sd_bulan_ini['spj2'];

                                                $t_spj3_a += $spj3x;
                                                $t_spj3_b += $spj3;
                                                $t_spj3_c += $sd_bulan_ini['spj3'];
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="2" class="text-right">Jumlah</td>
                                                <td class="text-right"><?= number_format($t_anggaran, 2, ",", ".") ?></td>

                                                <td class="text-right"><?= number_format($t_spj1_a, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj1_b, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj1_c, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj2_a, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj2_b, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj2_c, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj3_a, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj3_b, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj3_c, 2, ",", ".") ?></td>
                                                <td class="text-right"><?= number_format($t_spj, 2, ",", ".") ?></td>

                                                <td class="text-right"><?= number_format($t_sisa, 2, ",", ".") ?></td>
                                            </tr>
                                            <?php
                                        } else {
                                            ?>
                                        <td class="text-center" colspan="8">Tidak Ada Data</td>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
                        <div class="col-md-6 text-left">
                            <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                        <div class="col-md-6">
                            &nbsp;&nbsp;

                            <button data-dismiss="modal" id="btn_batal" class="btn pull-right" style="margin-left:10px">Tutup</button>&nbsp;&nbsp; 
                            <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->

