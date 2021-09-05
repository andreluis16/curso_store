<?php

namespace App\Services;
/**
 * Description of News
 *
 * @author andre
 */
class NewsService {
    
private $uploadService;
private $newsRepository;



    public function __construct(UploadService $uploadService, \App\Repositories\NewRepository $newsRepository) {
        $this->uploadService = $uploadService;
        $this->newsRepository = $newsRepository;
    } 


    public function create($imageName, $imagePath, $title, $resume, $news) {
        
                
        if(!$title){
            throw new \Exception('Title is required');
        }
        
        if(!$resume){
            throw new \Exception('Resume is required');
        }
        
        if(!$news){
            throw new \Exception('News is required');
        }
        
        $imageUri = $this->uploadService->upload($imageName, $imagePath, \App\Config\Config::getFullUploadDir(), \App\Config\Config::$UPLOAD_IMAGE_ALLWED_EXTENSIONS);

        
        $this->newsRepository->create($imageUri, $title, $resume, $news);
    }
    
    
    
}
