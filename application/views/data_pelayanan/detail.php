
<section class="content">
    <div class="box box-danger">
        <div class="box-body">
            <div class="row" style="margin: 0 10px 0 10px">
                <div class="col-lg-12" style="text-align: right">
                    <a href="<?= site_url() ?>/data-pelayanan/<?= $layanan ?>"
                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                    </a>
                    <br><br>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 pd-0" >
                    <table id="table" class="table table-bordered table-striped table-hover" 
                           style=" width:100%;margin-right: 5px">
                        <tbody>
                            <tr>
                                <td width="30%"><strong>WNI/WNA</strong></td>
                                <td width="70%"><?php
                                    $wni = ((isset($data_layanan)) ? $data_layanan->wni : "");
                                    if ($wni == 1)
                                        echo 'WNI';
                                    else
                                        echo 'WNA';
                                    ?></td>
                            </tr>
                            <?php if ($layanan == 'lahir') { ?>
                                <tr>
                                    <td width="35%"><strong>Nama Anak</strong></td>
                                    <td width ="65%"><?= ((isset($data_layanan)) ? $data_layanan->nama_anak : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Jenis Kelamin</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            if ($data_layanan->jenis_kelamin == 1)
                                                echo 'Laki-laki';
                                            else
                                                echo 'Perempuan';
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Nama Ayah</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->nama_ayah : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Nama Ibu</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->nama_ibu : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Tempat, Tanggal Lahir</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            $tgl_lahir = substr($data_layanan->tgl_lahir, 8, 2) . '/' .
                                                    substr($data_layanan->tgl_lahir, 5, 2) . '/' .
                                                    substr($data_layanan->tgl_lahir, 0, 4);
                                            echo $data_layanan->tempat_lahir . ', ' . $tgl_lahir;
                                        }
                                        ?>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Tempat Bersalin</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->tempat_bersalin : "") ?></td>
                                </tr>
                            <?php } else if ($layanan == 'mati') { ?>
                                <tr>
                                    <td width="35%"><strong>NIK</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->nik : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Nama</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->nama : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Jenis Kelamin</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            if ($data_layanan->jenis_kelamin == 1)
                                                echo 'Laki-laki';
                                            else
                                                echo 'Perempuan';
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Tempat, Tanggal Lahir</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            $tgl_lahir = substr($data_layanan->tgl_lahir, 8, 2) . '/' .
                                                    substr($data_layanan->tgl_lahir, 5, 2) . '/' .
                                                    substr($data_layanan->tgl_lahir, 0, 4);
                                            echo $data_layanan->tempat_lahir . ', ' . $tgl_lahir;
                                        }
                                        ?>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Tanggal Meninggal</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            $tgl_meninggal = substr($data_layanan->tgl_meninggal, 8, 2) . '/' .
                                                    substr($data_layanan->tgl_meninggal, 5, 2) . '/' .
                                                    substr($data_layanan->tgl_meninggal, 0, 4);
                                            echo $tgl_meninggal;
                                        }
                                        ?>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Pendidikan</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->pendidikan : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Pekerjaan</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->pekerjaan : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Agama</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->agama : "") ?></td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td width="35%"><strong>NIK</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->nik : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Nama</strong></td>
                                    <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->nama : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Jenis Kelamin</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            if ($data_layanan->jenis_kelamin == 1)
                                                echo 'Laki-laki';
                                            else
                                                echo 'Perempuan';
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td width="35%"><strong>Tempat, Tanggal Lahir</strong></td>
                                    <td width="65%"><?php
                                        if (isset($data_layanan)) {
                                            $tgl_lahir = substr($data_layanan->tgl_lahir, 8, 2) . '/' .
                                                    substr($data_layanan->tgl_lahir, 5, 2) . '/' .
                                                    substr($data_layanan->tgl_lahir, 0, 4);
                                            echo $data_layanan->tempat_lahir . ', ' . $tgl_lahir;
                                        }
                                        ?>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td width="35%"><strong>Keterangan</strong></td>
                                <td width="65%"><?= ((isset($data_layanan)) ? $data_layanan->keterangan : "") ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 pd-0">

                    <table id="table" class="table table-bordered table-striped table-hover" 
                           style="width:100%; margin-left: 5px">
                        <tbody>

                            <?php if ($layanan == 'lahir' || $layanan == 'mati') { ?>
                                <tr>
                                    <td width="30%"><strong>Alamat</strong></td>
                                    <td width="70%"><?= ((isset($data_layanan)) ? $data_layanan->alamat : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="30%"><strong>RT / RW</strong></td>
                                    <td width="70%"><?= ((isset($data_layanan)) ? $data_layanan->rt . ' / ' . $data_layanan->rw : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="30%"><strong>Kelurahan</strong></td>
                                    <td width="70%"><?= ((isset($data_layanan)) ? $data_layanan->nama_kel : "") ?></td>
                                </tr>
                                <tr>
                                    <td width="30%"><strong>Kecamatan</strong></td>
                                    <td width="70%"><?= ((isset($data_layanan)) ? $data_layanan->nama_kec : "") ?></td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td width="30%"><strong>Jenis Pindah</strong></td>
                                    <td width="70%"><?= ((isset($data_layanan)) ? $data_layanan->jenis_pindah : "") ?></td>
                                </tr>
                                <?php if ($layanan = 'pindah_datang') { ?>
                                    <tr>
                                        <td><strong>Alamat Asal</strong></td>
                                        <td><?php
                                            if (isset($data_layanan)) {
                                                $kelurahan_asal = ((isset($data_layanan->kelurahan_asal)) ? ', Kel. ' . $data_layanan->kelurahan_asal : "");
                                                if ($data_layanan->jenis_pindah == 'Antar Kelurahan') {
                                                    $ka = $this->db->where('id_kel', $data_layanan->id_kelurahan)
                                                                    ->get('data_kelurahan')->row()->nama_kel;
                                                    $kelurahan_asal = ', Kel. ' . $ka;
                                                }

                                                echo $data_layanan->alamat_asal . ((isset($data_layanan->rt_asal)) ? ' RT. ' .
                                                        $data_layanan->rt_asal : "") .
                                                ((isset($data_layanan->rw_asal)) ? ' RW. ' . $data_layanan->rw_asal : "") .
                                                $kelurahan_asal .
                                                ((isset($data_layanan->kecamatan_asal)) ? ', Kec. ' . $data_layanan->kecamatan_asal : "") .
                                                ((isset($data_layanan->kota_asal)) ? ', ' . $data_layanan->kota_asal : "") .
                                                ((isset($data_layanan->provinsi_asal)) ? ', ' . $data_layanan->provinsi_asal : "") .
                                                ((isset($data_layanan->negara_asal)) ? ', ' . $data_layanan->negara_asal : "");
                                            }
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alamat Tujuan</strong></td>
                                        <td><?php
                                            if (isset($data_layanan)) {
                                                echo $data_layanan->alamat_tujuan . ((isset($data_layanan->rt_tujuan)) ? ' RT. ' .
                                                        $data_layanan->rt_tujuan : "") .
                                                ((isset($data_layanan->rw_tujuan)) ? ' RW. ' . $data_layanan->rw_tujuan : "") .
                                                ((isset($data_layanan->nama_kel)) ? ', Kel. ' . $data_layanan->nama_kel : "");
                                            }
                                            ?></td>
                                    </tr>
                                    <?php
                                } else if ($layanan = 'pindah_luar') {
                                    ?>
                                    <tr>
                                        <td><strong>Alamat Asal</strong></td>
                                        <td><?php
                                            if (isset($data_layanan)) {
                                                echo $data_layanan->alamat_asal .
                                                ((isset($data_layanan->rt_asal)) ? ' RT. ' . $data_layanan->rt_asal : "") .
                                                ((isset($data_layanan->rw_asal)) ? ' RW. ' . $data_layanan->rw_asal : "") .
                                                ((isset($data_layanan->nama_kel)) ? ', Kel. ' . $data_layanan->nama_kel : "");
                                            }
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Alamat Tujuan</strong></td>
                                        <td><?php
                                            if (isset($data_layanan)) {
                                                     $kelurahan_tujuan = ((isset($data_layanan->kelurahan_tujuan)) ? ', Kel. ' . 
                                                             $data_layanan->kelurahan_tujuan : "");
                                                if ($data_layanan->jenis_pindah == 'Antar Kelurahan') {
                                                    $kt = $this->db->where('id_kel', $data_layanan->kelurahan_tujuan)
                                                                    ->get('data_kelurahan')->row()->nama_kel;
                                                    $kelurahan_tujuan = ', Kel. ' . $kt;
                                                }
                                                
                                                echo $data_layanan->alamat_tujuan .
                                                ((isset($data_layanan->rt_tujuan)) ? ' RT. ' . $data_layanan->rt_tujuan : "") .
                                                ((isset($data_layanan->rw_tujuan)) ? ' RW. ' . $data_layanan->rw_tujuan : "") .
                                                $kelurahan_tujuan .
                                                ((isset($data_layanan->kecamatan_tujuan)) ? ', Kec. ' . $data_layanan->kecamatan_tujuan : "") .
                                                ((isset($data_layanan->kota_tujuan)) ? ', ' . $data_layanan->kota_tujuan : "") .
                                                ((isset($data_layanan->provinsi_tujuan)) ? ', ' . $data_layanan->provinsi_tujuan : "") .
                                                ((isset($data_layanan->negara_tujuan)) ? ', ' . $data_layanan->negara_tujuan : "");
                                            }
                                            ?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td width="30%"><strong>Tanggal Entry</strong></td>
                                <td width="70%"><?php
                                    if (isset($data_layanan)) {
                                        $tgl = substr($data_layanan->waktu, 8, 2) . '/' .
                                                substr($data_layanan->waktu, 5, 2) . '/' .
                                                substr($data_layanan->waktu, 0, 4);
                                        echo $tgl . ' ' . substr($data_layanan->waktu, 10);
                                    }
                                    ?>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>      
        </div>
    </div>
</section><!-- /.content -->
