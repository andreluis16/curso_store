<?php

namespace App\Services;

/**
 * Description of BannerCreateService
 *
 * @author andre
 */
class BannerCreateService {
    
    private $bannerRepository;
    private $uploadService;
    
    public function __construct($bannerRepository, $uploadService) {
        $this->bannerRepository = $bannerRepository;
        $this->uploadService = $uploadService;
    }
    
    public function create(string $imageName, string $imagePath, string $link) {
        
        if(empty($link)){
            throw  new \Exception('link not valid');  
        }
        
        
        $imageUri = $this->uploadService->upload($imageName, $imagePath, \App\Config\Config::getFullUploadDir(), \App\Config\Config::$UPLOAD_IMAGE_ALLWED_EXTENSIONS);
        $this->bannerRepository->create($imageUri, $link);
    }

}
