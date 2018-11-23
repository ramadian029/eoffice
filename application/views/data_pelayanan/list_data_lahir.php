
<table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
    <thead style="background-color: #ffffff; color:#666;">
        <tr>
            <th>NO</th>
            <th>NAMA ANAK</th>
            <th>NAMA AYAH</th>
            <th>NAMA IBU</th>
            <th>ALAMAT</th>
            <th>RT</th>
            <th>RW</th>
            <th>AGAMA</th>
            <th>KETERANGAN</th>
            <th class="text-center">AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($data_infrastruktur as $rows):
            $no++;
            ?>
            <tr>
                <td style="text-align: center;"><?php echo $no ?></td>
                <td><?php echo (($rows->tgl_entry == "0000-00-00 00:00:00") ? " " : date_format(date_create($rows->tgl_entry), "d/m/Y H:i:s")) ?></td>
                <td><?php echo (($rows->tgl_pencatatan == "0000-00-00 00:00:00") ? " " : date_format(date_create($rows->tgl_pencatatan), "d/m/Y H:i:s")) ?></td>
                <td><?php echo $rows->nama_kel ?></td>
                <td><?php echo $rows->alamat ?></td>
                <td><?php echo $rows->rt ?></td>
                <td><?php echo $rows->rw ?></td>
                <td><?php echo $rows->panjang ?></td>
                <td><?php echo $rows->lebar ?></td>
                <td><?php echo $rows->nama_kondisi ?></td>
                <td><?php echo $rows->nama_material ?></td>
                <td class="text-center">
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Perbesar'>
                        <?php
                        if ($rows->foto1 != "") {
                            echo '<img id="show_image" src="' . $rows->foto1 . '" style="height:30px; width:auto">';
                        }
                        ?>
                    </a>
                </td>
                <td class="text-center">
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Perbesar'>
                        <?php
                        if ($rows->foto2 != " ") {
                            echo '<img id="show_image" src="' . $rows->foto2 . '" style="height:30px; width:auto">';
                        }
                        ?>
                    </a>
                </td>
                <td class="text-center">
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Perbesar'>
                        <?php
                        if ($rows->foto3 != "") {
                            echo '<img id="show_image" src="' . $rows->foto3 . '" style="height:30px; width:auto">';
                        }
                        ?>
                    </a>
                </td>
                <td><?php echo $rows->keterangan ?></td>
                <td class="text-center">
                    <a href="<?= site_url('edit-kondisi-infrastruktur/' . $nama_infrastruktur . '/' . md5($rows->id)) ?>" style="color:#f0ad4e" data-target='tooltip' title='Ubah'>
                        <i id="<?php echo md5($rows->id) ?>" class="fa fa-edit (alias) "></i>
                    </a>
                    &nbsp;
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Hapus'>
                        <i id="<?php echo md5($rows->id) ?>" class="btn_delete fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script>
    $(function() {
        $('#table').DataTable({
            'searching': true,
            'paging': true,
            'lengthChange': true,
            'ordering': true,
            'info': true,
            'scrollX': true,
            // 'scrollCollapse': true,
            // 'fixedColumns': true,
            'language': {
                'url': '<?= base_url("assets/js/dataTables-language-id.json") ?>',
                'sEmptyTable': 'Tidak ada data untuk ditampilkan'
            }
        })
    })
</script>