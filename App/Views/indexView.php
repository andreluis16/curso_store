<!DOCTYPE html>
<html>
    <head>
        <title>Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="<?php echo \App\Config\Config::$BASE_URL.'assets/style.css'?>" type="text/css"/>
        <script src="<?php echo App\Config\Config::url('assets/js/Jquery.js')?>" ></script>
        <script src="<?php echo App\Config\Config::url('assets/js/jquery.min.js')?>" ></script>
        
    </head>
    <body>
        <?php $this->view('headerView');?>
        
        <section id="content">
             <?php 
                if(isset($page)){
                    $data = isset($data)?$data:[];
                     $this->view($page, $data);
                }
              ?>
        </section>
  
        <?php $this->view('footerView');?>
    </body>
</html>
