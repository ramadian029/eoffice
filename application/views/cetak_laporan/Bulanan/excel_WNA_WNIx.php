
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
 REKAPITULASI WARGA NEGARA INDONESIA DAN WARGA NEGARA ASING ( WNA + WNI )
<?php //echo strtoupper($nama_bulan) ?>
<?php //echo substr($this->input->post('bulan'), 3, 4) ?>
<br>
<br>
<table>
    <thead>
        <tr>
            <th align="center">NO</th>
            <th>KELURAHAN</th>
            <th>JUMLAH WNI</th>
            <th>JUMLAH WNA</th>
            <th>JUMLAH WNI + WNA</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center">1</td>
            <td align="center">2</td>
            <td align="center">3</td>
            <td align="center">4</td>
            <td align="center">5</td>
        </tr>
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
                $periode = $bln . '/' . $tahun;
                $data = $this->db->select(' a.* FROM data_penduduk_wna_wni a
                                    INNER JOIN(
                                    SELECT MAX(id_penduduk) AS id
                                    FROM data_penduduk_wna_wni
                                    GROUP BY id_kelurahan
                                    ) b
                                    ON a.id_penduduk = b.id')
                                ->where('a.bulan', $periode)
                                ->where('a.id_kelurahan', $kel->id_kel)->get()->row();

//                echo $this->db->last_query();
                $wna = isset($data) ? $data->wna : '0';
                $wni = isset($data) ? $data->wni : '0';
                $w2 = $wna + $wni;

                $twna = $twna + $wna;
                $twni = $twni + $wni;
                $tw2 = $tw2 + $w2;
                ?>
                <td align="right"><?= $wni ?></td>
                <td align="right"><?= $wna ?></td>
                <td align="right"><?= $w2 ?></td>
            </tr>
            <?php
            $no++;
        }
//        }
        ?>
        <tr>
            <td align="center"></td>
            <td align="center">JUMLAH</td>
            <td align="right"><?= $twni ?></td>
            <td align="right"><?= $twna ?></td>
            <td align="right"><?= $tw2 ?></td>
        </tr>
    </tbody>
</table>
<br>
<br>
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
NIP. <?=
$camat->nip?>