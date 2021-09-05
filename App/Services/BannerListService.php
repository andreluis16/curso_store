<?php

namespace App\Services;

/**
 * Description of bannerListService
 *
 * @author andre
 */
class BannerListService {
    private $bannerRepository;
    
    public function __construct(\App\Repositories\IBannerRepository $bannerRepository) {
        $this->bannerRepository = $bannerRepository;
    }
    
    public function listBanner(){
        return $this->bannerRepository->listBanner();
    }

}
