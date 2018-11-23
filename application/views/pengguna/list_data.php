<button class="btn_input btn btn-primary"><i class="fa fa-plus-square"></i> TAMBAH PENGGUNA</button>
</br>
</br>
<table id="table" class="table table-bordered table-striped table-hover" style="padding-top:20px">
  <thead style="background-color: #ffffff; color:#666;">
    <tr>
      <th width='5%'>NO</th>
      <th>USERNAME</th>
      <th>LEVEL</th>
      <th class="text-center">STATUS</th>
      <th class="text-center">AKSI</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //var_dump($get_pengguna);die(); 
      $no=0;
      foreach ($get_pengguna as $rows){

        $no++;  
          ?>
        <tr>
          <td style="text-align: center;"><?php echo $no?></td>
          
          <td><?php echo $rows->username?></td>
          <td><?php echo $rows->nama_SKPD?></td>
          <td class="text-center">
            <?php 
              if ($rows->status == 1){
                echo 'Aktif';
              }elseif($rows->status == 2){
                echo "Tidak Aktif";
              }
            ?>
          </td>
          <td class="text-center">
              <a href="#" style="color:#f0ad4e" data-target='tooltip' title='Ubah'>
                <i id="<?php echo md5($rows->id_user) ?>" class="btn_edit fa fa-edit (alias) "></i>
              </a>
              &nbsp;
              <a href="#" style="color:#d9534f" data-target='tooltip' title='Hapus'>
                <i id="<?php echo md5($rows->id_user) ?>" class="btn_delete fa fa-trash"></i>
              </a>
          </td>
        </tr>
    <?php }?>
  </tbody>
</table>


<script>
    $(function () {
      $('#table').DataTable({
        'searching'   : true,
        'paging'      : true,
        'lengthChange': true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
        'language'    :{
                          'url'         : '<?=base_url("assets/js/dataTables-language-id.json")?>',
                          'sEmptyTable' : 'Tidak ada data untuk ditampilkan'
                        }
      })
    })
</script>
