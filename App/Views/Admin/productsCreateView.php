<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo \App\Config\Config::$BASE_URL.'admin/products/create/save'?>">
     <div>
        <label>Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <label>Name</label>
        <input type="text" name="name">
    </div>
     <div>
        <label>Price</label>
        <input type="text" name="price">
    </div>
     <div>
        <label>Description</label>
        <textarea name="description" ></textarea>
    </div>
     <div>
         <button type="submit">Save</button>
    </div>
</form>
