
<section class="content">
    <div class="box box-danger">
        <div class="box-body">
            <div class="row" style="margin: 0 10px 0 10px">
                <div class="col-lg-12" style="text-align: right">
                    <a href="<?= site_url() ?>/data-arsip"
                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                    </a>
                    <br><br>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 pd-0" >
                    <table id="table" class="table table-bordered table-striped table-hover" 
                           style=" width:100%;margin-right: 5px">
                        <tbody>
                            <?php if (isset($data_arsip->nama_kel)) { ?>
                                <tr>
                                    <td width="30%"><strong>Kelurahan</strong></td>
                                    <td width="70%"><?= ((isset($data_arsip)) ? $data_arsip->nama_kel : "") ?></td>
                                </tr>
                            <?php } else { ?>
                                <tr>
                                    <td width="30%"><strong>Kecamatan</strong></td>
                                    <td width="70%">Gajahmungkur</td>
                                </tr>
                            <?php }?>
                            <tr>
                                <td width="35%"><strong>Tanggal</strong></td>
                                <td width="65%"><?php
                                    if (isset($data_arsip)) {
                                        $tanggal = substr($data_arsip->tanggal, 8, 2) . '/' .
                                                substr($data_arsip->tanggal, 5, 2) . '/' .
                                                substr($data_arsip->tanggal, 0, 4);
                                        echo $tanggal;
                                    }
                                    ?>
                            </tr>
                            <tr>
                                <td width="35%"><strong>Perihal</strong></td>
                                <td width="65%"><?= ((isset($data_arsip)) ? $data_arsip->perihal : "") ?></td>
                            </tr>
                            <tr>
                                <td width="35%"><strong>Resume</strong></td>
                                <td width="65%"><?= ((isset($data_arsip)) ? $data_arsip->resume : "") ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 pd-0">

                    <table id="table" class="table table-bordered table-striped table-hover" 
                           style="width:100%; margin-left: 5px">
                        <tbody>

                            <tr>
                                <td width="30%"><strong>Keterangan</strong></td>
                                <td width="70%"><?= ((isset($data_arsip)) ? $data_arsip->keterangan : "") ?></td>
                            </tr>
                            <tr>
                                <td width="30%"><strong>Tanggal Entry</strong></td>
                                <td width="70%"><?php
                                    if (isset($data_arsip)) {
                                        $tgl = substr($data_arsip->waktu, 8, 2) . '/' .
                                                substr($data_arsip->waktu, 5, 2) . '/' .
                                                substr($data_arsip->waktu, 0, 4);
                                        echo $tgl . ' ' . substr($data_arsip->waktu, 10);
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
