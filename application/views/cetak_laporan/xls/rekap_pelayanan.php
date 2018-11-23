
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

<table border="1" width="100%">
    <thead align="center">
        <tr>
            <th>NO</th>
            <th>JENIS PELAYANAN</th>
            <th>JUMLAH</th>
        </tr>
    </thead>
    <tbody align="right">
        <?php
        $baris1 = $this->db->where('id_laporan', 15)
                        ->where('cell', 2)
                        ->get('data_variabel')->result();

        $kolom1 = $this->db->where('id_laporan', 15)
                        ->where('cell', 1)
                        ->get('data_variabel')->result();

        $no1 = 1;
        $ntx = 0;
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
            </tr>

            <?php
            $no1++;
            $ntx += $nt;
        }
        ?>
        <tr>
            <td align="center" colspan="2">Jumlah</td>
            <td><?= $ntx ?></td>
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

