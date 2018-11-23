
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
        LAPORAN MONOGRAFI DINAMIS<br>
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


$baris1 = $this->db->where('id_laporan', 3)
                ->where('cell', 2)
                ->get('data_variabel')->result();

$kolom1 = $this->db->where('id_laporan', 3)
                ->where('cell', 1)
                ->get('data_variabel')->result();

$no1 = 1;
foreach ($baris1 AS $b1) {
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
}

$tn1 = $n[25] + $n[26] + $n[27] + $n[28];
?>
<table>
    <tr>
        <td style="vertical-align: top">
            <!-- ======================================================================= -->
            <p>I. JUMLAH KEPALA KELUARGA  : <?= $tn1 ?> KK</p>
            <br>
            <p>II. JUMLAH PENDUDUK MENURUT KELOMPOK UMUR</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th rowspan="2">KELOMPOK UMUR</th>
                        <th colspan="2">LAKI-LAKI</th>
                        <th colspan="2">PEREMPUAN</th>
                        <th colspan="3">JUMLAH</th>
                    </tr>
                    <tr>
                        <th>WNI</th>
                        <th>WNA</th>
                        <th>WNI</th>
                        <th>WNA</th>
                        <th>WNI</th>
                        <th>WNA</th>
                        <th>WNI+WNA</th>
                    </tr>
                </thead>
                <tbody align="right">
                    <?php
                    $baris2 = $this->db->where('id_laporan', 4)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom2 = $this->db->where('id_laporan', 4)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no2 = 1;
                    $wni2 = $wna2 = $wniwna2 = 0;
                    $twni2 = $twna2 = $twniwna2 = 0;
                    foreach ($kolom2 AS $k2) {
                        $ntx2[$k2->id_variabel] = 0;
                    }
                    foreach ($baris2 AS $b2) {
                        $nx[$b2->id_variabel] = isset($nx[$b2->id_variabel]) ? $nx[$b2->id_variabel] : 0;
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
                            <td align="left"><?= $b2->variabel ?></td>
                            <?php
                            $tn[30] = $tn[31] = $tn[32] = $tn[33] = 0;
                            foreach ($kolom2 AS $k2) {
                                $tn[$k2->id_variabel] += $n[$k2->id_variabel];
                                ?>
                                <td><?= $n[$k2->id_variabel] ?></td>
                                <?php
                                $nx[$b2->id_variabel] = $n[$k2->id_variabel];
                            }
                            $wni2 = $tn[30] + $tn[32];
                            $wna2 = $tn[31] + $tn[33];
                            $wniwna2 = $wni2 + $wna2;

                            $twni2 += $wni2;
                            $twna2 += $wna2;
                            $twniwna2 += $wniwna2;
                            ?> 
                            <td><?= $wni2 ?></td>
                            <td><?= $wna2 ?></td>
                            <td><?= $wniwna2 ?></td>
                        </tr>                        
                        <?php
                        foreach ($kolom2 AS $k2) {
                            $ntx2[$k2->id_variabel] += $n[$k2->id_variabel];
                        }
                    }
                    ?>
                    <tr>
                        <td align="center">Jumlah</td>
                        <?php
                        $tntx2 = 0;
                        foreach ($kolom2 AS $k2) {
                            $tntx2 += $ntx2[$k2->id_variabel];
                            echo "<td>" . $ntx2[$k2->id_variabel] . "</td>";
                        }
                        ?>
                        <td><?= $twni2 ?></td>
                        <td><?= $twna2 ?></td>
                        <td><?= $twniwna2 ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>III. MUTASI PENDUDUK</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th rowspan="2">MUTASI</th>
                        <th colspan="2">LAKI-LAKI</th>
                        <th colspan="2">PEREMPUAN</th>
                        <th colspan="3">JUMLAH</th>
                    </tr>
                    <tr>
                        <th>WNI</th>
                        <th>WNA</th>
                        <th>WNI</th>
                        <th>WNA</th>
                        <th>WNI</th>
                        <th>WNA</th>
                        <th>WNI+WNA</th>
                    </tr>
                </thead>
                <tbody align="right">
                    <?php
                    $baris3 = $this->db->where('id_laporan', 5)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom3 = $this->db->where('id_laporan', 5)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no3 = 1;
                    $wni3 = $wna3 = $wniwna3 = 0;
                    $twni3 = $twna3 = $twniwna3 = 0;

                    foreach ($kolom3 AS $k3) {
                        $ntx3[$k3->id_variabel] = 0;
                    }
                    foreach ($baris3 AS $b3) {
                        //$ntx9[$b9->id_variabel] = isset($ntx9[$b9->id_variabel]) ? $ntx9[$b9->id_variabel] : 0;
                        $nx[$b3->id_variabel] = isset($nx[$b3->id_variabel]) ? $nx[$b3->id_variabel] : 0;
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
                            <td align="left"><?= $b3->variabel ?></td>
                            <?php
                            $tn[48] = $tn[49] = $tn[50] = $tn[51] = 0;
                            foreach ($kolom3 AS $k3) {
                                $tn[$k3->id_variabel] += $n[$k3->id_variabel];
                                ?>
                                <td><?= $n[$k3->id_variabel] ?></td>
                                <?php
                                $nx[$b3->id_variabel] = $n[$k3->id_variabel];
                            }
                            $wni3 = $tn[48] + $tn[50];
                            $wna3 = $tn[49] + $tn[51];
                            $wniwna3 = $wni3 + $wna3;

                            $twni3 += $wni3;
                            $twna3 += $wna3;
                            $twniwna3 += $wniwna3;
                            ?> 
                            <td><?= $wni3 ?></td>
                            <td><?= $wna3 ?></td>
                            <td><?= $wniwna3 ?></td>


                        </tr>                        
                        <?php
                        foreach ($kolom3 AS $k3) {
                            $ntx3[$k3->id_variabel] += $n[$k3->id_variabel];
                        }
                    }
                    ?>
                    <tr>
                        <td align="center">Jumlah</td>
                        <?php
                        $tntx3 = 0;
                        foreach ($kolom3 AS $k3) {
                            $tntx3 += $ntx3[$k3->id_variabel];
                            echo "<td>" . $ntx3[$k3->id_variabel] . "</td>";
                        }
                        ?>
                        <td><?= $twni3 ?></td>
                        <td><?= $twna3 ?></td>
                        <td><?= $twniwna3 ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <!-- ======================================================================= -->
        </td>
        <td>&nbsp;</td>
        <td style="vertical-align: top">
            <br><br><br>
            <p>IV.  JML PENDUDUK MENURUT PENDIDIKAN ( Umur 5 Tahun Ke Atas )</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>PENDIDIKAN</th>
                        <th>JUMLAH</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris4 = $this->db->where('id_laporan', 6)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom4 = $this->db->where('id_laporan', 6)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no4 = 1;
                    $ntx = 0;
                    foreach ($baris4 AS $b4) {
                        $nx[$b4->id_variabel] = isset($nx[$b4->id_variabel]) ? $nx[$b4->id_variabel] : 0;
                        foreach ($kolom4 AS $k4) {
                            $n[$k4->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b4->id_variabel)
                                                    ->where('id_variabel', $k4->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k4->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b4->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom4 AS $k4) {
                                $nt += $n[$k4->id_variabel];
                                ?>
                                <td><?= $n[$k4->id_variabel] ?></td>
                                <?php
                                $nx[$b4->id_variabel] = $n[$k4->id_variabel];
                            }
                            ?>              
                        </tr>                        
                        <?php
                        $ntx += $nx[$b4->id_variabel];
                    }
                    ?>
                    <tr>
                        <td align="center">Jumlah</td>
                        <td><?= $ntx ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>V.  JML PENDUDUK MENURUT PEKERJAAN ( Umur 10 Tahun Ke Atas )</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>PEKERJAAN</th>
                        <th>JUMLAH</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris5 = $this->db->where('id_laporan', 7)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom5 = $this->db->where('id_laporan', 7)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no5 = 1;
                    $ntx = 0;
                    foreach ($baris5 AS $b5) {
                        $nx[$b5->id_variabel] = isset($nx[$b5->id_variabel]) ? $nx[$b5->id_variabel] : 0;
                        foreach ($kolom5 AS $k5) {
                            $n[$k5->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b5->id_variabel)
                                                    ->where('id_variabel', $k5->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k5->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b5->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom5 AS $k5) {
                                $nt += $n[$k5->id_variabel];
                                ?>
                                <td><?= $n[$k5->id_variabel] ?></td>
                                <?php
                                $nx[$b5->id_variabel] = $n[$k5->id_variabel];
                            }
                            ?>              
                        </tr>                        
                        <?php
                        $ntx += $nx[$b5->id_variabel];
                    }
                    ?>
                    <tr>
                        <td align="center">Jumlah</td>
                        <td><?= $ntx ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
        </td>
        <td>&nbsp;</td>
        <td style="vertical-align: top">
            <br><br><br>
            <p>VI.  BANYAKNYA PEMELUK AGAMA</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>AGAMA</th>
                        <th>JUMLAH</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris6 = $this->db->where('id_laporan', 8)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom6 = $this->db->where('id_laporan', 8)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no6 = 1;
                    $ntx = 0;
                    foreach ($baris6 AS $b6) {
                        $nx[$b6->id_variabel] = isset($nx[$b6->id_variabel]) ? $nx[$b6->id_variabel] : 0;
                        foreach ($kolom6 AS $k6) {
                            $n[$k6->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b6->id_variabel)
                                                    ->where('id_variabel', $k6->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k6->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b6->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom6 AS $k6) {
//                                $nt += $n[$k6->id_variabel];
                                ?>
                                <td><?= $n[$k6->id_variabel]; ?></td>
                                <?php
                                $nx[$b6->id_variabel] = $n[$k6->id_variabel];
                            }
                            ?>              
                        </tr>                        
                        <?php
                        $ntx += $nx[$b6->id_variabel];
                    }
                    ?>
                    <tr>
                        <td align="center">Jumlah</td>
                        <td><?= $ntx ?></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <p>VII.  N T C R</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>KEJADIAN NCTR</th>
                        <th>JUMLAH</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris8 = $this->db->where('id_laporan', 9)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom8 = $this->db->where('id_laporan', 9)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no8 = 1;
                    foreach ($baris8 AS $b8) {
                        foreach ($kolom8 AS $k8) {
                            $n[$k8->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b8->id_variabel)
                                                    ->where('id_variabel', $k8->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k8->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b8->variabel ?></td>
                            <?php
                            foreach ($kolom8 AS $k8) {
                                //$nt += $n[$k1->id_variabel];
                                ?>
                                <td><?= $n[$k8->id_variabel] ?></td>
                            <?php } ?>              
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <br>
        </td>
    </tr>
    <tr>
        <td style="vertical-align: top">
            <br>
            <p>VIII.  JUMLAH HEWAN BESAR DAN KECIL</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>JENIS HEWAN</th>
                        <th>JUMLAH</th>
                        <th>DIPOTONG</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris8 = $this->db->where('id_laporan', 10)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom8 = $this->db->where('id_laporan', 10)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no8 = 1;
                    foreach ($baris8 AS $b8) {
                        foreach ($kolom8 AS $k8) {
                            $n[$k8->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b8->id_variabel)
                                                    ->where('id_variabel', $k8->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k8->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b8->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom8 AS $k8) {
                                $nt += $n[$k8->id_variabel];
                                ?>
                                <td><?= $n[$k8->id_variabel] ?></td>
                            <?php } ?>              
                        </tr>                        
                        <?php
                    }
                    ?>
<!--                        <tr>
<td align="center">Jumlah</td>
<td><?= $nt ?></td>
</tr>-->
                </tbody>
            </table>
            <br>
            <p>IX.  WNI KETURUNAN ASING</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th rowspan="2">KETURUNAN</th>
                        <th colspan="2">DEWASA</th>
                        <th colspan="2">ANAK-ANAK</th>
                        <th rowspan="2">JUMLAH</th>
                    </tr>
                    <tr>
                        <th>L</th>
                        <th>P</th>
                        <th>L</th>
                        <th>P</th>
                    </tr>
                </thead>
                <tbody align="right">
                    <?php
                    $baris9 = $this->db->where('id_laporan', 11)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom9 = $this->db->where('id_laporan', 11)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no9 = 1;
                    // $ntx9[103] = $ntx9[104] = $ntx9[105] = $ntx9[106] = 0;
                    foreach ($kolom9 AS $k9) {
                        $ntx9[$k9->id_variabel] = 0;
                    }
                    foreach ($baris9 AS $b9) {
                        //$ntx9[$b9->id_variabel] = isset($ntx9[$b9->id_variabel]) ? $ntx9[$b9->id_variabel] : 0;
                        $nx[$b9->id_variabel] = isset($nx[$b9->id_variabel]) ? $nx[$b9->id_variabel] : 0;
                        foreach ($kolom9 AS $k9) {
                            $n[$k9->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b9->id_variabel)
                                                    ->where('id_variabel', $k9->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k9->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b9->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom9 AS $k9) {
                                $nt += $n[$k9->id_variabel];
                                ?>
                                <td><?= $n[$k9->id_variabel] ?></td>
                                <?php
                                $nx[$b9->id_variabel] = $n[$k9->id_variabel];
                            }
                            ?> 
                            <td>
                                <?= $nt ?>
                            </td>
                        </tr>                        
                        <?php
//                        $ntx9[103] += $n[103];
                        foreach ($kolom9 AS $k9) {
                            $ntx9[$k9->id_variabel] += $n[$k9->id_variabel];
                        }
                    }
                    ?>
                    <tr>
                        <td align="center">Jumlah</td>
                        <?php
                        $tntx9 = 0;
                        foreach ($kolom9 AS $k9) {
                            $tntx9 += $ntx9[$k9->id_variabel];
                            echo "<td>" . $ntx9[$k9->id_variabel] . "</td>";
                        }
                        echo "<td>" . $tntx9 . "</td>";
                        ?>

                    </tr>
                </tbody>
            </table>
            <br> 
        </td>
        <td>&nbsp;</td>
        <td style="vertical-align: top">
            <br>
            <p>XI.  TANAMAN UTAMA</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>JENIS TANAMAN</th>
                        <th>LUAS</th>
                        <th>DIPANEN</th>
                        <th>RATA-RATA PROD.</th>
                        <th>JUMLAH</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris11 = $this->db->where('id_laporan', 14)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom11 = $this->db->where('id_laporan', 14)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no11 = 1;
                    foreach ($baris11 AS $b11) {
                        foreach ($kolom11 AS $k11) {
                            $n[$k11->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b11->id_variabel)
                                                    ->where('id_variabel', $k11->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k11->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b11->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom11 AS $k11) {
                                $nt += $n[$k11->id_variabel];
                                ?>
                                <td><?= $n[$k11->id_variabel] ?></td>
                            <?php } ?>              
                        </tr>                        
                        <?php
                    }
                    ?>
<!--                        <tr>
<td align="center">Jumlah</td>
<td><?= $nt ?></td>
</tr>-->
                </tbody>
            </table>
            <br>
            <p>XII.  JUMLAH BEBERAPA FASILITAS</p>
            <br>
            <table border="1" width="100%">
                <thead align="center">
                    <tr>
                        <th>BARANG</th>
                        <th>JUMLAH</th>
                    </tr></thead>
                <tbody align="right">
                    <?php
                    $baris12 = $this->db->where('id_laporan', 13)
                                    ->where('cell', 2)
                                    ->get('data_variabel')->result();

                    $kolom12 = $this->db->where('id_laporan', 13)
                                    ->where('cell', 1)
                                    ->get('data_variabel')->result();

                    $no12 = 1;
                    foreach ($baris12 AS $b12) {
                        foreach ($kolom12 AS $k12) {
                            $n[$k12->id_variabel] = 0;
                            if ($q_kelurahan->num_rows() > 0) {
                                foreach ($q_kelurahan->result() AS $kel) {
                                    $q = $this->db
                                                    ->where('id_kelurahan', $kel->id_kel)
                                                    ->where('id_variabel2', $b12->id_variabel)
                                                    ->where('id_variabel', $k12->id_variabel)
                                                    ->get('data_pengisian')->row();

                                    $n[$k12->id_variabel] += isset($q) ? $q->nilai : 0;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td align="left"><?= $b12->variabel ?></td>
                            <?php
                            $nt = 0;
                            foreach ($kolom12 AS $k5) {
                                $nt += $n[$k12->id_variabel];
                                ?>
                                <td><?= $n[$k12->id_variabel] ?></td>
                            <?php } ?>              
                        </tr>                        
                        <?php
                    }
                    ?>
<!--                        <tr>
<td align="center">Jumlah</td>
<td><?= $nt ?></td>
</tr>-->
                </tbody>
            </table>
            <br>
        </td>
    </tr>
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

