<?php


namespace App\Repositories;

/**
 * Description of IBannerRepository
 *
 * @author andre
 */
interface IBannerRepository {
    
    /**
     * 
     * @param string $imageUri
     * @param string $link
     * @return bool
     */
    public function create(string $imageUri, string $link): bool;
    
    /**
     * 
     * @param string $imageUri
     * @param string $link
     * @return bool
     */
    public function edit(int $id, string $imageUri, string $link): bool;
    
    /**
     * 
     * @param int $id
     * @return \stdClass
     */
    public function get(int $id): \stdClass;


    /**
     * 
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
    
    /**
     * 
     * @return array
     */
    public function listBanner(): array;

}
