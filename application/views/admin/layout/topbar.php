<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>

<div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <a href="" class="ml-3 text-muted" id="menu-toggle"><i class="fa fa-bars fa-2x"></i>
        </a>

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <li class="nav-item my-auto">
                <a class="nav-link" href="<?php echo base_url('auth/logout'); ?>" target="blank">
                    <i class="bi-box-arrow-right" style="font-size: 1.5rem;"></i>
                    <span class="ml-2 mr-3 d-lg-inline">Sign Out</span>
                </a>
            </li>
        </ul>
        <!-- </div> -->
    </nav>

    <div class="d-sm-flex align-items-center justify-content-between mb-4 p-2 border-bottom">
        <h3 class="h4 mb-0 text-gray-800 ml-4 my-auto"><?php echo $title; ?></h3>
        <ol class="breadcrumb bg-transparent my-auto">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard') ?>"> Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url('admin/' . $this->uri->segment(2)) ?>">
                    <?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(2))) ?>
                </a></li>
            <li class="breadcrumb-item active"><?php echo $title ?></li>
        </ol>
    </div>

    <div class="container-fluid my-3">