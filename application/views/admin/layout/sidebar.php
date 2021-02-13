<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>





<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-white border-right" id="sidebar-wrapper">
        <div class="sidebar-heading border-bottom">Admin </div>
        <div class="py-4 px-3 mb-4 bg-white">
            <div class="media d-flex align-items-center"><img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" alt="..." width="65" class="mr-3 rounded-circle img-thumbnail shadow-sm">
                <div class="media-body">
                    <h5 class="m-0"><?php echo $user->user_name; ?></h5>
                    <p class="font-weight-light text-muted mb-0"><?php echo $user->role; ?></p>
                </div>
            </div>
        </div>
        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link text-dark bg-light">
                    <i class="ti-home mr-3 text-muted fa-fw"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/transaksi'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-clipboard-data mr-3 text-muted fa-fw"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/bank'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-credit-card-2-front mr-3 text-muted fa-fw"></i>
                    Bank
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/mobil'); ?>" class="nav-link text-dark bg-light">
                    <i class="ti-car mr-3 text-muted fa-fw"></i>
                    Mobil
                </a>
            </li>
        </ul>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="<?php echo base_url('admin/jenismobil'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-bookmarks mr-3 text-muted fa-fw"></i>
                    Jenis Mobil
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/merek'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-lightbulb mr-3 text-muted fa-fw"></i>
                    Merek Mobil
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/galery'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-images mr-3 text-muted fa-fw"></i>
                    Galery
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/berita'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-newspaper mr-3 text-muted fa-fw"></i>
                    Berita
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/category'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-tags mr-3 text-muted fa-fw"></i>
                    Kategori
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/member'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-people mr-3 text-muted fa-fw"></i>
                    Member
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/user'); ?>" class="nav-link text-dark bg-light">
                    <i class="bi-person mr-3 text-muted fa-fw"></i>
                    Admin
                </a>
            </li>


            <li class="nav-item" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <a href="#" class="nav-link text-dark d-flex w-100 justify-content-between bg-light">
                    <div><i class="bi-gear mr-3 text-muted fa-fw"></i> Pengaturan </div>
                    <i class="ti-angle-right my-auto small"></i>
                </a>
            </li>

            <ul class="collapse list-unstyled" id="collapseExample">
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/meta'); ?>" class="nav-link text-dark bg-light">
                        <i class="bi-record"></i>
                        Situs
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/meta/logo'); ?>" class="nav-link text-dark bg-light">
                        <i class="bi-record"></i>
                        Logo
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/meta/favicon'); ?>" class="nav-link text-dark bg-light">
                        <i class="bi-record"></i>
                        Favicon
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/menu'); ?>" class="nav-link text-dark bg-light">
                        <i class="bi-record"></i>
                        Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/ketentuan'); ?>" class="nav-link text-dark bg-light">
                        <i class="bi-record"></i>
                        Ketentuan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/pengaturan'); ?>" class="nav-link text-dark bg-light">
                        <i class="bi-record"></i>
                        Pengaturan Email
                    </a>
                </li>

            </ul>



        </ul>
    </div>