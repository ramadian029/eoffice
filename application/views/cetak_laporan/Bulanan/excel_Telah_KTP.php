
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
    LAPORAN BULANAN KEPENDUDUKAN<br>
    KECAMATAN GAJAHMUNGKUR KOTA SEMARANG<br>
    BULAN : <?= strtoupper($bulan) ?><br>
    TAHUN : <?= $tahun ?>
    <br>
    <br>

</center>
</b>
REKAPITULASI JUMLAH PENDUDUK YANG TELAH MEMILIKI KTP				

<?php //echo strtoupper($nama_bulan) ?>
<?php //echo substr($this->input->post('bulan'), 3, 4) ?>
<br>
<br>
<table width="100%">
    <thead>
        <tr>
            <th align="center" rowspan="3" width="3%">NO</th>
            <th align="center" rowspan="3" width="12%">KELURAHAN</th>
            <th align="center" colspan="6">JUMLAH PENDUDUK MEMILIKI KTP</th>
            <th align="center" rowspan="2" colspan="3">JUMLAH PENDUDUK MEMILIKI KTP WNI + WNA</th>
            <th align="center" rowspan="3">KETERANGAN</th>
        </tr>
        <tr>
            <th align="center" colspan="3">WNA</th>
            <th align="center" colspan="3">WNI</th>      
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
                $periode = $bln . '/' . $tahun;
                $data = $this->db->select(" a.* FROM data_telah_ktp a
                                    INNER JOIN(
                                    SELECT MAX(id_telah_ktp) AS id
                                    FROM data_telah_ktp
                                    WHERE bulan = '$periode'
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_telah_ktp = b.id")
                                ->where('a.bulan', $periode)
                                ->where('a.id_kelurahan', $kel->id_kel)->get()->row();

//                echo $this->db->last_query();
                $wni_l = isset($data) ? $data->wni_l : '0';
                $wni_p = isset($data) ? $data->wni_p : '0';
                $wni = $wni_l + $wni_p;

                $wna_l = isset($data) ? $data->wna_l : '0';
                $wna_p = isset($data) ? $data->wna_p : '0';
                $wna = $wna_l + $wna_p;

                $w2_l = $wni_l + $wna_l;
                $w2_p = $wni_p + $wna_p;
                $w2 = $w2_l + $w2_p;

                $twna_l = isset($twna_l) ? $twna_l : '0';
                $twni_l = isset($twni_l) ? $twni_l : '0';
                $tw2_l = isset($tw2_l) ? $tw2_l : '0';
                $twna_p = isset($twna_p) ? $twna_p : '0';
                $twni_p = isset($twni_p) ? $twni_p : '0';
                $tw2_p = isset($tw2_p) ? $tw2_p : '0';
                $twna = isset($twna) ? $twna : '0';
                $twni = isset($twni) ? $twni : '0';
                $tw2 = isset($tw2) ? $tw2 : '0';


                $twna = $twna + $wna;
                $twni = $twni + $wni;
                $tw2 = $tw2 + $w2;

                $twna_l = $twna_l + $wna_l;
                $twni_l = $twni_l + $wni_l;
                $tw2_l = $tw2_l + $w2_l;

                $twna_p = $twna_p + $wna_p;
                $twni_p = $twni_p + $wni_p;
                $tw2_p = $tw2_p + $w2_p;
                ?>
                <td align="right"><?= $wni_l ?></td>
                <td align="right"><?= $wni_p ?></td>
                <td align="right"><?= $wni ?></td>
                <td align="right"><?= $wna_l ?></td>
                <td align="right"><?= $wna_p ?></td>
                <td align="right"><?= $wna ?></td>
                <td align="right"><?= $w2_l ?></td>
                <td align="right"><?= $w2_p ?></td>
                <td align="right"><?= $w2 ?></td>
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