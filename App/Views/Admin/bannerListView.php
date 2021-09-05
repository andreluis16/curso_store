<h1>Banners</h1>
<a href="<?php echo App\Config\Config::url('/admin/banner/create-form');?>">Add new banner</a>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Image</th>
        <th>Link</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach($bannerList as $banner) {?>  
    
    <tr>
        <td><?php echo $banner->banner_id?></td>
        <td>
            <image class="small-blocked-image" src="<?php echo \App\Config\Config::url($banner->image_uri) ?>"/>
        </td>
        <td><?php echo $banner->link ?></td>
        <td>
             <a href="<?php echo App\Config\Config::url('/admin/banner/edit-form?id='.$banner->banner_id);?>">[Edit]</a>
        </td>
        <td>
            <a href="<?php echo App\Config\Config::url('/admin/banner/delete?id='.$banner->banner_id);?>">[Delete]</a>
        </td>
    </tr>
    
    <?php }?>
    
</table>