<?php
$meta      = $this->meta_model->get_meta();
$link      = $this->link_model->get_link();
$page      = $this->page_model->get_page();

?>


  <div class="osahan-menu-fotter fixed-bottom bg-white px-3 py-2 text-center shadow">
            <div class="row">
               <div class="col selected">
                  <a href="home.html" class="text-danger small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="ri-home-2-line"></i></p>
                     Home
                  </a>
               </div>
               <div class="col">
                  <a href="most_popular.html" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="ri-shopping-bag-2-line"></i></p>
                     Order
                  </a>
               </div>
               
               <div class="col">
                  <a href="favorites.html" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="ri-file-list-3-line"></i></p>
                     News
                  </a>
               </div>
               <div class="col">
                  <a href="profile.html" class="text-dark small font-weight-bold text-decoration-none">
                     <p class="h4 m-0"><i class="ri-user-line"></i></p>
                     Profile
                  </a>
               </div>
            </div>
         </div>

</body>
</html>