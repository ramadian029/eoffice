<script type="text/javascript">
    $(document).ready(function () {
        $('#list_data').load("<?php echo site_url('pengguna/list_data') ?>"); 
    });
</script>
<!-- START TAMPIL MODAL -->
<script type="text/javascript">
    $(function(){           
      // START FORM MODAL INPUT
      $(document).on('click','.btn_input',function(){  
          $('#tampil_form').load("<?php echo site_url('pengguna/form') ?>",function(){
              $('#modal_form').modal('show');
              $(".title").text("FORM TAMBAH USER");
              $(".btn_save").addClass("btn_save btn btn-primary");
              $(".btn_save").append('<i class="fa fa-save"></i> ');
              $(".btn_save").append('SIMPAN');
              $("#btn_reset").hide();
          });
          
      });
      // START FORM MODAL EDIT
      $(document).on('click','.btn_edit',function(){
          $('#tampil_form').load("<?php echo site_url('pengguna/form').'/' ?>"+$(this).attr('id'),function(){
              $('#modal_form').modal('show');
              $(".title").text("FORM UBAH DATA");
              $('#pass').hide();
              $(".btn_save").addClass("btn_save btn btn-warning");
              $(".btn_save").append('<i class="fa fa-edit (alias)"></i> ');
              $(".btn_save").append('UBAH');
              $("#btn_reset").hide();
          });
      });
      // START FORM MODAL DELETE
      $(document).on('click','.btn_delete',function(){
          	$('#tampil_form').load("<?php echo site_url('pengguna/form/') ?>"+$(this).attr('id'),function(){
              	$('#modal_form').modal('show');
              	$(".title").text("Apakah Anda Ingin Menghapus Data Ini?");
      			    $('#pass').hide();              	
              	$(":text").prop("disabled",true);
              	$("select").prop("disabled",true);
              	$("#btn_reset").hide();
				$(".password_baru").hide();
              	$(".btn_save").append('<i class="fa fa-trash-o"></i> ');
              	$(".btn_save").append('HAPUS');
              	$( ".btn_save" ).removeClass( "btn_save" ).addClass( "btn_hapus btn btn-danger" );
          });
      });
     });
</script>
<!-- END TAMPIL MODAL -->
<script type="text/javascript">
    $(function(){
        // START PROSES SAVE
        $(document).on('click','.btn_save',function(){
            if($('#nama_pengguna').val()==""){
                document.getElementById('validasi').innerHTML="<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Nama Pengguna Belum Diisi</font>";
                $('#nama_pengguna').focus();
                return (false);
            }
            else if($('#username').val()==""){
                document.getElementById('validasi').innerHTML="<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Username Belum diisi</font>";
                $('#username').focus();
                return (false);
            }
            else if($('#password').val()==""){
                document.getElementById('validasi').innerHTML="<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Password Belum diisi</font>";
                $('#password').focus();
                return (false);
            }else if($('#level').val()==""){
                document.getElementById('validasi').innerHTML="<font style='font-weight: bold;color:red'><i class='fa fa-exclamation-triangle'></i> Level Belum diisi</font>";
                $('#level').focus();
                return (false);
            }

            $('.btn_save').prop('disabled',true);
            var param = 'nama_pengguna='+$('#nama_pengguna').val()+
			            '&username='+$('#username').val()+
			            '&password='+$('#password').val()+
						'&password_baru='+$('#password_baru').val()+
			            '&level='+$('#level').val()+
                        '&kelurahan='+$('#kelurahan').val()+
                        '&status='+$('#status').val()
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('pengguna/save/') ?>"+$(this).attr('id'),
                data: param,
                dataType:'JSON',
                success: function(result) {
                    if(result['status'] == 'sukses'){
                        $('#list_data').load("<?php echo site_url('pengguna/list_data') ?>");
                    }
                    document.getElementById('validasi').innerHTML=result['validasi'];   
                    $('.btn_save').prop('disabled',false);
                }
            });
        });

        // PROSES DELETE
        $(document).on('click','.btn_hapus',function(){
            $('.btn_save').prop('disabled',true);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('pengguna/delete/').'/' ?>"+$(this).attr('id'),
                success: function(result) {
					$("#box-body").hide();
					$("#box-footer").hide();
					$(".title").text(result);
                    $('#list_data').load("<?php echo site_url('pengguna/list_data') ?>");                   
                }
            });
        });
    });
</script>


<script type="text/javascript">
    $(function(){
        // START CLEAR VALIDASI
        $(document).on('click','.form-control',function(){
            document.getElementById('validasi').innerHTML="";
        });

        // START RESET FORM
        $(document).on('click','#btn_reset',function(){
            $(":text").val('');
            $("select").val('0');
            document.getElementById('validasi').innerHTML="";
        });

    });
</script>
<!-- END CLEAR VALIDASI -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="merah">MANAJEMEN PENGGUNA</div>
            <div class="col-lg-12 col-md-12 col-xs-12 pd-0">
                <div class="box box-danger">
                    <div class="box-body">
                        <div id="list_data" class="table-responsive"></div>
                    </div>
                </div>      
            </div>
        </div>
    </section><!-- /.content -->
<!-- START TAMPIL MODAL -->
<div id="modal_form" class="modal" data-width="760">
    <div id="tampil_form"></div>
</div>
<!-- END TAMPIL MODAL -->

   