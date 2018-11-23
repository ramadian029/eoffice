
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
    JUMLAH DATA PENDUDUK																			
    <br>
    KECAMATAN GAJAHMUNGKUR KOTA SEMARANG<br>
    TAHUN : <?= $tahun ?>
    <br>
    <br>

</center>
</b>
<!--REKAPITULASI WARGA NEGARA INDONESIA DAN WARGA NEGARA ASING ( WNA + WNI )-->
<?php //echo strtoupper($nama_bulan) ?>
<?php //echo substr($this->input->post('bulan'), 3, 4) ?>
<br>
<br>
<table>
    <thead>
        <tr>
            <th align="center" rowspan="3">NO</th>
            <th rowspan="3">KELURAHAN</th>
            <th colspan="18">BULAN</th>
        </tr>
        <tr>
            <th align="center" colspan="3">JULI</th>
            <th align="center" colspan="3">AGUSTUS</th>
            <th align="center" colspan="3">SEPTEMBER</th>
            <th align="center" colspan="3">OKTOBER</th>
            <th align="center" colspan="3">NOVEMBER</th>
            <th align="center" colspan="3">DESEMBER</th>
        </tr>
        <tr>
            <?php for ($i = 7; $i <= 12; $i++) { ?>
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
            $twna = isset($twna) ? $twna : '0';
            $twni = isset($twni) ? $twni : '0';
            $tw2 = isset($tw2) ? $tw2 : '0';
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo isset($kel->nama_kel) ? $kel->nama_kel : ''; ?></td>
                <?php
                for ($i = 7; $i <= 12; $i++) {
                    $periode = sprintf("%02d", $i) . '/' . $tahun;

                    $wn = $this->db->select(" a.* FROM data_penduduk a
                                    INNER JOIN(
                                    SELECT MAX(id_penduduk) AS id
                                    FROM data_penduduk
                                    WHERE bulan = '$periode'
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_penduduk = b.id")
                                    ->where('a.bulan', $periode)
                                    //->where('a.wni', 1)
                                    ->where('a.id_kelurahan', $kel->id_kel)->get()->row();

//                    echo $this->db->last_query() . '<br>';

                    $wni_l = isset($wn) ? $wn->wni_l : '0';
                    $wni_p = isset($wn) ? $wn->wni_p : '0';
                    //$wni_j = $wni_l + $wni_p;

                    $wna_l = isset($wn) ? $wn->wna_l : '0';
                    $wna_p = isset($wn) ? $wn->wna_p : '0';
                    //$wna_j = $wna_l + $wna_p;

                    $laki = $wni_l + $wna_l;
                    $perempuan = $wni_p + $wna_p;
                    $jumlah = $laki + $perempuan;

                    $tlaki[$i] = isset($tlaki[$i]) ? $tlaki[$i] : '';
                    $tperempuan[$i] = isset($tperempuan[$i]) ? $tperempuan[$i] : '';
                    $tjumlah[$i] = isset($tjumlah[$i]) ? $tjumlah[$i] : '';

                    $tlaki[$i] += $laki;
                    $tperempuan[$i] += $perempuan;
                    $tjumlah[$i] += $jumlah;
                    ?>
                    <td align="right"><?= $laki ?></td>
                    <td align="right"><?= $perempuan ?></td>
                    <td align="right"><?= $jumlah ?></td>
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
            for ($i = 7; $i <= 12; $i++) {
                ?>

                <td align="right"><?= $tlaki[$i] ?></td>
                <td align="right"><?= $tperempuan[$i] ?></td>
                <td align="right"><?= $tjumlah[$i] ?></td>
            <?php } ?>
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