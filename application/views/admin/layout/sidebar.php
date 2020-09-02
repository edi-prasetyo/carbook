<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>


<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="ti-lock"></i> </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        MASTER DATA
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/transaksi'); ?>">
            <i class="fas fa-fw fa-shopping-bag"></i>
            <span>Transaksi</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/products'); ?>">
            <i class="fas fa-fw fa-box"></i>
            <span>Produk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/buyback'); ?>">
            <i class="fas fa-fw fa-exchange-alt"></i>
            <span>Buyback</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/category_products'); ?>">
            <i class="fas fa-fw fa-tag"></i>
            <span>Category Beli</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/category_buy'); ?>">
            <i class="fas fa-fw fa-hashtag"></i>
            <span>Category Buyback</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/galery'); ?>">
            <i class="fas fa-fw fa-image"></i>
            <span>Galery</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/seller'); ?>">
            <i class="far fa-fw fa-user"></i>
            <span>Reseller</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Seting Web
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true" aria-controls="collapsePage">
            <i class="fas fa-fw fa-cog"></i>
            <span>Site Setings</span>
        </a>
        <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Example Pages</h6> -->
                <a class="collapse-item" href="<?php echo base_url('admin/meta'); ?>">Setings</a>
                <a class="collapse-item" href="<?php echo base_url('admin/meta/logo'); ?>">Logo</a>
                <a class="collapse-item" href="<?php echo base_url('admin/meta/favicon'); ?>">Favicon</a>
            </div>
        </div>
    </li>
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('admin/menu'); ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Menu</span>
        </a>
    </li> -->
    <hr class="sidebar-divider">

</ul>
<!-- Sidebar -->

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">