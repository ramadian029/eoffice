
<style typew="text/css">
    body{
        font-family: Arial;
    }
    /*    table {
            border-collapse: collapse;
        }
        table, th, td{
            border:1px solid black;
        }
        th{
            background-color:#eb3a28;  
        }*/
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
        LAPORAN MONOGRAFI <br>
        <?php if (!empty($kelurahan)) { ?>
            KELURAHAN <?= strtoupper($kelurahan->nama_kel) ?><br>
        <?php } ?>
        <u>KECAMATAN SEMARANG TENGAH KOTA SEMARANG</u>
        <br><br>
        BULAN : <?= strtoupper($bulan) . ' ' . $tahun ?>
        <br><br>						
    </center>
</b>
<br>
<?php
if (!empty($kelurahan)) {
    $this->db->where('id_kel', $kelurahan->id_kel);
}

$q_kelurahan = $this->db->where('flag', 0)
        ->get('data_kelurahan');
?>
<p>I. RINCIAN JUMLAH PENDUDUK</p>
<br>
<table border="1" width="100%">
    <thead align="center">
        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">PERINCIAN</th>
            <th colspan="2">WARGA NEGARA RI</th>
            <th colspan="2">WARGA NEGARA ASING</th>
            <th colspan="3">JUMLAH WNRI + WNA</th>
            <th rowspan="2">KETERANGAN</th>
        </tr>
        <tr>
            <th>LAKI-LAKI</th>
            <th>PEREMPUAN</th>
            <th>LAKI-LAKI</th>
            <th>PEREMPUAN</th>
            <th>LAKI-LAKI</th>
            <th>PEREMPUAN</th>
            <th>L + P</th>
        </tr>
    </thead>
    <tbody align="right">
        <?php
        $baris1 = $this->db->where('id_laporan', 1)
                        ->where('cell', 2)
                        ->get('data_variabel')->result();

        $kolom1 = $this->db->where('id_laporan', 1)
                        ->where('cell', 1)
                        ->get('data_variabel')->result();

        $no1 = 1;
        foreach ($baris1 AS $b1) {
            #kolom 1 2 7 8
            foreach ($kolom1 AS $k1) {
                $n[$k1->id_variabel] = 0;
                if ($q_kelurahan->num_rows() > 0) {
                    foreach ($q_kelurahan->result() AS $kel) {
                        $q = $this->db
                                        ->where('id_kelurahan', $kel->id_kel)
                                        ->where('id_variabel2', $b1->id_variabel)
                                        ->where('id_variabel', $k1->id_variabel)
                                        ->get('data_pengisian')->row();

                        $n[$k1->id_variabel] += isset($q) ? $q->nilai : 0;
                    }
                }
            }
            ?>
            <tr>
                <td align="left">
                    <?= $no1 ?>
                </td>
                <td align="left"><?= $b1->variabel ?></td>
                <?php
                $nt = 0;
                foreach ($kolom1 AS $k1) {
                    $nt += $n[$k1->id_variabel];
                    ?>
                    <td><?= $n[$k1->id_variabel] ?></td>
                <?php } ?>
                <td><?= $n[1] + $n[7] ?></td>
                <td><?= $n[2] + $n[8] ?></td>
                <td><?= $nt ?></td>
                <td></td>
            </tr>
            <?php
            $no1++;
        }
        ?>

    </tbody>
</table>
<br>
<p>II. MUTASI PINDAH / DATANG</p>
<br>
<table border="1" width="100%">
    <thead align="center">
        <tr>
            <th rowspan="3">NO</th>
            <th rowspan="3">ANTAR</th>
            <th colspan="6">DATANG</th>
            <th colspan="6">PINDAH</th>
        </tr>
        <tr>
            <th colspan="3">WNI</th>
            <th colspan="3">WNA</th>
            <th colspan="3">WNI</th>
            <th colspan="3">WNA</th>
        </tr>
        <tr>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
        </tr>
    </thead>
    <tbody align="right">
        <?php
        $baris2 = $this->db->where('id_laporan', 2)
                        ->where('cell', 2)
                        ->get('data_variabel')->result();

        $kolom2 = $this->db->where('id_laporan', 2)
                        ->where('cell', 1)
                        ->get('data_variabel')->result();

        for ($i = 12; $i <= 19; $i++) {
            $tn[$i] = 0;
        }

        $no2 = 1;
        foreach ($baris2 AS $b2) {


            foreach ($kolom2 AS $k2) {

                $n[$k2->id_variabel] = 0;
                if ($q_kelurahan->num_rows() > 0) {
                    foreach ($q_kelurahan->result() AS $kel) {
                        $q = $this->db
                                        ->where('id_kelurahan', $kel->id_kel)
                                        ->where('id_variabel2', $b2->id_variabel)
                                        ->where('id_variabel', $k2->id_variabel)
                                        ->get('data_pengisian')->row();

                        $n[$k2->id_variabel] += isset($q) ? $q->nilai : 0;
                    }
                }
            }
            ?>
            <tr>
                <td align="left">
                    <?= $no2 ?>
                </td>
                <td align="left"><?= $b2->variabel ?></td>          
                <td><?= $n[12] ?></td>
                <td><?= $n[13] ?></td>
                <td><?= $n[12] + $n[13] ?></td>
                <td><?= $n[14] ?></td>
                <td><?= $n[15] ?></td>
                <td><?= $n[14] + $n[15] ?></td>
                <td><?= $n[16] ?></td>
                <td><?= $n[17] ?></td>
                <td><?= $n[16] + $n[17] ?></td>
                <td><?= $n[18] ?></td>
                <td><?= $n[19] ?></td>
                <td><?= $n[18] + $n[19] ?></td>
            </tr>
            <?php
            $no2++;
            for ($i = 12; $i <= 19; $i++) {
                $tn[$i] += $n[$i];
            }
        }
        ?>
        <tr>

            <td align="center" colspan="2">Jumlah</td>          
            <td><?= $tn[12] ?></td>
            <td><?= $tn[13] ?></td>
            <td><?= $tn[12] + $tn[13] ?></td>
            <td><?= $tn[14] ?></td>
            <td><?= $tn[15] ?></td>
            <td><?= $tn[14] + $tn[15] ?></td>
            <td><?= $tn[16] ?></td>
            <td><?= $tn[17] ?></td>
            <td><?= $tn[16] + $tn[17] ?></td>
            <td><?= $tn[18] ?></td>
            <td><?= $tn[19] ?></td>
            <td><?= $tn[18] + $tn[19] ?></td>
        </tr>
    </tbody>
</table>
<br>
<p>III. KEPALA KELUARGA</p>
<br>
<table border="1" width="100%">
    <thead align="center">
        <tr>
            <th colspan="3">KK WNRI</th>
            <th colspan="3">KK WNA</th>
            <th rowspan="2">JUMLAH KK WNRI+WNA</th>
        </tr>
        <tr>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
            <th>L</th>
            <th>P</th>
            <th>JML</th>
        </tr>
    </thead>
    <tbody align="right">
        <?php
        $baris3 = $this->db->where('id_laporan', 3)
                        ->where('cell', 2)
                        ->get('data_variabel')->result();

        $kolom3 = $this->db->where('id_laporan', 3)
                        ->where('cell', 1)
                        ->get('data_variabel')->result();



        $no3 = 1;
        foreach ($baris3 AS $b3) {


            foreach ($kolom3 AS $k3) {

                $n[$k3->id_variabel] = 0;
                if ($q_kelurahan->num_rows() > 0) {
                    foreach ($q_kelurahan->result() AS $kel) {
                        $q = $this->db
                                        ->where('id_kelurahan', $kel->id_kel)
                                        ->where('id_variabel2', $b3->id_variabel)
                                        ->where('id_variabel', $k3->id_variabel)
                                        ->get('data_pengisian')->row();

                        $n[$k3->id_variabel] += isset($q) ? $q->nilai : 0;
                    }
                }
            }
            ?>
            <tr>

                <td><?= $n[25] ?></td>
                <td><?= $n[26] ?></td>
                <td><?= $n[25] + $n[26] ?></td>
                <td><?= $n[27] ?></td>
                <td><?= $n[28] ?></td>
                <td><?= $n[27] + $n[28] ?></td>
                <td><?= $n[25] + $n[26] + $n[27] + $n[28] ?></td>                
            </tr>
            <?php
            $no3++;
        }
        ?>
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

    CAMAT SEMARANG TENGAH
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

