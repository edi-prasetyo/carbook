<?php
//Ambil data user berdsarkan Data Loginnya
$id_user    = $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);



 ?>

<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href=" <?php echo base_url('admin/dashboard') ?>">Admin</a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
  <!-- Navbar Right Menu-->
  <ul class="app-nav">
    <li class="app-search">
      <input class="app-search__input" type="search" placeholder="Search">
      <button class="app-search__button"><i class="fa fa-search"></i></button>
    </li>
    <!--Notification Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i>

      <?php if(!empty($total_kontak)) {
          echo "<span class='custom-badge'>";
          echo count($total_kontak);
          echo "</span>";
      }elseif(!empty($total_transaksi)) {
          echo "<span class='custom-badge'>";
          echo count($total_transaksi);
          echo "</span>";
      }else{

      } ?></span>


    </a>
      <ul class="app-notification dropdown-menu dropdown-menu-right">
        <li class="app-notification__title"><?php //echo count($total_unread);?> Daftar Notifikasi Terbaru.</li>
        <div class="app-notification__content">


          <li><a class="app-notification__item" href="<?php echo base_url('admin/transaksi')?>">
            <span class="app-notification__icon">
            <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-car fa-stack-1x fa-inverse"></i></span>
            </span>


              <div>
                <p class="app-notification__message"> Booking Car </p>
                <?php if(!empty($total_transaksi)) {
                    echo "<p class='app-notification__meta'>Ada ".count($total_transaksi)." Booking Terbaru</p>";
                  }else{
                    echo "<p class='app-notification__meta'>Tidak Ada Booking Terbaru</p>";
                  }
                  ?>
              </div></a></li>



          <li><a class="app-notification__item" href="<?php echo base_url('admin/kontak')?>">
            <span class="app-notification__icon">
            <span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span>
            </span>


              <div>
                <p class="app-notification__message"> Pesan Masuk </p>
                <?php if(!empty($total_kontak)) {
                    echo "<p class='app-notification__meta'>Ada ".count($total_kontak)." Pesan Masuk</p>";
                  }else{
                    echo "<p class='app-notification__meta'>Tidak Ada Pesan Masuk</p>";
                  }
                  ?>
              </div></a></li>



        </div>

      </ul>
    </li>
    <!-- User Menu-->
    <?php if($this->session->userdata('akses_level') == "Superadmin") { ?>
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">
        <li><a class="dropdown-item" href="<?php echo base_url('admin/profile') ?>"><i class="fa fa-user fa-lg"></i> Profile</a></li>

        <li><a class="dropdown-item" href="<?php echo base_url('connect/logout') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>

      </ul>
    </li>
    <?php }?>
  </ul>
</header>

  <!-- Sidebar menu-->
      <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
      <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" width="30%" src="<?php echo base_url('assets/upload/image/thumbs/'.$user_aktif->foto_user) ?>" alt="User Image">
          <div>
            <p class="app-sidebar__user-name"><?php echo $user_aktif->nama ?></p>
            <p class="app-sidebar__user-designation"><?php echo $user_aktif->akses_level ?></p>
          </div>
        </div>
        <ul class="app-menu">

          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="dashboard"){echo "active";}?>" href="<?php echo base_url('admin/dashboard') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="transaksi"){echo "active";}?>" href="<?php echo base_url('admin/transaksi') ?>"><i class="app-menu__icon fa fa-shopping-cart"></i><span class="app-menu__label">Booking Car

            <?php if(!empty($total_transaksi)) {
              echo "<span class='badge badge-danger'>";
              echo count($total_transaksi);
              echo "</span>";
                  }else {

                    } ?></span>

          </a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="mobil"){echo "active";}?>" href="<?php echo base_url('admin/mobil') ?>"><i class="app-menu__icon fa fa-car"></i><span class="app-menu__label">Data Mobil</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="ketentuan"){echo "active";}?>" href="<?php echo base_url('admin/ketentuan') ?>"><i class="app-menu__icon fa fa-info"></i><span class="app-menu__label">Ketentuan Sewa</span></a></li>


          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="page"){echo "active";}?>" href="<?php echo base_url('admin/page') ?>"><i class="app-menu__icon fa fa-file-text-o"></i><span class="app-menu__label">Halaman</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="layanan"){echo "active";}?>" href="<?php echo base_url('admin/layanan') ?>"><i class="app-menu__icon fa fa-trophy"></i><span class="app-menu__label">Layanan</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="galeri"){echo "active";}?>" href="<?php echo base_url('admin/galeri') ?>"><i class="app-menu__icon fa fa-image"></i><span class="app-menu__label">Galeri</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="kontak"){echo "active";}?>" href="<?php echo base_url('admin/kontak') ?>"><i class="app-menu__icon fa fa-envelope"></i><span class="app-menu__label">Pesan

              <?php if(!empty($total_kontak)) {
                echo "<span class='badge badge-danger'>";
                echo count($total_kontak);
                echo "</span>";
                    }else {

                      } ?></span>

          </a></li>

          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="berita"){echo "active";}?>" href="<?php echo base_url('admin/berita') ?>"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Berita</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="kategori"){echo "active";}?>" href="<?php echo base_url('admin/kategori') ?>"><i class="app-menu__icon fa fa-tags"></i><span class="app-menu__label">Kategori Berita</span></a></li>


<?php if($this->session->userdata('akses_level') == "Superadmin") { ?>

          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="section"){echo "active";}?>" href="<?php echo base_url('admin/section') ?>"><i class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">Section</span></a></li>
          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="services"){echo "active";}?>" href="<?php echo base_url('admin/services') ?>"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Services</span></a></li>

          <li><a class="app-menu__item <?php if($this->uri->segment(2)=="user"){echo "active";}?>" href="<?php echo base_url('admin/user') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">User</span></a></li>

          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Seting Web</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
              <li><a class="treeview-item" href="<?php echo base_url('admin/konfigurasi') ?>"><i class="icon fa fa-circle-o"></i> Konfigurasi Situs</a></li>
              <li><a class="treeview-item" href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="icon fa fa-circle-o"></i> Ganti Logo</a></li>
              <li><a class="treeview-item" href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="icon fa fa-circle-o"></i> Ganti Icon</a></li>
            </ul>
          </li>
<?php } ?>



<?php if($this->session->userdata('akses_level') == "Admin") { ?>

  <li><a class="app-menu__item <?php if($this->uri->segment(2)=="profile"){echo "active";}?>" href="<?php echo base_url('admin/profile') ?>"><i class="app-menu__icon fa fa-user-circle-o"></i><span class="app-menu__label">Profile</span></a></li>

<li><a class="app-menu__item" href="<?php echo base_url('connect/logout') ?>"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>

<?php } ?>




        </ul>
      </aside>
