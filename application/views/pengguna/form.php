<script type="text/javascript">
    $(function(){
        $(document).on('change','#level',function(){  
			level = $("#level").val();
			if(level == '2'){
				$("#form_kelurahan").show();
				$.post(
					'<?php echo site_url("pengguna/option");?>',
					{'level': level},
					function(data){
						$("#kelurahan").html(data);
						$("#kelurahan").select2({
							placeholder: "Pilih",
							allowClear: true
						});
					}
				);
			}else{
				$("#form_kelurahan").hide();
			}
                     
        });

    });
</script>

<div class="modal-danger">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title title"></h4>
			</div>
			<div id="box-body" class="box-body">
				<div class="form-item">
					<div class="col-md-12" style="padding-top:10px">
						<label>NANA PENGGUNA</label>
						<input id="nama_pengguna" type="text" class="form-control" value="<?php if(isset($get_user)) echo $get_user->nama_pengguna ?>">
					</div> 
				</div>	
				<div class="form-item">
						<div class="col-md-12" style="padding-top:10px">
								<label>USERNAME</label>&nbsp;<span class="errorVal" id="report1"></span>
								<input id="username" type="text" class="form-control" value="<?php if(isset($get_user)) echo $get_user->username ?>">
						</div>
				</div>
				<?php
					if(isset($get_user)){
				?>
					<div class="form-item">
						<div class="col-md-12" style="padding-top:10px">
							<label>PASSWORD LAMA</label>
							<input type="text" class="form-control" value="********" readonly>
						</div>
					</div>
					<div class="password_baru form-item">
						<div class="col-md-12" style="padding-top:10px">
							<label>PASSWORD BARU</label>
							<input id="password_baru" type="text" class="form-control" placeholder="Disi jika mau merubah password">
						</div>
					</div>
				<?php
					}else{
				?>
					<div class="form-item">
						<div class="col-md-12" style="padding-top:10px">
							<label>PASSWORD</label>
							<input id="password" type="text" class="form-control">
						</div>
					</div>
				<?php
					}
				?>
				<div class="form-item">
					<div class="col-md-12" style="padding-top:10px">
						<label>LEVEL USER</label>
						<select id="level" class="form-control">
							<option value="0">Pilih</option>
							<?php
								if(isset($get_user)){
									$level = $get_user->level;	
								}else{
									$level = '';
								}
								foreach($level_user as $rows){
									if($level == $rows->level){
										$selected = "selected";
									}else{
										$selected = "";
									}
									echo '<option value="'.$rows->level.'" '.$selected.'>'.$rows->keterangan.'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<?php
					if(isset($get_user)){
						if($get_user->level == '1'){
							$display = "display:none";
						}else{
							$display = "";
						}
					}else{
						$display = "display:none";
					}
				?>
				<div id="form_kelurahan" class="form-item" style="<?= $display ?>">
					<div class="col-md-12" style="padding-top:10px">
						<label>KELURAHAN</label>
						<select id="kelurahan" class="form-control">
							<option value="">Pilih</option>
							<?php
								if(isset($get_user)){
									foreach($data_kelurahan as $rows){
										if($get_user->kode_kelurahan == $rows->kode_kel){
											$selected = "selected";
										}else{
											$selected = "";
										}
										echo '<option value="'.$rows->kode_kel.'" '.$selected.'>'.$rows->kode_kel.' - '.$rows->nama_kel.'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-item">
					<div class="col-md-12" style="padding-top:10px">
						<label><b>STATUS</b></label>
						<select id="status" class="form-control">
							<option value="1" <?php if(isset($get_user)) echo ($get_user->status == 1)?"selected":"" ?>>Aktif</option>
							<option value="2" <?php if(isset($get_user)) echo ($get_user->status == 2)?"selected":"" ?>>Tidak Aktif</option>
						</select>
					</div>
				</div>	
			</div>
			<div  id="box-footer" class="box-footer">
			<div  id="box-footer" class="box-footer">
				<div class="form-item">
					<div class="col-md-8 text-left">
						<div id="validasi"></div>
					</div>
					<div class="col-md-4 text-right">
						<button id="<?php if(isset($get_user)) echo md5($get_user->id_user) ?>" class="btn_save"></button>
					</div>
				</div><!-- ./row -->
			</div>
		</div>
	</div>
</div>	
<!-- Unique Data Validation -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#username').bind('change',function(){
			var check1=0;
			var nama = $(this).val();
			$.ajax({
				url:'pengguna/cekData/user/username/'+nama,
				data:{send:true},
				success:function(data){
					if(data==1){
						$('#report1').text('');
						$('.btn_save').prop('disabled',false);
						check1=1;
					}else{
						$('#report1').text('Username sudah ada');
						$('.btn_save').prop('disabled',true);
						check1=0;
					}
				}
			})
		});
	})

	$("#project").select2({
		placeholder: "PILIH",
		allowClear: true
	});
</script>
<!-- End Unique Data Validation -->