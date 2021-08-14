<nav class="site-header sticky-top py-1 bg-info">
  <div class="container py-2 d-flex justify-content-between align-items-center">
    <a class="text-white text-left" href="javascript:history.back()"><i class="ri-arrow-left-line"></i></a>
    <a class="text-white text-center" href="#" aria-label="Product">
      My Account
    </a>
  </div>
</nav>


<?php if ($this->session->userdata('id')) : ?>
    <div class="container mb-3 my-3 mb-5 pb-3">
        <?php
        //Notifikasi
        if ($this->session->flashdata('message')) {
            echo '<div class="alert alert-success alert-dismissable fade show">';
            echo '<button class="close" data-dismiss="alert" aria-label="Close">×</button>';
            echo $this->session->flashdata('message');
            echo '</div>';
        }


        ?>

        <div class="p-3 osahan-profile mt-5">
            <div class="bg-white rounded shadow-sm mt-n5">
               <div class="d-flex align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <img src="<?php echo base_url('assets/img/avatars/' . $user->user_image); ?>" class="rounded-circle">
                  </div>
                  <div class="right">
                     <h6 class="mb-1 font-weight-bold"><?php echo $user->user_name; ?> <i class="feather-check-circle text-success"></i></h6>
                     <p class="text-muted m-0 small"><?php echo $user->email; ?></p>
                  </div>
               </div>
               <div class="osahan-credits d-flex align-items-center p-3">
                  <p class="m-0">Total Transaksi</p>
                  <h5 class="m-0 ml-auto text-primary"><?php echo count($transaksi); ?></h5>
               </div>
            </div>
            <!-- profile-details -->
            <div class="bg-white rounded shadow-sm mt-3 profile-details">
               <a data-toggle="modal" data-target="#paycard" class="d-flex w-100 align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold mb-1 text-dark">Phone</h6>
                     <p class="small text-muted m-0"><?php echo $user->user_phone; ?></p>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                  </div>
               </a>
               <a data-toggle="modal" data-target="#exampleModal" class="d-flex w-100 align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold mb-1 text-dark">Address</h6>
                     <p class="small text-muted m-0"><?php echo $user->user_address; ?></p>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                  </div>
               </a>
               <div class="d-flex align-items-center border-bottom p-3">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold mb-1">Refer Friends</h6>
                     <p class="small text-primary m-0">Get $10.00 FREE</p>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                  </div>
               </div>
               <a href="faq.html" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="ri-truck-line bg-danger text-white p-2 rounded-circle mr-2"></i> Delivery Support</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                  </div>
               </a>
               <a href="contact-us.html" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="ri-phone-line bg-primary text-white p-2 rounded-circle mr-2"></i> Contact</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="fri-arrow-right-s-line"></i></h6>
                  </div>
               </a>
               <a href="terms.html" class="d-flex w-100 align-items-center border-bottom px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="ri-error-warning-line bg-success text-white p-2 rounded-circle mr-2"></i> Term of use</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                  </div>
               </a>
               <a href="<?php echo base_url('auth/logout');?>" class="d-flex w-100 align-items-center px-3 py-4">
                  <div class="left mr-3">
                     <h6 class="font-weight-bold m-0 text-dark"><i class="ri-logout-box-r-line bg-warning text-white p-2 rounded-circle mr-2"></i> Loggout</h6>
                  </div>
                  <div class="right ml-auto">
                     <h6 class="font-weight-bold m-0"><i class="ri-arrow-right-s-line"></i></h6>
                  </div>
               </a>
            </div>
         </div>


    </div>


<?php else : ?>

    <?php redirect('auth'); ?>


<?php endif; ?>







