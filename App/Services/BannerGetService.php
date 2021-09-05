<?php

namespace App\Services;

/**
 * Description of BannerEditService
 *
 * @author andre
 */
class BannerGetService {
    
    private $bannerRepository;

    
    public function __construct(\App\Repositories\IBannerRepository $bannerRepository) {
        $this->bannerRepository = $bannerRepository;
    }
    
    public function get(int $id){
        return $this->bannerRepository->get($id);
    }

}
