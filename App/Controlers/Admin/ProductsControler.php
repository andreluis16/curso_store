<?php

namespace App\Controlers\Admin;

/**
 * Description of ProductsControler
 *
 * @author andre
 */
class ProductsControler extends \App\Controlers\Abstracts\BaseControler {
    public function create() {
        $data['page'] = "Admin/productsCreateView";
        $this->view("Admin/indexView", $data);
    }
    
    public function saveCreate() {
        $image = $_FILES['image'];
        $name = $_POST['name'];
        $price = (float)$_POST['price'];
        $description = $_POST['description'];
        
      
        
        try{  
         
        $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
        $uploadService = new \App\Services\UploadService();
       
        $productsCreateService = new \App\Services\ProductsCreateService($productsRepository, $uploadService);
        $productsCreateService->create($image['name'], $image['tmp_name'], $name, $price, $description);
        header("Location: ".\App\Config\Config::url("/admin/products/list-products")); 
         } catch (\Exception $e) {
             echo 'Error on create product: ', $e->getMessage();
        }
    }
    
    public function listProducts() {
        
        $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
        $productsListSevice = new \App\Services\ProductsListService($productsRepository);
        $products = $productsListSevice->listProducts();

        
        $data['page'] = "Admin/productsListView";
        $data['products'] = $products;
        $this->view("Admin/indexView", $data);
    }
    
    public function delete() {
        $productId = $_GET['id'];
        
       
        try{
            
        $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
        $productsDeleteSevice = new \App\Services\ProductsDeleteService($productsRepository);
        $productsDeleteSevice->delete($productId);
           header("Location: ".\App\Config\Config::url("/admin/products/list-products"));
        }catch(\Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function edit() {
        
         $productId = $_GET['id'];
        
        $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
        $productsGetSevice = new \App\Services\ProductsGetService($productsRepository);
        $product = $productsGetSevice->get($productId);
        
        $data['page'] = "Admin/productEditView";
        $data['product'] = $product;
        $this->view("Admin/indexView", $data);
    }
    
        public function saveEdit() {
            
        $productId = (int)$_GET['id'];
        $image = $_FILES['image'];
        $name = $_POST['name'];
        $price = (float)$_POST['price'];
        $description = $_POST['description'];
        
      
        
        try{  
         
        $productsRepository = new \App\Repositories\ProductsRepository(\Framework\DB\Connection::getConnection());
        $uploadService = new \App\Services\UploadService();
        $productsGetSevice = new \App\Services\ProductsGetService($productsRepository);

        $productsEditService = new \App\Services\ProductsEditService($productsRepository, $uploadService, $productsGetSevice);
        $productsEditService->edit($productId, $image['name'], $image['tmp_name'], $name, $price, $description);
        header("Location: ".\App\Config\Config::url("/admin/products/list-products")); 
         } catch (\Exception $e) {
             echo 'Error on edit product: ', $e->getMessage();
        }
    }
}
