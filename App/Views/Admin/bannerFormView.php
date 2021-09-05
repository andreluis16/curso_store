<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo \App\Config\Config::url('/admin/banner/save-new-banner')?>">
    <div>
        <label>Banner Image</label>
        <input type="file" name="banner_image">
    </div>
    <div>
        <label>Link</label>
        <input type="text" name="link">
    </div>
    <div>
        <button type="submit">Save Banner</button>
    </div>
</form>