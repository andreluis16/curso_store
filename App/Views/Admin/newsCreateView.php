<h1>Form - Create News</h1>

<form class="form" method="POST" enctype="multipart/form-data" action="<?php echo \App\Config\Config::$BASE_URL.'admin/news/create/save'?>">
    <div>
        <label>Image</label>
        <input type="file" name="image">
    </div>
    <div>
        <label>Title</label>
        <input type="text" name="title">
    </div>
    <div>
        <label>Resume</label>
        <input type="text" name="resume">
    </div>
    <div>
        <label>News</label>
        <textarea name="news"></textarea>
    </div>
    <div>
        <button type="submit">Save</button>
    </div>
</form>