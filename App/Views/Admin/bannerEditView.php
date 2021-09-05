<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo \App\Config\Config::url('/admin/banner/save-edit?id='.$banner->banner_id)?>">
    <div>
        <label>Banner Image</label>
        <input type="file" name="banner_image">
        <img class="small-blocked-image" src="<?php echo App\Config\Config::url($banner->image_uri)?>" alt="alt"/>
    </div>
    <div>
        <label>Link</label>
        <input type="text" name="link" value="<?php echo $banner->link?>">
    </div>
    <div>
        <button type="submit">Edit Banner</button>
    </div>
</form>