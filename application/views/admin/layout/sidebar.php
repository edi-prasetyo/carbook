<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>


<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right pb-5" id="sidebar-wrapper">

        <div class="py-2 px-3 mt-5">
            <div class="mb-2"><img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" alt="..." width="65" class="mr-3 rounded-circle shadow-sm">
                <p>
                <h5 class="m-0 text-muted"><?php echo $user->user_name; ?></h5>
                <p class="badge badge-success font-weight-light mb-0 text-white"><?php echo $user->role; ?></p>
                </p>
            </div>
        </div>
        <p class="text-muted font-weight-bold text-uppercase px-3 small pb-4 mb-0">Main Menu</p>

        <ul class="nav flex-column  mb-0">
            <li class="nav-item">
                <a href="<?php echo base_url('admin/dashboard'); ?>" class="nav-link">
                    <i class="ti-home mr-3  fa-fw"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/transaksi'); ?>" class="nav-link  ">
                    <i class="bi-clipboard-data mr-3  fa-fw"></i>
                    Transaksi
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo base_url('admin/bank'); ?>" class="nav-link  ">
                    <i class="bi-credit-card-2-front mr-3  fa-fw"></i>
                    Bank
                </a>
            </li>



            <li class="nav-item" data-toggle="collapse" href="#collapseMobil" role="button" aria-expanded="false" aria-controls="collapseMobil">
                <a href="#" class="nav-link  d-flex w-100 justify-content-between ">
                    <div><i class="ti-car mr-3  fa-fw"></i> Mobil </div>
                    <i class="ti-angle-right my-auto small"></i>
                </a>
            </li>

            <ul class="collapse" id="collapseMobil">
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/mobil'); ?>" class="nav-link  ">
                        <i class="ti-car mr-3  fa-fw"></i>
                        Data Mobil
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/jenismobil'); ?>" class="nav-link  ">
                        <i class="bi-bookmarks mr-3  fa-fw"></i>
                        Jenis Mobil
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/merek'); ?>" class="nav-link  ">
                        <i class="bi-lightbulb mr-3  fa-fw"></i> Merek Mobil
                    </a>
                </li>

            </ul>



            <li class="nav-item" data-toggle="collapse" href="#collapseBerita" role="button" aria-expanded="false" aria-controls="collapseBerita">
                <a href="#" class="nav-link  d-flex w-100 justify-content-between ">
                    <div><i class="bi-newspaper mr-3  fa-fw"></i> Berita </div>
                    <i class="ti-angle-right my-auto small"></i>
                </a>
            </li>

            <ul class="collapse" id="collapseBerita">
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/galery'); ?>" class="nav-link  ">
                        <i class="bi-images mr-3  fa-fw"></i>
                        Galery
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/berita'); ?>" class="nav-link  ">
                        <i class="bi-newspaper mr-3  fa-fw"></i>
                        Berita
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/category'); ?>" class="nav-link  ">
                        <i class="bi-tags mr-3  fa-fw"></i>
                        Kategori
                    </a>
                </li>
            </ul>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/page'); ?>" class="nav-link  ">
                    <i class="bi-file-richtext mr-3  fa-fw"></i>
                    Halaman
                </a>
            </li>

            <li class="nav-item">
                <a href="<?php echo base_url('admin/layanan'); ?>" class="nav-link  ">
                    <i class="bi bi-chat-text mr-3  fa-fw"></i>
                    Layanan
                </a>
            </li>


            <li class="nav-item" data-toggle="collapse" href="#collapseUser" role="button" aria-expanded="false" aria-controls="collapseUser">
                <a href="#" class="nav-link  d-flex w-100 justify-content-between ">
                    <div><i class="bi-people mr-3  fa-fw"></i> User </div>
                    <i class="ti-angle-right my-auto small"></i>
                </a>
            </li>

            <ul class="collapse" id="collapseUser">
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/member'); ?>" class="nav-link  ">
                        <i class="bi-people mr-3  fa-fw"></i>
                        Member
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/user'); ?>" class="nav-link  ">
                        <i class="bi-person mr-3  fa-fw"></i>
                        Admin
                    </a>
                </li>
            </ul>


            <li class="nav-item" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                <a href="#" class="nav-link  d-flex w-100 justify-content-between ">
                    <div><i class="bi-gear mr-3  fa-fw"></i> Pengaturan </div>
                    <i class="ti-angle-right my-auto small"></i>
                </a>
            </li>

            <ul class="collapse" id="collapseExample">

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/lamasewa'); ?>" class="nav-link  ">
                        <i class="bi-record"></i> Lama Sewa
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/jamsewa'); ?>" class="nav-link  ">
                        <i class="bi-record"></i> Jam Sewa
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/link'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Links
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/menu'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Menu
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/ketentuan'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Ketentuan
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/pengaturan'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Pengaturan Email
                    </a>
                </li>

            </ul>

            <li class="nav-item" data-toggle="collapse" href="#collapseProfile" role="button" aria-expanded="false" aria-controls="collapseExample">
                <a href="#" class="nav-link  d-flex w-100 justify-content-between ">
                    <div><i class="bi-info-circle mr-3  fa-fw"></i> Profile </div>
                    <i class="ti-angle-right my-auto small"></i>
                </a>
            </li>

            <ul class="collapse" id="collapseProfile">
                <li class="nav-item">
                    <a href="<?php echo base_url('admin/meta'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Situs
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/meta/logo'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Logo
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url('admin/meta/favicon'); ?>" class="nav-link  ">
                        <i class="bi-record"></i>
                        Favicon
                    </a>
                </li>
            </ul>



        </ul>
    </div>