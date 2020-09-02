<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
$meta           = $this->meta_model->get_meta();
$category       = $this->category_products_model->get_category_products();
$category_buy   = $this->category_buy_model->get_category_buy();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>"><img class="img-fluid" src="<?php echo base_url('assets/img/logo/' . $meta->logo) ?>"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link" href="<?php echo base_url() ?>"><i class="ti ti-home"></i> Home <span class="sr-only">(current)</span></a></li>
                

                

                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Produk
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($category as $category) :?>
       
          <a class="dropdown-item" href="<?php echo base_url('products/category_products/' .$category->id );?>"><?php echo $category->category_product_name;?></a>

            <?php endforeach;?>

        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Buy Back
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php foreach ($category_buy as $category_buy) :?>
       
          <a class="dropdown-item" href="<?php echo base_url('buyback/category_buyback/' .$category_buy->id );?>"><?php echo $category_buy->category_buy_name;?></a>

            <?php endforeach;?>

        </div>
      </li>

      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('page/cara_order'); ?>"> Cara Order </a></li>
      <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/register'); ?>"> Daftar Reseller </a></li>

      
            </ul>
            <ul class="navbar-nav">

                <?php if ($this->session->userdata('email')) { ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-user"></i> <?php echo $user->user_name; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo base_url('myaccount') ?>">My Account</a>
                            
                            <a class="dropdown-item" href="<?php echo base_url('myaccount/ubah_password'); ?>">Setings</a>
                            <div class="dropdown-divider"></div>
                            <?php if ($user->role_id == 1) : ?>
                                <a class="dropdown-item" href="<?php echo base_url('admin/dashboard'); ?>">Panel Admin</a>
                            <?php endif; ?>
                            <a class="dropdown-item" href="<?php echo base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth/register') ?>"><i class="ti ti-user"></i> Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('auth') ?>"><i class="ti ti-lock"></i> Login</a></li>
                <?php } ?>


            </ul>
        </div>
    </div>
</nav>
