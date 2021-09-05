<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo \App\Config\Config::url('/admin/products/edit/save?id='.$product->product_id)?>">
     <div>
        <label>Change Image</label>
        <input type="file" name="image"> 
        <img class="small-blocked-image" src="<?php echo \App\Config\Config::url($product->image) ?>" alt="alt"/>
    </div>
    <div>
        <label>Name</label> 
        <input type="text" name="name" value="<?php echo $product->name?>">
    </div>
     <div>
        <label>Price</label>
        <input type="text" name="price" value="<?php echo $product->price?>">
    </div>
     <div>
        <label>Description</label>
        <textarea name="description"><?php echo $product->description?></textarea>
    </div>
     <div>
         <button type="submit">Save</button>
    </div>
</form>
