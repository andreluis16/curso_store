<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo \App\Config\Config::url('assets/admin/admin.css')?>" type="text/css"/>
    </head>
    <body>
        <?php $this->view('Admin/headerView');?>
        
        <section id="content">
            <?php 
                if(isset($page)){
                    $data = isset($data)?$data:[];
                     $this->view($page, $data);
                }
            ?>
        </section>

    </body>
</html>
