<?php
    ini_set('precision', 9);
    // $title = strtoupper(str_replace(" ","_",$data_timeline->nama_project).'-'.str_replace(" ","_",$data_timeline->nama_timeline));
    // $title ="okey";
    header("Content-type: application/vnd-ms-excel");

    header("Content-Disposition: attachment; filename=".$title.".xls");

    header("Pragma: no-cache");

    header("Expires: 0");
 
 ?>
<style typew="text/css">
    table {
        border-collapse: collapse;
    }
    table, th, td{
        border:1px solid black;
    }
    th{
        background-color:#eb3a28;  
    }
    .text{
        mso-number-format:"\@";/*force text*/
    }
    .decimal{
        mso-number-format:"0\.000";
    }
</style>
     
<table id="table" class="table table-bordered table-striped table-hover" style="white-space: nowrap;">
    <thead style="background-color: #ffffff; color:#666;">
        <tr>
            <th>NO</th>
            <th>TANGGAL ENTRY</th>
            <th>TANGGAL PENCATATAN</th>
            <th>KELURAHAN</th>
            <th>ALAMAT</th>
            <th>RT</th>
            <th>RW</th>
            <th>INFRASTRUKTUR</th>
            <th>PANJANG</th>
            <th>LEBAR</th>
            <th>KONDISI</th>
            <th>MATERIAL</th>
            <th>FOTO 1</th>
            <th>FOTO 2</th>
            <th>FOTO 3</th>
            <th>KETERANGAN</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no=0;
        foreach ($data_infrastruktur as $rows):
            $no++;      
        ?>
            <tr>
                <td style="text-align: center;"><?php echo $no?></td>
                <td class="text"><?php echo (($rows->tgl_entry == "0000-00-00 00:00:00")? " " : date_format(date_create($rows->tgl_entry),"d/m/Y H:i:s")) ?></td>
                <td class="text"><?php echo (($rows->tgl_pencatatan == "0000-00-00 00:00:00")? " " : date_format(date_create($rows->tgl_pencatatan),"d/m/Y H:i:s")) ?></td>
                <td><?php echo $rows->nama_kel ?></td>
                <td><?php echo $rows->alamat ?></td>
                <td><?php echo $rows->rt ?></td>
                <td><?php echo $rows->rw ?></td>
                <td><?php echo $rows->nama_infrastruktur ?></td>
                <td><?php echo $rows->panjang ?></td>
                <td><?php echo $rows->lebar ?></td>
                <td><?php echo $rows->nama_kondisi ?></td>
                <td><?php echo $rows->nama_material ?></td>
                <td class="text-center">
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Perbesar'>
                        <?php
                            if($rows->foto1 != ""){
                            echo 'Foto1';
                            }
                        ?>
                    </a>
                </td>
                <td class="text-center">
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Perbesar'>
                        <?php
                            if($rows->foto2 != " "){
                            echo 'Foto2';
                            }
                        ?>
                    </a>
                </td>
                <td class="text-center">
                    <a href="#" style="color:#d9534f" data-target='tooltip' title='Perbesar'>
                        <?php
                            if($rows->foto3 != ""){
                            echo 'Foto3';
                            }
                        ?>
                    </a>
                </td>
                <td><?php echo $rows->keterangan ?></td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>