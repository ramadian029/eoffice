
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="merah">DATA AGENDA</div>
        <div class="col-lg-12 col-md-12 col-xs-12 pd-0 mintinggi">
            <div class="box box-danger">
                <div class="box-body">



            <div class="col-md-12" style="padding: 15px !important;">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="" class="form-control" placeholder="Cari">
                    </div>
                    <div class="col-md-4"><button class="btn btn-success" style="border-radius: 0 !important;">Cari</button></div>
                    <div class="col-md-4"><img src="<?php echo base_url(); ?>assets/images/buat_agenda.png" width="70%" data-toggle="modal" data-target="#myModal" style="float: right;"></div>
                </div><br><br>
                <table width="100%">
                    <tr>
                        <td width="70">
                            <div class="kotakagenda">
                                <div class="xz">
                                    <h1 class="tgl">20</h1>
                                    <div class="bulan">Nov 2018</div>
                                </div>
                            </div>
                        </td>
                        <td class="wwe">
                            <h6 class="judul_agenda">Rapat Munresbang Kab. Barru</h6>
                            <div class="wwa">
                                Pk 08.00 - 12.00 WITA<br>
                                Gedung utama DPRD Kab. Barru
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="70">
                            <div class="kotakagenda">
                                <div class="xz">
                                    <h1 class="tgl">20</h1>
                                    <div class="bulan">Nov 2018</div>
                                </div>
                            </div>
                        </td>
                        <td class="wwe">
                            <h6 class="judul_agenda">Rapat Munresbang Kab. Barru</h6>
                            <div class="wwa">
                                Pk 08.00 - 12.00 WITA<br>
                                Gedung utama DPRD Kab. Barru
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="70">
                            <div class="kotakagenda">
                                <div class="xz">
                                    <h1 class="tgl">20</h1>
                                    <div class="bulan">Nov 2018</div>
                                </div>
                            </div>
                        </td>
                        <td class="wwe">
                            <h6 class="judul_agenda">Rapat Munresbang Kab. Barru</h6>
                            <div class="wwa">
                                Pk 08.00 - 12.00 WITA<br>
                                Gedung utama DPRD Kab. Barru
                            </div>
                        </td>
                    </tr>
                </table>
                <table width="100%">
                    <tr>
                        <td width="70">
                            <div class="kotakagenda">
                                <div class="xz">
                                    <h1 class="tgl">20</h1>
                                    <div class="bulan">Nov 2018</div>
                                </div>
                            </div>
                        </td>
                        <td class="wwe">
                            <h6 class="judul_agenda">Rapat Munresbang Kab. Barru</h6>
                            <div class="wwa">
                                Pk 08.00 - 12.00 WITA<br>
                                Gedung utama DPRD Kab. Barru
                            </div>
                        </td>
                    </tr>
                </table>


>
                </div>
            </div>      
        </div>
    </div>
</section><!-- /.content -->

<!-- modal -->
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
</div>
<!-- /.modal -->

<div id="myModal" class="modal fade" role="dialog">
<form id="form-tambah" data-parsley-validate method="POST" action="">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="text-align: center !important;">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <img src="<?php echo base_url(); ?>assets/images/logo.png" width="60%" >
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label>Nama Kegiatan</label>
            <input type="text" name="nama" class="form-control">
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="col-md-6">
            <label>Waktu Kegiatan</label>
            <input type="time" name="waktu" class="form-control">
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <label>Lokasi Kegiatan</label>
            <input type="text" name="lokasi" class="form-control">
        </div>
        <div class="col-md-6">
            <label>Kuota Kegiatan</label>
            <input type="text" name="kuota" class="form-control">
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-12">
            <label>Deskripsi Kegiatan</label>
            <textarea name="deskripsi" class="form-control" rows="4"></textarea>
        </div>
        <div class="col-md-12">&nbsp;</div>
      </div>
      <div class="modal-footer">
        <button type="button" id="btn_tambah" class="btn btn-agenda form-control">Buat Agenda</button>
      </div>
    </div>

  </div>
</form>
</div>

<script type="text/javascript">

            $('#btn_tambah').click(function() {
                $('#form-tambah').attr('action','<?=site_url()?>Agenda/tambahDaftar');
                $('#form-tambah').ajaxForm({
                    success:    function(response){
                        if(response=='true'){
                            tabel.api().ajax.reload();
                            swal($('.modal-title').html() + ' Sukses');
                            $('#form-tambah')[0].reset();
                            $('#modal-tambah').modal('hide');
                        }else{
                            swal($('.modal-title').html() + ' Gagal');
                        }
                    },
                    error: function(){
                        swal('ERROR : function(response)');
                    }
                }).submit();
            });

</script>

