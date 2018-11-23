
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <div class="user-panel">
        <div class="info">
          <p style="color: #595959;"><?= $_SESSION['pengguna'] ?></p>
          <p style="color: #a9a9a9;"><i class="fa fa-circle text-success"></i>
			<?php
				if($_SESSION['level'] == 1){
					echo $_SESSION['kode_kecamatan'];
				}else{
					echo $_SESSION['kode_kelurahan'];
				}
			?></p>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php
            if($_SESSION['level'] == '1'){
              $this->load->view('menu/menu_admin');
            }else if($_SESSION['level'] == '2'){
              $this->load->view('menu/menu_user');           
            }
        ?>
        <li class="<?php if($aktif =='' ) { echo 'active'; }?>">
          <a href="<?=site_url()?>/login/keluar">
            <i class="fa fa-sign-out"></i> <span>Logout</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>