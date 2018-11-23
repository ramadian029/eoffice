
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
<?php
//1989-12-14
$awal = substr($waktu_a, 8, 2) . '/' . substr($waktu_a, 5, 2) . '/' . substr($waktu_a, 0, 4);
$akhir = substr($waktu_b, 8, 2) . '/' . substr($waktu_b, 5, 2) . '/' . substr($waktu_b, 0, 4);
?>
<b>
    <!--<h2 style="text-align: left;">
    <?= $laporan->laporan ?><br>
       </h2>-->

    LAPORAN : <?= strtoupper($laporan->laporan) ?><br>
    PERIODE : <?= $awal ?> s.d. <?= $akhir ?>
    <?php //echo strtoupper($nama_bulan) ?>
    <?php //echo substr($this->input->post('bulan'), 3, 4) ?>
</b>
<br>
<br>
<table>
    <thead>
        <tr>
            <!--nama anak, tempat dan tanggal lahir, jenis kelamin, keterangan tempat lahi-->
            <th class="text-center">NO</th>
            <th>KELURAHAN</th>
            <?php
            foreach ($variabel as $var) {
                echo '<th class="text-center">' . $var->variabel . '</th>';
            }
            ?>

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
                $n = 0;
                $i = 0;
                foreach ($variabel as $var) {
                    $i++;
                    $total[$i] = isset($total[$i]) ? $total[$i] : '0';

//                    $waktu_a = substr($this->input->post('waktu_a'), 6, 4) . '-' .
//                            substr($this->input->post('waktu_a'), 3, 2) . '-' .
//                            substr($this->input->post('waktu_a'), 0, 2);
//
//                    $waktu_b = substr($this->input->post('waktu_b'), 6, 4) . '-' .
//                            substr($this->input->post('waktu_b'), 3, 2) . '-' .
//                            substr($this->input->post('waktu_b'), 0, 2);
//                    $waktu_a = substr($this->input->post('bulan'), 3, 4) . '-' .
//                            substr($this->input->post('bulan'), 0, 2) . '-01';
//
//                    $lastday = date('t', strtotime($waktu_a));
//
//                    $waktu_b = substr($this->input->post('bulan'), 3, 4) . '-' .
//                            substr($this->input->post('bulan'), 0, 2) . '-' . $lastday;
//                    if ($this->input->post('waktu_a') && $this->input->post('waktu_b')) {
//                        $this->db->where('dp.tanggal >=', $waktu_a);
//                        $this->db->where('dp.tanggal <=', $waktu_b);
//                    } else if ($this->input->post('waktu_a') && !$this->input->post('waktu_b')) {
//                        $this->db->where('dp.tanggal >=', $waktu_a);
//                    } else if (!$this->input->post('waktu_a') && $this->input->post('waktu_b')) {
//                        $this->db->where('dp.tanggal <=', $waktu_b);
//                    }

                    $where_tanggal = "";
                    if ($waktu_a != '-' && $waktu_b != '-') {
//                        $this->db->where('dp.tanggal >=', $waktu_a);
//                        $this->db->where('dp.tanggal <=', $waktu_b);

                        $where_tanggal = ' AND (tanggal >= "' . $waktu_a . '" AND tanggal <= "' . $waktu_b . '") ';
                    } else if ($waktu_a != '-' && $waktu_b == '-') {
//                        $this->db->where('dp.tanggal >=', $waktu_a);
                        $where_tanggal = ' AND (tanggal >= "' . $waktu_a . '") ';
                    } else if ($waktu_a == '-' && $waktu_b != '-') {
//                        $this->db->where('dp.tanggal <=', $waktu_b);
                        $where_tanggal = ' AND (tanggal <= "' . $waktu_b . '") ';
                    }

                    $pengisi = $this->db->select('dp.* FROM data_pengisi dp
                                    INNER JOIN(
                                    SELECT MAX(id_pengisi) AS id, id_pengisi, id_kelurahan, tanggal
                                    FROM data_pengisi
                                    WHERE id_laporan = "' . $laporan->id_laporan . '" 
                                        AND id_kelurahan = "' . $kel->id_kel . '"
                                        ' . $where_tanggal . '
                                    GROUP BY id_kelurahan
                                    ) dp2
                                    ON dp.id_pengisi = dp2.id')
//                            ->where('dp.id_laporan', $laporan->id_laporan)
//                            ->where('dp.id_kelurahan', $kel->id_kel)
                            ->get();

                    if ($pengisi->num_rows() > 0) {
                        foreach ($pengisi->result() AS $pe) {
                            $nilai = $this->db->where('id_pengisi', $pe->id_pengisi)
                                            ->where('id_variabel', $var->id_variabel)
                                            ->get('data_pengisian')->row();
//                                                    echo '<td align="center">' . $nilai . '</td>';

                            $n = isset($nilai->nilai) ? $nilai->nilai : '0';
                            echo '<td align="center">' . $n . '</td>';
                        }
                    } else {
                        echo '<td align="center">' . $n . '</td>';
                    }
                    $total[$i] = $total[$i] + $n;
                }
                ?>
            </tr>
            <?php
            $no++;
        }
//        }
        ?>
        <tr>
            <td colspan="2" align="center">JUMLAH</td>
            <?php
            $i = 0;
            foreach ($variabel as $var) {
                $i++;
                echo '<td align="center">' . $total[$i] . '</td>';
            }
            ?>
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