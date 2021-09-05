<?php

namespace App\Repositories;

/**
 * Description of IProductsRepository
 *
 * @author andre
 */
interface IProductsRepository {
    
    /**
     * 
     * @param string $imageUri
     * @param string $name
     * @param float $price
     * @param string $description
     * @return bool
     */
    public function create(string $imageUri, string $name, float $price, string $description): bool;
    
    /**
     * 
     * @param string $imageUri
     * @param string $name
     * @param float $price
     * @param string $description
     * @return bool
     */
    public function edit(int $id, string $imageUri, string $name, float $price, string $description): bool;
    
    /**
     * 
     * @return array
     */
    public function listProducts(): array;
    
    /**
     * 
     * @param int $id
     */
    
    public function delete(int $id);
    
    /**
     * 
     * @param int $id
     * @return \stdClass
     */
    
    public function get(int $id): \stdClass;
        
    
}
