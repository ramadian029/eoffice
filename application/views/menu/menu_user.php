<script type="text/javascript">
    $(document).ready(function() {
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
        <img src="<?php echo base_url(); ?>assets/images/Home.png" width="20"> <span>Dashboard</span>
    </a>
</li>

<li class="<?php
if ($aktif == 'realisasi_anggaran') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/realisasi_anggaran">
         <img src="<?php echo base_url(); ?>assets/images/cek.png" width="20"> <span style="top: 5px !important; position: absolute !important;">&nbsp;Verifikasi Realisasi<br>&nbsp;Anggaran</span>
    </a>
</li>
<li class="<?php
if ($aktif == 'monografi') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/master_monografi">
        <img src="<?php echo base_url(); ?>assets/images/data.png" width="20"> <span>Data Monografi</span>
    </a>
</li>
<li class="treeview <?php
if (in_array($aktif, array('Laporan', 'breakdown', 'Bulanan', 'Triwulan', 'Semesteran'))) {
    echo 'treeview active menu-open';
}
?>">
    <a href="#">
        <img src="<?php echo base_url(); ?>assets/images/lap.png" width="20"> <span>Laporan</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php
        if ($aktif == 'Laporan') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/laporan-kondisi-infrastruktur">
                <i class="fa fa-circle-o"></i> Infrastruktur
            </a>
        </li>
        <!--        <li class="<?php
        if ($aktif == 'bulanan') {
            echo 'active';
        }
        ?>">
                    <a href="<?= site_url() ?>/laporan-breakdown">
                        <i class="fa fa-circle-o"></i> Breakdown
                    </a>
                </li>-->
        <li class="<?php
        if ($aktif == 'breakdown') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/laporan-breakdown">
                <i class="fa fa-circle-o"></i> Breakdown
            </a>
        </li>
        <li class="<?php
        if ($aktif == 'Bulanan') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/cetak-laporan/Bulanan">
                <i class="fa fa-circle-o"></i> Kependudukan Bulanan
            </a>
        </li>
        <li class="<?php
        if ($aktif == 'Triwulan') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/cetak-laporan/Triwulan">
                <i class="fa fa-circle-o"></i> Kependudukan Triwulan
            </a>
        </li>
        <li class="<?php
        if ($aktif == 'Semesteran') {
            echo 'active';
        }
        ?>">
            <a href="<?= site_url() ?>/cetak-laporan/Semesteran">
                <i class="fa fa-circle-o"></i> Kependudukan Semesteran
            </a>
        </li>
    </ul>
</li>


<li class="<?php
if ($aktif == 'pejabat') {
    echo 'active';
}
?>">
    <a href="<?= site_url() ?>/pejabat">
            <img src="<?php echo base_url(); ?>assets/images/set.png" width="20"> <span>Setting Lurah</span>
    </a>
</li>
