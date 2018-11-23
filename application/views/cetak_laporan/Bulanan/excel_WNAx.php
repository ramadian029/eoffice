
<style typew="text/css">
    table {
        border-collapse: collapse;
    }
    table, th, td{
        border:1px solid black;
    }
    th{
        background-color:#eb3a28;  
    }
    .text{
        mso-number-format:"\@";/*force text*/
    }
    .decimal{
        mso-number-format:"0\.000";
    }
</style>
<!--<h2 style="text-align: left;">
<?= $laporan->laporan ?><br>
   </h2>-->

<center>
    LAPORAN BULANAN KEPENDUDUKAN<br>
    KECAMATAN GAJAHMUNGKUR KOTA SEMARANG<br>
    BULAN : <?= strtoupper($bulan) ?><br>
    TAHUN : <?= $tahun ?>
    <br>
    <br>

</center>
REKAPITULASI PENDUDUK WARGA NEGARA ASING
<?php //echo strtoupper($nama_bulan) ?>
<?php //echo substr($this->input->post('bulan'), 3, 4) ?>
<br>
<br>
<table width="100%">
    <thead>
        <tr>
            <th align="center" rowspan="2" width="3%">NO</th>
            <th align="center" rowspan="2" width="12%">KELURAHAN</th>
            <th align="center" colspan="3">PENDUDUK AWAL BULAN INI</th>
            <th align="center" colspan="3">LAHIR BULAN INI</th>
            <th align="center" colspan="3">MATI BULAN INI</th>
            <th align="center" colspan="3">DATANG BULAN INI</th>
            <th align="center" colspan="3">PINDAH BULAN INI</th>
            <th align="center" colspan="3">PENDUDUK AKHIR INI</th>
            <th align="center" rowspan="2">KETERANGAN</th>
        </tr>
        <tr>
            <?php for ($i = 1; $i <= 6; $i++) { ?>
                <th align="center" width="200px">L</th>
                <th align="center" width="200px">P</th>
                <th align="center" width="200px">JML</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php for ($i = 1; $i <= 21; $i++) {
                ?>
                <td align="center"><?= $i ?></td>
            <?php } ?>
        </tr>
        <?php
//        if ($jumlah > 0) {
        $no = 1;
        foreach ($kelurahan AS $kel) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo isset($kel->nama_kel) ? $kel->nama_kel : ''; ?></td>
                <?php
                $periode = $bln . '/' . $tahun;
                if ($bln == '01')
                    $periode_b = '12/' . ($tahun - 1);
                else
                    $periode_b = ($bln - 1) . '/' . $tahun;

                $waktu_a = $tahun . '-' . $bln . '-01';
                if ($bln == '12')
                    $waktu_b = ($tahun + 1) . '-01-01';
                else
                    $waktu_b = $tahun . '-' . ($bln + 1) . '-01';

                $q_data = $this->db->select(' a.* FROM data_penduduk_bulan a
                                    INNER JOIN(
                                    SELECT MAX(id_penduduk_bulan) AS id
                                    FROM data_penduduk_bulan
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_penduduk_bulan = b.id')
                                ->where('a.bulan', $periode_b)
                                ->where('a.wni', 0)
                                ->where('a.id_kelurahan', $kel->id_kel)->get();

                if ($q_data->num_rows() > 0) {
                    $data = $q_data->row();
                    $pawal_l = $data->laki;
                    $pawal_p = $data->perempuan;
                    $pawal_j = $pawal_l + $pawal_p;
                } else {
                    $q_data = $this->db->select(' a.* FROM data_penduduk_awal a
                                    INNER JOIN(
                                    SELECT MAX(id_penduduk_awal) AS id
                                    FROM data_penduduk_awal
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_penduduk_awal = b.id')
//                                ->where('a.bulan', $periode_b)
                                    ->where('a.wni', 0)
                                    ->where('a.id_kelurahan', $kel->id_kel)->get();

                    $data = $q_data->row();

                    $pawal_l = isset($data) ? $data->laki : '';
                    $pawal_p = isset($data) ? $data->perempuan : '';
                    $pawal_j = isset($data) ? $pawal_l + $pawal_p : '';
                }

                $data2 = $this->db->select(' a.* FROM data_penduduk_bulan a
                                    INNER JOIN(
                                    SELECT MAX(id_penduduk_bulan) AS id
                                    FROM data_penduduk_bulan
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_penduduk_bulan = b.id')
                                ->where('a.bulan', $periode)
                                ->where('a.wni', 0)
                                ->where('a.id_kelurahan', $kel->id_kel)->get()->row();

                $pakhir_l = isset($data2) ? $data2->laki : '';
                $pakhir_p = isset($data2) ? $data2->perempuan : '';
                $pakhir_j = isset($data2) ? $pakhir_l + $pakhir_p : '';

                $datang_l = $this->db->select('COUNT(*) AS jml')
                                ->from('data_pindah_datang')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 1)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $datang_p = $this->db->select('COUNT(*) AS jml')
                                ->from('data_pindah_datang')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 2)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $datang_l = $datang_l->jml;
                $datang_p = $datang_p->jml;
                $datang_j = $datang_l + $datang_p;

                $luar_l = $this->db->select('COUNT(*) AS jml')
                                ->from('data_pindah_datang')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 1)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $luar_p = $this->db->select('COUNT(*) AS jml')
                                ->from('data_pindah_luar')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 2)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $luar_l = $luar_l->jml;
                $luar_p = $luar_p->jml;
                $luar_j = $luar_l + $luar_p;

                $lahir_l = $this->db->select('COUNT(*) AS jml')
                                ->from('data_lahir')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 1)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $lahir_p = $this->db->select('COUNT(*) AS jml')
                                ->from('data_lahir')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 2)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $lahir_l = $lahir_l->jml;
                $lahir_p = $lahir_p->jml;
                $lahir_j = $lahir_l + $lahir_p;

                $mati_l = $this->db->select('COUNT(*) AS jml')
                                ->from('data_mati')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 1)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $mati_p = $this->db->select('COUNT(*) AS jml')
                                ->from('data_mati')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 2)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $mati_l = $mati_l->jml;
                $mati_p = $mati_p->jml;
                $mati_j = $mati_l + $mati_p;

                $tpawal_l = isset($tpawal_l) ? $tpawal_l : '';
                $tpawal_p = isset($tpawal_p) ? $tpawal_p : '';
                $tpawal_j = isset($tpawal_j) ? $tpawal_j : '';

                $tpawal_l += $pawal_l;
                $tpawal_p += $pawal_p;
                $tpawal_j += $pawal_j;

                $tpakhir_l = isset($tpakhir_l) ? $tpakhir_l : '';
                $tpakhir_p = isset($tpakhir_p) ? $tpakhir_p : '';
                $tpakhir_j = isset($tpakhir_j) ? $tpakhir_j : '';

                $tpakhir_l += $pakhir_l;
                $tpakhir_p += $pakhir_p;
                $tpakhir_j += $pakhir_j;

                $tlahir_l = isset($tlahir_l) ? $tlahir_l : '';
                $tlahir_p = isset($tlahir_p) ? $tlahir_p : '';
                $tlahir_j = isset($tlahir_j) ? $tlahir_j : '';

                $tlahir_l += $lahir_l;
                $tlahir_p += $lahir_p;
                $tlahir_j += $lahir_j;

                $tmati_l = isset($tmati_l) ? $tmati_l : '';
                $tmati_p = isset($tmati_p) ? $tmati_p : '';
                $tmati_j = isset($tmati_j) ? $tmati_j : '';

                $tmati_l += $mati_l;
                $tmati_p += $mati_p;
                $tmati_j += $mati_j;

                $tdatang_l = isset($tdatang_l) ? $tdatang_l : '';
                $tdatang_p = isset($tdatang_p) ? $tdatang_p : '';
                $tdatang_j = isset($tdatang_j) ? $tdatang_j : '';

                $tdatang_l += $datang_l;
                $tdatang_p += $datang_p;
                $tdatang_j += $datang_j;

                $tluar_l = isset($tluar_l) ? $tluar_l : '';
                $tluar_p = isset($tluar_p) ? $tluar_p : '';
                $tluar_j = isset($tluar_j) ? $tluar_j : '';

                $tluar_l += $luar_l;
                $tluar_p += $luar_p;
                $tluar_j += $luar_j;
                ?>
                <td align="right"><?= $pawal_l ?></td>
                <td align="right"><?= $pawal_p ?></td>
                <td align="right"><?= $pawal_j ?></td>

                <td align="right"><?= $lahir_l ?></td>
                <td align="right"><?= $lahir_p ?></td>
                <td align="right"><?= $lahir_j ?></td>

                <td align="right"><?= $mati_l ?></td>
                <td align="right"><?= $mati_p ?></td>
                <td align="right"><?= $mati_j ?></td>

                <td align="right"><?= $datang_l ?></td>
                <td align="right"><?= $datang_p ?></td>
                <td align="right"><?= $datang_j ?></td>

                <td align="right"><?= $luar_l ?></td>
                <td align="right"><?= $luar_p ?></td>
                <td align="right"><?= $luar_j ?></td>

                <td align="right"><?= $pakhir_l ?></td>
                <td align="right"><?= $pakhir_p ?></td>
                <td align="right"><?= $pakhir_j ?></td>

                <td><?php //echo isset($data) ? $data->keterangan : '';                                                                          ?></td>
            </tr>
            <?php
            $no++;
        }
//        }
        ?>
        <tr>
            <td align="center"></td>
            <td align="center">JUMLAH</td>
            <td align="right"><?= $tpawal_l ?></td>
            <td align="right"><?= $tpawal_p ?></td>
            <td align="right"><?= $tpawal_j ?></td>
            <td align="right"><?= $tlahir_l ?></td>
            <td align="right"><?= $tlahir_p ?></td>
            <td align="right"><?= $tlahir_j ?></td>
            <td align="right"><?= $tmati_l ?></td>
            <td align="right"><?= $tmati_p ?></td>
            <td align="right"><?= $tmati_j ?></td>
            <td align="right"><?= $tdatang_l ?></td>
            <td align="right"><?= $tdatang_p ?></td>
            <td align="right"><?= $tdatang_j ?></td>
            <td align="right"><?= $tluar_l ?></td>
            <td align="right"><?= $tluar_p ?></td>
            <td align="right"><?= $tluar_j ?></td>
            <td align="right"><?= $tpakhir_l ?></td>
            <td align="right"><?= $tpakhir_p ?></td>
            <td align="right"><?= $tpakhir_j ?></td>
            <td align="center"></td>
        </tr>
    </tbody>
</table>
<br>
<br>
KETERANGAN :
<br>
<table>
    <tr>
        <td width="400px" style="border:1px solid white;vertical-align: top;">
            <table>
                <thead>
                    <tr>
                        <th align="center">NO</th>
                        <th align="center" width="350px">DATANG</th>
                        <th align="center" width="200px">L</th>
                        <th align="center" width="200px">P</th>
                        <th align="center" width="200px">JML</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $akelurahan_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kelurahan')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xakelurahan_l = isset($akelurahan_l) ? $akelurahan_l->jml : '';

                    $akecamatan_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kecamatan')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();

                    $xakecamatan_l = isset($akecamatan_l) ? $akecamatan_l->jml : '';

                    $akota_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kab/Kota')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xakota_l = isset($akota_l) ? $akota_l->jml : '';

                    $aprovinsi_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Provinsi')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xaprovinsi_l = isset($aprovinsi_l) ? $aprovinsi_l->jml : '';

                    $anegara_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Negara')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xanegara_l = isset($anegara_l) ? $anegara_l->jml : '';

                    $akelurahan_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kelurahan')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xakelurahan_p = isset($akelurahan_p) ? $akelurahan_p->jml : '';

                    $akecamatan_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kecamatan')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xakecamatan_p = isset($akecamatan_p) ? $akecamatan_p->jml : '';

                    $akota_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kab/Kota')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xakota_p = isset($akota_p) ? $akota_p->jml : '';

                    $aprovinsi_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Provinsi')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xaprovinsi_p = isset($aprovinsi_p) ? $aprovinsi_p->jml : '';

                    $anegara_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Negara')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xanegara_p = isset($anegara_p) ? $anegara_p->jml : '';

                    $xakelurahan_j = $xakelurahan_l + $xakelurahan_p;
                    $xakecamatan_j = $xakecamatan_l + $xakecamatan_p;
                    $xakota_j = $xakota_l + $xakota_p;
                    $xaprovinsi_j = $xaprovinsi_l + $xaprovinsi_p;
                    $xanegara_j = $xanegara_l + $xanegara_p;

                    $tdatang_l = $xakelurahan_l + $xakecamatan_l + $xakota_l + $xaprovinsi_l + $xanegara_l;
                    $tdatang_p = $xakelurahan_p + $xakecamatan_p + $xakota_p + $xaprovinsi_p + $xanegara_p;
                    $tdatang_j = $tdatang_l + $tdatang_p;
                    ?>
                    <tr>
                        <td>1</td><td>ANTAR KELURAHAN</td>
                        <td align="right"><?= $xakelurahan_l ?></td>
                        <td align="right"><?= $xakelurahan_p ?></td>
                        <td align="right"><?= $xakelurahan_j ?></td>
                    </tr>
                    <tr>
                        <td>2</td><td>ANTAR KECAMATAN</td>
                        <td align="right"><?= $xakecamatan_l ?></td>
                        <td align="right"><?= $xakecamatan_p ?></td>
                        <td align="right"><?= $xakecamatan_j ?></td>
                    </tr>
                    <tr>
                        <td>3</td><td>ANTAR KOTA/KAB</td>
                        <td align="right"><?= $xakota_l ?></td>
                        <td align="right"><?= $xakota_p ?></td>
                        <td align="right"><?= $xakota_j ?></td>
                    </tr>
                    <tr>
                        <td>4</td><td>ANTAR PROPINSI</td>
                        <td align="right"><?= $xaprovinsi_l ?></td>
                        <td align="right"><?= $xaprovinsi_p ?></td>
                        <td align="right"><?= $xaprovinsi_j ?></td>
                    </tr>
                    <tr>
                        <td>5</td><td>ANTAR NEGARA</td>
                        <td align="right"><?= $xanegara_l ?></td>
                        <td align="right"><?= $xanegara_p ?></td>
                        <td align="right"><?= $xanegara_j ?></td>
                    </tr>
                    <tr>
                        <td align="center"></td>
                        <td align="center">JUMLAH</td>
                        <td align="right"><?= $tdatang_l ?></td>
                        <td align="right"><?= $tdatang_p ?></td>
                        <td align="right"><?= $tdatang_j ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                    <tr>
                        <th align="center">NO</th>
                        <th align="center" width="350px">PINDAH</th>
                        <th align="center" width="200px">L</th>
                        <th align="center" width="200px">P</th>
                        <th align="center" width="200px">JML</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $akelurahan_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kelurahan')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xakelurahan_l = isset($akelurahan_l) ? $akelurahan_l->jml : '';

                    $akecamatan_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kecamatan')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xakecamatan_l = isset($akecamatan_l) ? $akecamatan_l->jml : '';

                    $akota_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kab/Kota')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xakota_l = isset($akota_l) ? $akota_l->jml : '';

                    $aprovinsi_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Provinsi')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xaprovinsi_l = isset($aprovinsi_l) ? $aprovinsi_l->jml : '';

                    $anegara_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Negara')
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)->get()->row();
                    $xanegara_l = isset($anegara_l) ? $anegara_l->jml : '';

                    $akelurahan_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kelurahan')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xakelurahan_p = isset($akelurahan_p) ? $akelurahan_p->jml : '';

                    $akecamatan_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kecamatan')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xakecamatan_p = isset($akecamatan_p) ? $akecamatan_p->jml : '';

                    $akota_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Kab/Kota')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xakota_p = isset($akota_p) ? $akota_p->jml : '';

                    $aprovinsi_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Provinsi')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xaprovinsi_p = isset($aprovinsi_p) ? $aprovinsi_p->jml : '';

                    $anegara_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_pindah', 'Antar Negara')
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)->get()->row();
                    $xanegara_p = isset($anegara_p) ? $anegara_p->jml : '';

                    $xakelurahan_j = $xakelurahan_l + $xakelurahan_p;
                    $xakecamatan_j = $xakecamatan_l + $xakecamatan_p;
                    $xakota_j = $xakota_l + $xakota_p;
                    $xaprovinsi_j = $xaprovinsi_l + $xaprovinsi_p;
                    $xanegara_j = $xanegara_l + $xanegara_p;

                    $tdatang_l = $xakelurahan_l + $xakecamatan_l + $xakota_l + $xaprovinsi_l + $xanegara_l;
                    $tdatang_p = $xakelurahan_p + $xakecamatan_p + $xakota_p + $xaprovinsi_p + $xanegara_p;
                    $tdatang_j = $tdatang_l + $tdatang_p;
                    ?>
                    <tr>
                        <td>1</td><td>ANTAR KELURAHAN</td>
                        <td align="right"><?= $xakelurahan_l ?></td>
                        <td align="right"><?= $xakelurahan_p ?></td>
                        <td align="right"><?= $xakelurahan_j ?></td>
                    </tr>
                    <tr>
                        <td>2</td><td>ANTAR KECAMATAN</td>
                        <td align="right"><?= $xakecamatan_l ?></td>
                        <td align="right"><?= $xakecamatan_p ?></td>
                        <td align="right"><?= $xakecamatan_j ?></td>
                    </tr>
                    <tr>
                        <td>3</td><td>ANTAR KOTA/KAB</td>
                        <td align="right"><?= $xakota_l ?></td>
                        <td align="right"><?= $xakota_p ?></td>
                        <td align="right"><?= $xakota_j ?></td>
                    </tr>
                    <tr>
                        <td>4</td><td>ANTAR PROPINSI</td>
                        <td align="right"><?= $xaprovinsi_l ?></td>
                        <td align="right"><?= $xaprovinsi_p ?></td>
                        <td align="right"><?= $xaprovinsi_j ?></td>
                    </tr>
                    <tr>
                        <td>5</td><td>ANTAR NEGARA</td>
                        <td align="right"><?= $xanegara_l ?></td>
                        <td align="right"><?= $xanegara_p ?></td>
                        <td align="right"><?= $xanegara_j ?></td>
                    </tr>
                    <tr>
                        <td align="center"></td>
                        <td align="center">JUMLAH</td>
                        <td align="right"><?= $tdatang_l ?></td>
                        <td align="right"><?= $tdatang_p ?></td>
                        <td align="right"><?= $tdatang_j ?></td>
                    </tr>
                </tbody>
            </table>
        </td>
        <td style="border:1px solid white;" width="600px"></td>
        <td style="border:1px solid white;vertical-align: top">
            <?php
            $camat = $this->db->where('id_camat', 1)
                            ->get('camat')->row();
            ?>
            Semarang, <?= $tanggal ?>
            <br>
            <br>
            CAMAT GAJAHMUNGKUR
            <br>
            <br>
            <br>
            <br>
            <?= $camat->nama ?>
            <br>
            <?= $camat->pangkat ?>
            <br>
            NIP. <?= $camat->nip ?>
        </td>
    </tr>
</table>

<br>
<br>
<table width="100%">
    <thead>
        <tr>
            <th align="center" rowspan="3" width="3%">NO</th>
            <th align="center" rowspan="3" width="12%">MUTASI</th>
            <th align="center" colspan="6">ANTAR KELURAHAN</th>
            <th align="center" colspan="6">ANTAR KECAMATAN</th>
            <th align="center" colspan="6">ANTAR KAB/KOTA</th>
            <th align="center" colspan="6">ANTAR PROVINSI</th>
            <th align="center" colspan="6">ANTAR NEGARA</th>
        </tr>
        <tr>
            <?php for ($i = 1; $i <= 5; $i++) { ?>
                <th align="center" colspan="3">PINDAH</th>
                <th align="center" colspan="3">DATANG</th>
            <?php } ?>
        </tr>
        <tr>
            <?php for ($i = 1; $i <= 10; $i++) { ?>
                <th align="center" width="200px">L</th>
                <th align="center" width="200px">P</th>
                <th align="center" width="200px">JML</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
//        if ($jumlah > 0) {
        $no = 1;
        foreach ($kelurahan AS $kel) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo isset($kel->nama_kel) ? $kel->nama_kel : ''; ?></td>
                <?php
                $datang_l = $this->db->select('COUNT(*) AS jml')
                                ->from('data_pindah_datang')
                                ->where('waktu >= ', $waktu_a)
                                ->where('waktu < ', $waktu_b)
                                ->where('jenis_kelamin', 1)
                                ->where('wni', 0)
                                ->where('id_kelurahan', $kel->id_kel)->get()->row();

                $keterangan = $this->db->get('keterangan_pindah')->result();
                $j = 0;
                foreach ($keterangan AS $ket) {
                    $j++;
//                    $tdatang_l = array();
//                    $tdatang_p = array();
//                    $tdatang_j = array();
//
//                    $tluar_l = array();
//                    $tluar_p = array();
//                    $tluar_j = array();

                    $kdatang_l[$j] = isset($kdatang_l[$j]) ? $kdatang_l[$j] : '0';
                    $kdatang_p[$j] = isset($kdatang_p[$j]) ? $kdatang_p[$j] : '0';
                    $kdatang_j[$j] = isset($kdatang_j[$j]) ? $kdatang_j[$j] : '0';

                    $kluar_l[$j] = isset($kluar_l[$j]) ? $kluar_l[$j] : '0';
                    $kluar_p[$j] = isset($kluar_p[$j]) ? $kluar_p[$j] : '0';
                    $kluar_j[$j] = isset($kluar_j[$j]) ? $kluar_j[$j] : '0';

                    $datang_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('jenis_pindah', $ket->keterangan)
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)
                                    ->where('id_kelurahan', $kel->id_kel)->get()->row()->jml;
                    $datang_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_datang')
                                    ->where('jenis_pindah', $ket->keterangan)
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)
                                    ->where('id_kelurahan', $kel->id_kel)->get()->row()->jml;
                    $luar_l = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('jenis_pindah', $ket->keterangan)
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_kelamin', 1)
                                    ->where('wni', 0)
                                    ->where('id_kelurahan', $kel->id_kel)->get()->row()->jml;

                    $luar_p = $this->db->select('COUNT(*) AS jml')
                                    ->from('data_pindah_luar')
                                    ->where('jenis_pindah', $ket->keterangan)
                                    ->where('waktu >= ', $waktu_a)
                                    ->where('waktu < ', $waktu_b)
                                    ->where('jenis_kelamin', 2)
                                    ->where('wni', 0)
                                    ->where('id_kelurahan', $kel->id_kel)->get()->row()->jml;

                    $datang_j = $datang_l + $datang_p;
                    $luar_j = $luar_l + $luar_p;

                    $kdatang_l[$j] += $datang_l;
                    $kdatang_p[$j] += $datang_p;
                    $kdatang_j[$j] += $datang_j;

                    $kluar_l[$j] += $luar_l;
                    $kluar_p[$j] += $luar_p;
                    $kluar_j[$j] += $luar_j;
                    ?>
                    <td align="right"><?= $datang_l ?></td>
                    <td align="right"><?= $datang_p ?></td>
                    <td align="right"><?= $datang_j ?></td>
                    <td align="right"><?= $luar_l ?></td>
                    <td align="right"><?= $luar_p ?></td>
                    <td align="right"><?= $luar_j ?></td>
                    <?php
                }
                ?>
            </tr>
            <?php
            $no++;
        }
//        }
        ?>
        <tr>
            <td align="center"></td>
            <td align="center">JUMLAH</td>
            <?php
            $k = 0;
            foreach ($keterangan AS $ket) {
                $k++;
                ?>
                <td align="right"><?= $kdatang_l[$k] ?></td>
                <td align="right"><?= $kdatang_p[$k] ?></td>
                <td align="right"><?= $kdatang_j[$k] ?></td>
                <td align="right"><?= $kluar_l[$k] ?></td>
                <td align="right"><?= $kluar_p[$k] ?></td>
                <td align="right"><?= $kluar_j[$k] ?></td>

            <?php }
            ?>
        </tr>
    </tbody>
</table>