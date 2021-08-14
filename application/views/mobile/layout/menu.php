<?php
$id             = $this->session->userdata('id');
$user           = $this->user_model->user_detail($id);
$meta           = $this->meta_model->get_meta();
$menu           = $this->menu_model->get_menu();

?>








<div class="toolbar tabbar tabbar-labels toolbar-bottom elevation-6 bg-white">
          <div class="toolbar-inner">
            <a href="#tab-home" class="tab-link tab-link-active">
              <ion-icon name="home-outline"></ion-icon>
              <span class="tabbar-label">Home</span>
            </a>
            <a href="#tab-favorite" class="tab-link">
              <ion-icon name="heart-outline"></ion-icon>
              <span class="tabbar-label">Favorites</span>
            </a>
            <a href="#tab-add" class="tab-link addding-ads">
              <span class="adding-ads">
                <ion-icon name="add-outline"></ion-icon>
              </span>
            </a>
            <a href="#tab-search" class="tab-link">
              <ion-icon name="search-outline"></ion-icon>
              <span class="tabbar-label">Search</span>
            </a>
            <a href="#tab-profile" class="tab-link">
              <ion-icon name="person-outline"></ion-icon>
              <span class="tabbar-label">Profile</span>
            </a>
          </div>
        </div>