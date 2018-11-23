
<section class="content">
    <div class="box box-danger">
        <div class="box-body">
            <div class="row" style="margin: 0 10px 0 10px">
                <div class="col-lg-12" style="text-align: right">
                    <a href="<?= site_url() ?>/master_monografi/hasil/<?= $id_laporan ?>"
                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                    </a>
                    <br><br>
                </div>
            
            <div class="col-lg-12">
            
                        <input type="hidden" name="takok" value="<?= isset($master_monografi->id_laporan) ? $master_monografi->id_laporan : '' ?>"/>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Kelurahan</label>
                            <div class="col-sm-5">
                                <?= $form_kelurahan; ?>

                            </div>
                        </div>
                        <div class="row" style="padding-top:10px">
                            <label class="col-sm-2 control-label">Tanggal</label>
                            <div class="col-sm-5">
                                <?php
//                                $readonly = '';
//                                if ($id != null)
                                $readonly = 'readonly';
                                ?>
                                <input name="periode" id="periode" type="text" class="form-control number date-picker" required <?= $readonly ?>
                                       autocomplete="off" value="<?= isset($post_periode) ? $post_periode : date('m') . '/' . date('Y') ?>">
                            </div>
                        </div>
                        <br><br>
                            <div class="col-lg-12">
                                <div id="list_data" class="col-md-12 table-responsive">
                                    <input type="hidden" name="jumlah_kolom" value="<?= $jumlah_kolom ?>"/>
                                    <input type="hidden" name="jumlah_baris" value="<?= $jumlah_baris ?>"/>
                                    <table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap; width:100%">
                                        <thead style="background-color: #ffffff; color:#666;">
                                        <td width="5%">NO</td>
                                        <td width="10%" class="text-center">VARIABEL</td>
                                        <?php foreach ($data_kolom AS $kolom) { ?>
                                            <td width="20%" class="text-center"><?= $kolom->variabel ?></td>
                                        <?php } ?>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $n = $y = $x = 0;
                                            foreach ($data_baris AS $baris) {
                                                $y++;
                                                ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $baris->variabel ?></td>
                                                    <?php
                                                    foreach ($data_kolom AS $kolom) {
                                                        $x++;
                                                        $n = $x + $y;

                                                        $nilai = 0;
                                                        $id_pengisian = '';
                                                        if (isset($data_pengisi)) {
                                                            $pengisian = $this->db->where("id_pengisi", $data_pengisi->id_pengisi)
                                                                            ->where('id_variabel', $kolom->id_variabel)
                                                                            ->where('id_variabel2', $baris->id_variabel)
                                                                            ->from('data_pengisian')->get()->row();
                                                            $nilai = ((isset($pengisian)) ? $pengisian->nilai : "0");
                                                            $id_pengisian = ((isset($pengisian)) ? $pengisian->id_pengisian : "0");
                                                        }
                                                        ?>
                                                        <td><?php //echo $x . ' (' . $baris->variabel . ',' . $kolom->variabel . ')'        ?>
                                                            <div class="form-group">
                                                                <div class="col-lg-12">
                                                                    <input type="text" class="form-control number text-right" placeholder="" readonly
                                                                           id="nilai<?= $x ?>" name="nilai<?= $x ?>" 
                                                                           value="<?= $nilai ?>" required="">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_pengisian<?= $x ?>" 
                                                                   value="<?= $id_pengisian ?>">
                                                            <input type="hidden" name="kolom<?= $x ?>" value="<?= $kolom->id_variabel ?>"/>
                                                            <input type="hidden" name="baris<?= $x ?>" value="<?= $baris->id_variabel ?>"/>
                                                        </td>
                                                    <?php }
                                                    ?>
                                                </tr>
                                                <?php
                                                $no++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                       
                       
              
            </div>
            </div>
        </div>
    </div>
</section><!-- /.content -->
