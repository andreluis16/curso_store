<?php

namespace App\Services;

/**
 * Description of ProductsCreateService
 *
 * @author andre
 */
class ProductsCreateService {
    private $productsRepository;
    private $uploadService;
    
    function __construct(\App\Repositories\IProductsRepository $productsRepository, UploadService $uploadService) {
        $this->productsRepository = $productsRepository;
        $this->uploadService = $uploadService;
    }
    
    public function create(string $imageName, string $imagePath, string $name, float $price, string $description) {
        
        if(empty($name)){
            throw new Exception("invalid product name");
        }
        if(empty($price)){
            throw new Exception("invalid product price");
        }
        if(!is_numeric($price)){
            throw new Exception("the price must be a number");
        }
          if($price < 0){
            throw new Exception("the price must be zero or greater");
        }
        if(empty($description)){
            throw new Exception("invalid product description");
        }
        
        $imageUri = $this->uploadService->upload($imageName, $imagePath, \App\Config\Config::getFullUploadDir(), \App\Config\Config::$UPLOAD_IMAGE_ALLWED_EXTENSIONS);
        
        $this->productsRepository->create($imageUri, $name, $price, $description);
    } 

}
