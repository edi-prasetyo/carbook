
<h1 class="cat-judul text-center"><?php echo $title ?></h1>

  <div class="container">
<div class="row">
<div class="col-md-8">
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('') ?>"> Home</a></li>
        <li class="breadcrumb-item active"><?php echo $title ?></li>
    </ul>


<br>


<?php foreach ($page as $page) { ?>
  <div class="post">


      <div class="col-md-7">
        <h2><a href="<?php echo base_url('page/detail/'.$page->slug_page)?>"><?php echo strip_tags(character_limiter($page->judul_page,50)) ?></a></h2>

              <p> <?php echo strip_tags(character_limiter($page->isi_page,140)) ?></p>
       </div>
  </div>
<?php } ?>




<div class="paginasi col-md-12 text-center">
  <?php if(isset($paginasi)) { echo $paginasi; } ?>
</div>

</div>




</div>
</div>
