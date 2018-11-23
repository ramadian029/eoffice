<link rel="stylesheet" href="<?=base_url()?>assets/fa/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<script type="text/javascript">
    $(document).ready(function () {
        $("#menu_kondisi_infrastruktur").load("<?= site_url("menu/infrastruktur/" . $aktif) ?>");
    });
</script>
<br><br>
<li class="<?php
if ($aktif == 'Dashboard') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/dashboard">
        <img src="<?php echo base_url(); ?>assets/images/Home.png" width="20"> <span>&nbsp;&nbsp;&nbsp;Dashboard</span>
    </a>
</li>
<li class="treeview <?php
if (in_array($aktif, array('data_agenda', 'agenda', 'kegiatan'))) {
    echo 'treeview active menu-open';
}
?>">
    <a href="#">
        <img src="<?php echo base_url(); ?>assets/images/agenda.png" width="20"> <span>&nbsp;&nbsp;&nbsp;Agenda & Kegiatan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($aktif == 'agenda') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/agenda">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AGENDA
            </a>
        </li>
        <li class="<?php
        if ($aktif == 'kegiatan') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/kegiatan">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; KEGIATAN
            </a>
        </li>

    </ul>
</li>

<li class="<?php
if ($aktif == 'daftar_tamu') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/tamu">
        <img src="<?php echo base_url(); ?>assets/images/tamu.png" width="20"> <span>&nbsp;&nbsp;&nbsp;Daftar Tamu</span>
    </a>
</li>
<li class="<?php
if ($aktif == 'surat') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/surat">
        <img src="<?php echo base_url(); ?>assets/images/surat.png" width="20"> <span>&nbsp;&nbsp;&nbsp;Kelola Tata Surat</span>
    </a>
</li>
<li class="<?php
if ($aktif == 'dokumwn') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/dokumen">
        <img src="<?php echo base_url(); ?>assets/images/surat.png" width="20"> <span style="top: 5px !important; position: absolute !important;">&nbsp;&nbsp;&nbsp;&nbsp;Kelola Dokumen &<br>&nbsp;&nbsp;&nbsp;&nbsp;Arsip</span>
    </a>
</li>



<li class="<?php
if ($aktif == 'manajemen_pengguna') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/manajemen-pengguna">
        <img src="<?php echo base_url(); ?>assets/images/user1.png" width="20"> <span style="top: 5px !important; position: absolute !important;">&nbsp;&nbsp;&nbsp;&nbsp;Manajemen<br>&nbsp;&nbsp;&nbsp;&nbsp;Pengguna</span>
    </a>
</li>
