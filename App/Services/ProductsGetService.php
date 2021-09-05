<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Services;

/**
 * Description of ProductsGetService
 *
 * @author andre
 */
class ProductsGetService {
            
    private $productsRepository;
    /**
     * 
     * @param \App\Repositories\IProductsRepository $productsRepository
     */

    public function __construct(\App\Repositories\IProductsRepository $productsRepository) {
        $this->productsRepository = $productsRepository;
    }

    
    public function get(int $id): \stdClass{
        return $this->productsRepository->get($id);
    }
}
