
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="merah">DATA KEGIATAN</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">



            <div class="col-md-12" style="padding-top: 20px !important;">

                <div class="row" style="padding-bottom: 10px !important;">
                    <div class="col-md-3">
                        <input type="text" name="" class="form-control" placeholder="Cari Kegiatan / SKPD">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="" class="form-control" placeholder="Tanggal Kegiatan">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-filter">Filter</button>
                    </div>
                </div>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">List Kegiatan</a></li>
  <li><a data-toggle="tab" href="#menu1">Sedang Berlangsung</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="row" style="margin-bottom: 30px !important;">
        <div class="col-md-2" style="padding-right: 0 !important;"><img src="<?php echo base_url(); ?>assets/images/gambar.png" width="70%"></div>
        <div class="col-md-10" style="padding-left: 0 !important;">
            <table width="100%" border="0" class="kegiatan">
                <tr>
                    <td width="120">Nama Kegiatan</td>
                    <td>: </td>
                    <td>Senam Bersama</td>
                </tr>
                <tr>
                    <td>Waktu Kegiatan</td>
                    <td>: </td>
                    <td>Jumat, 15 November 2018</td>
                </tr>
                <tr>
                    <td>SKPD</td>
                    <td>: </td>
                    <td>Dinas Kesehatan Kab. Barru</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 7px !important;"><a href="<?= site_url() ?>/kegiatan/daftar"><img src="<?php echo base_url(); ?>assets/images/hadir.png" height="20"></a></td>
                    <td style="padding-top: 7px !important;"><img src="<?php echo base_url(); ?>assets/images/kegiatan.png" height="20"></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-bottom: 30px !important;">
        <div class="col-md-2" style="padding-right: 0 !important;"><img src="<?php echo base_url(); ?>assets/images/gambar.png" width="70%"></div>
        <div class="col-md-10" style="padding-left: 0 !important;">
            <table width="100%" border="0" class="kegiatan">
                <tr>
                    <td width="120">Nama Kegiatan</td>
                    <td>: </td>
                    <td>Senam Bersama</td>
                </tr>
                <tr>
                    <td>Waktu Kegiatan</td>
                    <td>: </td>
                    <td>Jumat, 15 November 2018</td>
                </tr>
                <tr>
                    <td>SKPD</td>
                    <td>: </td>
                    <td>Dinas Kesehatan Kab. Barru</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 7px !important;"><a href="<?= site_url() ?>/kegiatan/daftar"><img src="<?php echo base_url(); ?>assets/images/hadir.png" height="20"></a></td>
                    <td style="padding-top: 7px !important;"><img src="<?php echo base_url(); ?>assets/images/kegiatan.png" height="20"></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-bottom: 30px !important;">
        <div class="col-md-2" style="padding-right: 0 !important;"><img src="<?php echo base_url(); ?>assets/images/gambar.png" width="70%"></div>
        <div class="col-md-10" style="padding-left: 0 !important;">
            <table width="100%" border="0" class="kegiatan">
                <tr>
                    <td width="120">Nama Kegiatan</td>
                    <td>: </td>
                    <td>Senam Bersama</td>
                </tr>
                <tr>
                    <td>Waktu Kegiatan</td>
                    <td>: </td>
                    <td>Jumat, 15 November 2018</td>
                </tr>
                <tr>
                    <td>SKPD</td>
                    <td>: </td>
                    <td>Dinas Kesehatan Kab. Barru</td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 7px !important;"><a href="<?= site_url() ?>/kegiatan/daftar"><img src="<?php echo base_url(); ?>assets/images/hadir.png" height="20"></a></td>
                    <td style="padding-top: 7px !important;"><img src="<?php echo base_url(); ?>assets/images/kegiatan.png" height="20"></td>
                </tr>
            </table>
        </div>
    </div>



  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
</div>



            </div>




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

