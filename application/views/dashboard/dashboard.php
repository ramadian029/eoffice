<!-- START TAMPIL DATA TABLE -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#tampil_grafik').load("<?php echo site_url('grafik/grafik') ?>");
    });
</script>

<script type="text/javascript">
    $(function() {
        $(document).on('change', '#kelurahan', function() {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('grafik/grafik/') ?>" + $("#kelurahan").val(),
                success: function(result) {
                    $('#tampil_grafik').html(result);
                },
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#data_laporan').DataTable({
            columnDefs: [
                {"orderable": false, "targets": 0},
                {"orderable": false, "targets": -1, "searchable": false}
            ],
            responsive: true,
        });
    });
</script>

<style type="text/css">
.dataTables_filter, .dataTables_length { display: none !important; }    
table.dataTable thead th, table.dataTable tbody tr td {
    border:0 !important;
}
</style>

<section class="content">
    <div class="row">


<div class="col-md-4" style="padding-left: 0 !important;">
    <div class="d_pa">
        <div class="satu">
            <div class="angkab">50</div>
        </div>
        <div class="judul_a">TOTAL TAMU BERKUNJUNG  BULAN INI</div>
    </div>
</div>

<div class="col-md-4">
    <div class="d_pb">
        <div class="dua">
            <div class="angkab">10</div>
        </div>
        <div class="judul_b">TOTAL KEGIATAN BULAN INI</div>
    </div>
</div>

<div class="col-md-4" style="padding-right: 0 !important;">
    <div class="d_pc">
        <div class="tiga">
            <div class="angkab">78</div>
        </div>
        <div class="judul_c">TOTAL SURAT BULAN INI</div>
    </div>
</div>

<div class="col-md-12 bayang">
    <div class="putih_1">
        <div class="merah">
            Daftar Tamu Berkunjung
        </div>

<div class="col-md-12" style="background-color: #fff !important; margin-bottom: 30px !important; padding-top: 20px !important;">
    <div class="row">
        <div class="col-md-4 waktu">
         <?php
        $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
        $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        date_default_timezone_set("Asia/Jakarta");
        echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
        echo ", " . date("h:i") . " WITA " ;
        ?>

        </div>
        <div class="col-md-8" style="text-align: right !important;">
            <img src="<?php echo base_url(); ?>assets/images/buku_tamu.png" style="margin-right: 20px !important; height: 30px !important"><img src="<?php echo base_url(); ?>assets/images/lihat_semua.png" style="height: 30px !important;">
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


</div>


</div>
</div>
        
<div class="col-md-8">
    <div class="col-md-12 bayang">
        <div class="putih_1" style="min-height: 620px !important;">
            <div class="merah">
                Daftar Kegiatan
            </div>
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
                    <div class="col-md-3" style="text-align: right !important;">
                        <button class="btn btn-warning" style="border-radius: 0 !important;">Lihat Semua</button>
                    </div>
                </div>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">List Kegiatan</a></li>
  <li><a data-toggle="tab" href="#menu1">Sedang Berlangsung</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <div class="row" style="margin-bottom: 30px !important;">
        <div class="col-md-2" style="padding-right: 0 !important;"><img src="<?php echo base_url(); ?>assets/images/gambar.png" width="100%"></div>
        <div class="col-md-10">
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
                    <td style="padding-top: 7px !important;"><a href="<?= site_url() ?>/kegiatan/daftar"><img src="<?php echo base_url(); ?>assets/images/kegiatan.png" height="20"></a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-bottom: 30px !important;">
        <div class="col-md-2" style="padding-right: 0 !important;"><img src="<?php echo base_url(); ?>assets/images/gambar.png" width="100%"></div>
        <div class="col-md-10">
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
                    <td style="padding-top: 7px !important;"><a href="<?= site_url() ?>/kegiatan/daftar"><img src="<?php echo base_url(); ?>assets/images/kegiatan.png" height="20"></a></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row" style="margin-bottom: 30px !important;">
        <div class="col-md-2" style="padding-right: 0 !important;"><img src="<?php echo base_url(); ?>assets/images/gambar.png" width="100%"></div>
        <div class="col-md-10">
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
                    <td style="padding-top: 7px !important;"><a href="<?= site_url() ?>/kegiatan/daftar"><img src="<?php echo base_url(); ?>assets/images/kegiatan.png" height="20"></a></td>
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
        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="col-md-12 bayang">
        <div class="putih_1" style="min-height: 620px !important;">
            <div class="merah">
                Daftar Agenda
            </div>
            <div class="col-md-12" style="padding: 15px !important;">
                <img src="<?php echo base_url(); ?>assets/images/buat_agenda.png" width="100%" data-toggle="modal" data-target="#myModal">
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
                <br><br>
                <center>
                <button class="btn btn-warning">Lihat Semua</button>
                </center>
            </div>
        </div>
    </div>
</div>


    </div>
</section><!-- /.content -->


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="text-align: center !important;">
        <img src="<?php echo base_url(); ?>assets/images/logo.png" width="60%" >
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <label>Nama Kegiatan</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <label>Tanggal Kegiatan</label>
            <input type="date" name="" class="form-control">
        </div>
        <div class="col-md-6">
            <label>Waktu Kegiatan</label>
            <input type="time" name="" class="form-control">
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-6">
            <label>Lokasi Kegiatan</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="col-md-6">
            <label>Kuota Kegiatan</label>
            <input type="text" name="" class="form-control">
        </div>
        <div class="col-md-12">&nbsp;</div>
        <div class="col-md-12">
            <label>Deskripsi Kegiatan</label>
            <textarea name="" class="form-control" rows="4"></textarea>
        </div>
        <div class="col-md-12">&nbsp;</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-agenda form-control">Buat Agenda</button>
      </div>
    </div>

  </div>
</div>


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