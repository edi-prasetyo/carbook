<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>

<div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
        <button class="btn btn-outline-secondary ml-3" id="menu-toggle"><i class="fa fa-bars"></i>
        </button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>" target="blank">
                        <i class="ti-link"></i>
                        <span class="ml-2 d-none d-lg-inline">Lihat Website</span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" style="max-width: 21px">
                        <span class="ml-2 d-none d-lg-inline"><?php echo $user->user_name; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?php echo base_url('myaccount'); ?>">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <a class="dropdown-item" href="<?php echo base_url('myaccount/ubah_password'); ?>">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ganti Password
                        </a>
                        <a class="dropdown-item" href="<?php echo base_url('myaccount/ubah_password'); ?>">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ganti Password
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </div>
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