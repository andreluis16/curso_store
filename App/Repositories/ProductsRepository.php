<?php

namespace App\Repositories;

/**
 * Description of ProductsRepositorie
 *
 * @author andre
 */
class ProductsRepository implements IProductsRepository {
    
    private $con;
    
    /**
     * 
     * @param \mysqli $con
     */
    
    public function __construct(\mysqli $con) {
        $this->con = $con;
    }
    
    public function create(string $imageUri, string $name, float $price, string $description):bool {
        
        $name = addslashes($name);
        $price = addslashes($price);
        $description = addslashes($description);
        $createdAt = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO "
                ."products(name, price,  description, image, created_at)"
                ."VALUES('{$name}', '{$price}', '{$description}', '{$imageUri}', '{$createdAt}')";
        
        $this->con->query($sql);
        if($this->con->error){
            throw new \Exception($this->con->error);
            
        }
        return true;
    }
    
    public function listProducts(): array {
        $sql = "SELECT * FROM products ORDER BY product_id DESC";
        $result = $this->con->query($sql);
        $products = [];
        while($product = $result->fetch_object()){
            $products[] = $product;
        }
        return $products;
        
    }

    public function delete(int $id) {
        $sql = "DELETE FROM products WHERE product_id = ".$id;
        $this->con->query($sql);
        if($this->con->error){
            throw new \Exception($this->con->error);
            
        }
        
    }

    public function get($id): \stdClass {
        $sql = "SELECT * FROM products WHERE product_id = ".$id ;
        $result = $this->con->query($sql);
        
        if($this->con->error){
            throw new \Exception($this->con->error);
            
        }
        if($result->num_rows <= 0){
             throw new \Exception("there is no product with id: {$id}");
        }
        return $result->fetch_object();      
       
    }

    public function edit(int $id, string $imageUri, string $name, float $price, string $description): bool {
        
        $name = addslashes($name);
        $price = addslashes($price);
        $description = addslashes($description);
        
        $sql = "UPDATE products SET name = '{$name}', price = '{$price}', description = '{$description}', image = '{$imageUri}' WHERE product_id = {$id}";
          
        $this->con->query($sql);
        if($this->con->error){
            throw new \Exception($this->con->error);
            
        }
        
        return true;
    }

}
