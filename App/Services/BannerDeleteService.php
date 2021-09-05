<?php

namespace App\Services;

/**
 * Description of BannerDeleteService
 *
 * @author andre
 */
class BannerDeleteService {
    private $bannerRepository;
    
    public function __construct(\App\Repositories\IBannerRepository $bannerRepository) {
        $this->bannerRepository = $bannerRepository;
    }
    
    public function delete(int $bannerId){
        return $this->bannerRepository->delete($bannerId);
    }

}
