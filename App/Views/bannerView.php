<div id="slideshow">
    
    <?php foreach($bannerShow as $banner) { ?>
  <div>
      <img class="small-blocked-image" src="<?php echo \App\Config\Config::url($banner->image_uri)?>">
  </div>
    <?php }?>
</div>

