
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="merah">DAFTAR TAMU</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">



            <div class="col-md-12" style="padding: 15px !important;">
    <div class="row">
        <div class="col-md-4">
                        <input type="text" name="" class="form-control" placeholder="Cari">
        </div>
        <div class="col-md-2">
            <button class="btn btn-success" style="border-radius: 0 !important;">Filter</button>
        </div>
        <div class="col-md-6" style="text-align: right !important;">
            <img src="<?php echo base_url(); ?>assets/images/buku_tamu.png" style="height: 30px !important">
        </div>
    </div><br>

    <table id="data_laporan" class="table table-bordered table-striped table-hover">
        <thead>
            <th class="text-center" width="3%">No.</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Hari & Tanggal</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Alamat</th>
            <th class="text-center">Maksud & Tujuan</th>
            <th class="text-center">Tanda Tangan</th>
            <th class="text-center">Keterangan</th>
        </thead>
        <tbody>
            <tr>
                <td class="text-center pp">1.</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/orang.png"><br>Vembri Eko Haryono</td>
                <td class="text-center pp">Selasa<br>14 Nov 2018</td>
                <td class="text-center pp">Masyarakat Umum</td>
                <td class="text-center pp">Jl Duren Sawit RT 06 RW 15. Kab Barru</td>
                <td class="text-center pp">Mengajukan Proposal MUSRENBANG</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/lihat_detail.png" style="height: 25px !important;" data-toggle="modal" data-target="#Modalku"></td>
                <td class="text-center pp"></td>
            </tr>
            <tr>
                <td class="text-center pp">2.</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/orang.png"><br>AKBP Hadi Suparno</td>
                <td class="text-center pp">Selasa<br>14 Nov 2018</td>
                <td class="text-center pp">KEPOLISIAN</td>
                <td class="text-center pp">MABES POLDA Selawesi Tengah</td>
                <td class="text-center pp">Koordinasi Pengamanan Wilayah</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/lihat_detail.png" style="height: 25px !important;" data-toggle="modal" data-target="#Modalku"></td>
                <td class="text-center pp"></td>
            </tr>
            <tr>
                <td class="text-center pp">3.</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/orang.png"><br>Vembri Eko Haryono</td>
                <td class="text-center pp">Selasa<br>14 Nov 2018</td>
                <td class="text-center pp">Masyarakat Umum</td>
                <td class="text-center pp">Jl Duren Sawit RT 06 RW 15. Kab Barru</td>
                <td class="text-center pp">Mengajukan Proposal MUSRENBANG</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/lihat_detail.png" style="height: 25px !important;" data-toggle="modal" data-target="#Modalku"></td>
                <td class="text-center pp"></td>
            </tr>
            <tr>
                <td class="text-center pp">4.</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/orang.png"><br>AKBP Hadi Suparno</td>
                <td class="text-center pp">Selasa<br>14 Nov 2018</td>
                <td class="text-center pp">KEPOLISIAN</td>
                <td class="text-center pp">MABES POLDA Selawesi Tengah</td>
                <td class="text-center pp">Koordinasi Pengamanan Wilayah</td>
                <td class="text-center pp"><img src="<?php echo base_url(); ?>assets/images/lihat_detail.png" style="height: 25px !important;" data-toggle="modal" data-target="#Modalku"></td>
                <td class="text-center pp"></td>
            </tr>
        </tbody>
    </table>
>
                </div>
            </div>      
        </div>
    </div>
</section><!-- /.content -->

<div id="modal_form" class="modal" role="dialog">
    <div class="example-modal">
        <div class="modal-danger">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="title modal-title"></h4>
                    </div>
                    <div id="box-body" class="box-body">
                    </div>
                    <div class="box-footer">
                        <div class="col-md-6 text-left">
                            <image id="loading" src="<?= base_url('assets/images/loading.gif') ?>" style="display:none">
                        </div>
                        <div class="col-md-6">
                            &nbsp;&nbsp;
                            <button id="btn_save" class="btn_save btn pull-right" style="margin-left:10px"></button>&nbsp;&nbsp;
                            <button data-dismiss="modal" id="btn_batal" class="btn pull-right" >BATAL</button>&nbsp;&nbsp;
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal-danger -->
    </div><!-- /.example-modal -->
</div><!-- /.modal -->


<div id="Modalku" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="text-align: center !important;">
        <img src="<?php echo base_url(); ?>assets/images/logo.png" width="60%" >
      </div>
      <div class="modal-body">
        <div class="col-md-7 lang">
            <label>Nama Peserta</label>
            <select name="" class="form-control">
                <option>Angga</option>
                <option>Vembri</option>
            </select>
        </div>
        <div class="col-md-5">
            <label>&nbsp;</label>
            <button class="btn btn-danger ttd">+</button><div class="qq1">Tambah peserta baru (Jika di Data Peserta Tidak ada</div>
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-7">
            <label>Tanda Tangan Peserta</label>
            <textarea name="" class="form-control" rows="5"></textarea>
        </div>
        <div class="col-md-12">&nbsp;</div>
      </div>
      <div class="modal-footer">
        <div class="col-md-7" style="padding-left: 0 !important;">
        <button type="button" class="btn btn-agenda form-control" style="border-radius: 0 !important;">Isi Daftar Peserta</button>
    </div>
      </div>
    </div>

  </div>
</div>