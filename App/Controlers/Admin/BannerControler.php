<?php

namespace App\Controlers\Admin;

/**
 * Description of BannerControler
 *
 * @author andre
 */
class BannerControler extends \App\Controlers\Abstracts\BaseControler{
    public function createForm() {
        $data['page'] = 'Admin/bannerFormView';
        $this->view('Admin/indexView', $data);
    }
    
    public function saveBanner() {
    
        
        $bannerImage = $_FILES['banner_image'];
        $link = $_POST['link'];
        
        try{
            $bannerRepository = new \App\Repositories\BannerRepository(\Framework\DB\Connection::getConnection());
            $uploadService =  new \App\Services\UploadService();
            $bannerCreateService = new \App\Services\BannerCreateService($bannerRepository, $uploadService);
            $bannerCreateService->create($bannerImage['name'], $bannerImage['tmp_name'], $link);
            header("Location: ".\App\Config\Config::url('/admin/banner'));
            
        } catch (\Exception $e) {
            echo 'Error on insert banner: ', $e->getMessage();
        }
    }
    
    public function listBanner() {
        
        try{
        $bannerRepository = new \App\Repositories\BannerRepository(\Framework\DB\Connection::getConnection());
        $banners = $bannerService = new \App\Services\BannerListService($bannerRepository);
        $banners = $bannerService->listBanner();
            } catch (\Exception $e) {
            echo 'Error on insert banner: ', $e->getMessage();
        }
        
        $data['bannerList'] = $banners;
        $data['page'] = 'Admin/bannerListView';        
        $this->view('Admin/indexView', $data);
    }
    
    public function delete(){
        $bannerId = $_GET['id'];
        try{
        $bannerRepository = new \App\Repositories\BannerRepository(\Framework\DB\Connection::getConnection());
        $bannerService = new \App\Services\BannerDeleteService($bannerRepository);
        $bannerService->delete($bannerId);
        header("Location: ".\App\Config\Config::url('/admin/banner'));
         } catch (\Exception $e) {
            echo 'Error on insert banner: ', $e->getMessage();
        }
    }
    
    public function editForm(){
        $bannerId = $_GET['id'];
        
        try{
            
        $bannerRepository = new \App\Repositories\BannerRepository(\Framework\DB\Connection::getConnection());
        $bannerGetService = new \App\Services\BannerGetService($bannerRepository);
        $banner = $bannerGetService->get($bannerId);
           
        $data['banner'] = $banner;
        $data['page'] = 'Admin/bannerEditView';
        $this->view('Admin/indexView', $data);
        
         } catch (\Exception $e) {
            echo 'Error on insert banner: ', $e->getMessage();
        }
     
    }
    
    public function saveEditBanner(){
        $bannerId = $_GET['id'];
        $imageBanner = $_FILES["banner_image"];
        $link = $_POST['link'];
        
        try{
            
        $bannerRepository = new \App\Repositories\BannerRepository(\Framework\DB\Connection::getConnection());
        $uploadService = new \App\Services\UploadService();
        $bannerGetService = new \App\Services\BannerGetService($bannerRepository);
        $bannerEditService = new \App\Services\BannerEditService($bannerRepository, $uploadService, $bannerGetService);
        $bannerEditService->edit($bannerId, $imageBanner['name'], $imageBanner['tmp_name'], $link);
        header("Location: ".\App\Config\Config::url('/admin/banner'));
        
        } catch (\Exception $e) {
            echo 'Error on insert banner: ', $e->getMessage();
        }
                
                
    }
    
    public function showBanner(){
        
        try{
        $bannerRepository = new \App\Repositories\BannerRepository(\Framework\DB\Connection::getConnection());
        $banners = $bannerService = new \App\Services\BannerListService($bannerRepository);
        $banners = $bannerService->listBanner();
        
        $data['bannerShow'] = $banners;
        $data['page'] = 'bannerView';
        $this->view('indexView', $data);
        }catch(\Exception $e){
             echo 'Error on insert banner: ', $e->getMessage();
        }
    }



}
