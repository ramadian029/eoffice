
<style typew="text/css">
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
<table width="100%">
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
<br><br>
<table border="1" style="white-space: nowrap; width:100%">
    <thead style="" class="text-bold text-center">
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
                    <td align="right"><?= isset($row->total_anggaran) ? number_format($row->total_anggaran, 2, ",", ".") : '0' ?></td>
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
                    <td align="right"><?= number_format($spj1x, 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($spj1, 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($sd_bulan_ini['spj1'], 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($spj2x, 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($spj2, 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($sd_bulan_ini['spj2'], 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($spj3x, 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($spj3, 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($sd_bulan_ini['spj3'], 2, ",", ".") ?></td>
                    <td align="right"><?= number_format($sd_bulan_ini['total_spj'], 2, ",", ".") ?></td>

                    <td align="right"><?= number_format($sisa, 2, ",", ".") ?></td>
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
                <td colspan="2" align="right">Jumlah</td>
                <td align="right"><?= number_format($t_anggaran, 2, ",", ".") ?></td>

                <td align="right"><?= number_format($t_spj1_a, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj1_b, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj1_c, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj2_a, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj2_b, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj2_c, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj3_a, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj3_b, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj3_c, 2, ",", ".") ?></td>
                <td align="right"><?= number_format($t_spj, 2, ",", ".") ?></td>

                <td align="right"><?= number_format($t_sisa, 2, ",", ".") ?></td>
            </tr>
            <?php
        } else {
            ?>
        <td class="text-center" colspan="8">Tidak Ada Data</td>
    <?php } ?>
</tbody>
</table>
