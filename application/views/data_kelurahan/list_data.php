<table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap; width:100%">
    <thead style="background-color: #ffffff; color:#666;">
        <tr>
            <th class="text-center">NO</th>
            <th>KODE KELURAHAN</th>
            <th>NAMA KELUARAHAN</th>
            <th>NAMA LURAH</th>
            <th>NIP</th>
            <th>JABATAN</th>
            <th class="text-center">AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($data as $rows):
            if ($rows->id_kel == 0)
                continue;
            
            $no++;
            ?>
            <tr class="text-uppercase">
                <td class="text-center"><?php echo $no ?></td>
                <td><?php echo $rows->kode_kel ?></td>
                <td><?php echo $rows->nama_kel ?></td>
                <td><?php echo $rows->lurah ?></td>
                <td><?php echo $rows->nip ?></td>
                <td><?php echo $rows->jabatan ?></td>
                <td class="text-center">
                    <a href="#" style="color:#f0ad4e">
                        <i id="<?php echo md5($rows->id_kel) ?>" class="btn_edit fa fa-edit (alias)"></i>
                    </a>
                    &nbsp;
                    <a href="#" style="color:#d9534f">
                        <i id="<?php echo md5($rows->id_kel) ?>" class="btn_delete fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<script type="text/javascript">
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