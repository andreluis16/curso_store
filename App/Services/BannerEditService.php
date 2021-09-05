<?php

namespace App\Services;

/**
 * Description of BannerEditService
 *
 * @author andre
 */
class BannerEditService {
   
    private $bannerRepository;
    private $uploadService;
    private $bannerGetService;


    public function __construct(\App\Repositories\IBannerRepository $bannerRepository, UploadService $uploadService, BannerGetService $bannerGetService) {
        $this->bannerRepository = $bannerRepository;
        $this->uploadService = $uploadService;
        $this->bannerGetService = $bannerGetService;
    }
    
    public function  edit(int $id, string $imageName, string $imagePath, string $link) {
        
        
        $banner = $this->bannerGetService->get($id);
        $imageUri = $banner->image_uri;
        
        if($imageName){
        $imageUri = $this->uploadService->upload($imageName, $imagePath, \App\Config\Config::getFullUploadDir(), \App\Config\Config::$UPLOAD_IMAGE_ALLWED_EXTENSIONS);
        }
        
        $this->bannerRepository->edit($id, $imageUri, $link);
    }

}
