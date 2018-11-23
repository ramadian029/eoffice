
<section class="content">
    <div class="box box-danger">
        <div class="box-body">
            <div class="row" style="margin: 0 10px 0 10px">
                <div class="col-lg-12" style="text-align: right">
                    <a href="javascript:window.history.go(-1);">
                       <button type="button" class="btn btn-default"><i class="fa fa-chevron-left" aria-hidden="true"></i> KEMBALI</button>
                    </a>
                    <br><br>
                </div>
                <div class="col-lg-8 col-md-12 col-xs-12 pd-0" >
                    <table id="table" class="table table-bordered table-striped table-hover" 
                           style=" width:100%;margin-right: 5px; ">
                        <tbody>
                            <tr>
                                <td width="50%">Tahun</td><td colspan="2" width="50%"><?= !empty($data_anggaran) ? $data_anggaran->tahun : '-' ?></td>
                            </tr>
                            <tr>
                                <td>Kode Rekening</td><td colspan="2"><?= !empty($data_anggaran) ? $data_anggaran->kode_rekening : '-' ?></td>
                            </tr>
                            <tr>
                                <td>Uraian</td><td colspan="2"><?= !empty($data_anggaran) ? $data_anggaran->uraian : '-' ?></td>
                            </tr>
                            <tr>
                                <td>Jumlah Anggaran</td><td colspan="2"><?= !empty($data_anggaran) ? 'Rp. ' . number_format($data_anggaran->nominal, 2, ",", ".") : '-' ?></td>
                            </tr>
                            <tr>
                                <td><strong>Kelurahan</strong></td><td colspan="2"><strong>Nominal</strong></td>
                            </tr>
                            <?php
                            $id_anggaran = !empty($data_anggaran) ? $data_anggaran->id_anggaran : '';
                            $kelurahan = $this->db->select('a.id_kel, a.nama_kel, b.*')
                                    ->join('anggaran_kelurahan b', 'a.id_kel = b.id_kelurahan', 'left')
                                    ->from('data_kelurahan a')
                                    ->where("(b.id_anggaran = $id_anggaran OR b.id_anggaran IS NULL)")
                                    ->where('(b.flag = 0 OR b.flag IS NULL)')
                                    ->where('(a.flag = 0 OR a.flag IS NULL)')
                                    ->order_by('a.kode_kel','ASC')
                                    ->get();

                            //echo $this->db->last_query();
                            $total = 0;
                            foreach ($kelurahan->result() AS $kel) {
                                $n = isset($kel->nominal) ? (float) $kel->nominal : 0;
                                $total += $n;
                                
                                $label = "";
                                if($kel->id_kel == 0)
                                    $label = "Kecamatan";
                                ?>

                                <tr>
                                    <td><?= $label .' '.$kel->nama_kel ?></td><td width="10%">Rp. </td><td align="right"><?= isset($kel->nominal) ? number_format($kel->nominal, 2, ",", ".") : '0' ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            <tr>
                                <td><strong>Total</strong></td><td width="10%"><strong>Rp. </strong></td><td align="right"><strong><?= number_format($total, 2, ",", ".") ?></strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4 col-md-12 col-xs-12 pd-0">

                    <table id="table" class="table table-bordered table-striped table-hover" 
                           style="width:100%; margin-left: 5px">
                        <tbody>

                        </tbody>
                    </table>

                </div>

            </div>      
        </div>
    </div>
</section><!-- /.content -->
