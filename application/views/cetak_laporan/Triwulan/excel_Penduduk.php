
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
<b>
<!--<h2 style="text-align: left;">
<?= $laporan->laporan ?><br>
   </h2>-->
<center>
    DATA KEPENDUDUKAN<br>
    KECAMATAN GAJAHMUNGKUR KOTA SEMARANG<br>
    TRIWULAN : <?= $triwulan ?><br>
    TAHUN : <?= $tahun ?>
    <br>
    <br>
    REKAPITULASI JUMLAH PENDUDUK						
</center>
</b>
<?php //echo strtoupper($nama_bulan) ?>
<?php //echo substr($this->input->post('bulan'), 3, 4) ?>
<br>
<br>
<table width="100%">
    <thead>
        <tr>
            <th align="center" rowspan="3" width="3%">NO</th>
            <th align="center" rowspan="3" width="12%">KELURAHAN</th>
            <th align="center" colspan="6">JUMLAH PENDUDUK</th>
            <th align="center" rowspan="2" colspan="3">JUMLAH PENDUDUK WNI + WNA</th>
            <th align="center" rowspan="3">KETERANGAN</th>
        </tr>
        <tr>
            <th align="center" colspan="3">WNI</th>
            <th align="center" colspan="3">WNA</th>      
        </tr>
        <tr>
            <th align="center" width="10%">L</th>
            <th align="center" width="10%">P</th>
            <th align="center" width="10%">L + P</th>
            <th align="center" width="10%">L</th>
            <th align="center" width="10%">P</th>
            <th align="center" width="10%">L + P</th>
            <th align="center" width="10%">L</th>
            <th align="center" width="10%">P</th>
            <th align="center" width="10%">L + P</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center">1</td>
            <td align="center">2</td>
            <td align="center">3</td>
            <td align="center">4</td>
            <td align="center">5</td>
            <td align="center">6</td>
            <td align="center">7</td>
            <td align="center">8</td>
            <td align="center">9</td>
            <td align="center">10</td>
            <td align="center">11</td>
            <td align="center">12</td>
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
                if ($triwulan == 'I') {
                    $a = 1;
                    $b = 3;
                } else if ($triwulan == 'II') {
                    $a = 4;
                    $b = 6;
                } else if ($triwulan == 'III') {
                    $a = 7;
                    $b = 9;
                } else if ($triwulan == 'IV') {
                    $a = 10;
                    $b = 12;
                }

                $swna_l = 0;
                $swni_l = 0;
                $sw2_l = 0;
                $swna_p = 0;
                $swni_p = 0;
                $sw2_p = 0;
                $swna = 0;
                $swni = 0;
                $sw2 = 0;

                for ($i = $a; $i <= $b; $i++) {
                    $swna_l = isset($swna_l) ? $swna_l : '0';
                    $swni_l = isset($swni_l) ? $swni_l : '0';
                    $sw2_l = isset($sw2_l) ? $sw2_l : '0';
                    $swna_p = isset($swna_p) ? $swna_p : '0';
                    $swni_p = isset($swni_p) ? $swni_p : '0';
                    $sw2_p = isset($sw2_p) ? $sw2_p : '0';
                    $swna = isset($swna) ? $swna : '0';
                    $swni = isset($swni) ? $swni : '0';
                    $sw2 = isset($sw2) ? $sw2 : '0';

                    $periode = sprintf("%02d", $i) . '/' . $tahun;
                    $data = $this->db->select(" a.* FROM data_penduduk a
                                    INNER JOIN(
                                    SELECT MAX(id_penduduk) AS id
                                    FROM data_penduduk
                                    WHERE bulan = '$periode'
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_penduduk = b.id")
                                    ->where('a.bulan', $periode)
                                    ->where('a.id_kelurahan', $kel->id_kel)->get()->row();

                    $wni_l = isset($data) ? $data->wni_l : '0';
                    $wni_p = isset($data) ? $data->wni_p : '0';
                    $wni = $wni_l + $wni_p;

                    $wna_l = isset($data) ? $data->wna_l : '0';
                    $wna_p = isset($data) ? $data->wna_p : '0';
                    $wna = $wna_l + $wna_p;

                    $w2_l = $wni_l + $wna_l;
                    $w2_p = $wni_p + $wna_p;
                    $w2 = $w2_l + $w2_p;

                    $swna_l = $swna_l + $wna_l;
                    $swni_l = $swni_l + $wni_l;
                    $sw2_l = $sw2_l + $w2_l;

                    $swna_p = $swna_p + $wna_p;
                    $swni_p = $swni_p + $wni_p;
                    $sw2_p = $sw2_p + $w2_p;

                    $sw2 += $w2;
                    $swna += $wna;
                    $swni += $wni;
                }

                $twna_l = isset($twna_l) ? $twna_l : '0';
                $twni_l = isset($twni_l) ? $twni_l : '0';
                $tw2_l = isset($tw2_l) ? $tw2_l : '0';
                $twna_p = isset($twna_p) ? $twna_p : '0';
                $twni_p = isset($twni_p) ? $twni_p : '0';
                $tw2_p = isset($tw2_p) ? $tw2_p : '0';
                $twna = isset($twna) ? $twna : '0';
                $twni = isset($twni) ? $twni : '0';
                $tw2 = isset($tw2) ? $tw2 : '0';


                $twna = $twna + $swna;
                $twni = $twni + $swni;
                $tw2 = $tw2 + $sw2;

                $twna_l = $twna_l + $swna_l;
                $twni_l = $twni_l + $swni_l;
                $tw2_l = $tw2_l + $sw2_l;

                $twna_p = $twna_p + $swna_p;
                $twni_p = $twni_p + $swni_p;
                $tw2_p = $tw2_p + $sw2_p;
                ?>
                <td align="right"><?= $swni_l ?></td>
                <td align="right"><?= $swni_p ?></td>
                <td align="right"><?= $swni ?></td>
                <td align="right"><?= $swna_l ?></td>
                <td align="right"><?= $swna_p ?></td>
                <td align="right"><?= $swna ?></td>
                <td align="right"><?= $sw2_l ?></td>
                <td align="right"><?= $sw2_p ?></td>
                <td align="right"><?= $sw2 ?></td>
                <td><?= isset($data) ? $data->keterangan : ''; ?></td>
            </tr>
            <?php
            $no++;
        }
//        }
        ?>
        <tr>
            <td align="center"></td>
            <td align="center">JUMLAH</td>
            <td align="right"><?= $twni_l ?></td>
            <td align="right"><?= $twni_p ?></td>
            <td align="right"><?= $twni ?></td>
            <td align="right"><?= $twna_l ?></td>
            <td align="right"><?= $twna_p ?></td>
            <td align="right"><?= $twna ?></td>
            <td align="right"><?= $tw2_l ?></td>
            <td align="right"><?= $tw2_p ?></td>
            <td align="right"><?= $tw2 ?></td>
            <td align="center"></td>
        </tr>
    </tbody>
</table>
<br>
<br>
Semarang, <?= $tanggal ?>
<br>
<br>
<?php
if ($_SESSION['level'] == '1') {
    $camat = $this->db->where('id_camat', 1)
                    ->get('camat')->row();
    ?>

    CAMAT GAJAHMUNGKUR
    <br>
    <br>
    <br>
    <br>
     <br>
    <?= $camat->nama ?>
    <br>
    <?= $camat->pangkat ?>
    <br>
    NIP. <?= $camat->nip ?>
    <?php
} else {
    foreach ($kelurahan AS $kel) {
        ?>
        LURAH <?= strtoupper($kel->nama_kel) ?>
        <br>
        <br>
        <br>
        <br>
         <br>
        <?= $kel->lurah ?>
        <br>
        <?= $kel->jabatan ?>
        <br>
        NIP. <?= $kel->nip ?>
        <?php
    }
}
?>

