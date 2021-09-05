<?php

namespace App\Controlers\Admin;

/**
 * Description of NewsControler
 *
 * @author andre
 */
class NewsControler extends \App\Controlers\Abstracts\BaseControler {
    
    public function create() {
        $page['page'] = "Admin/newsCreateView";
        $this->view("Admin/indexView", $page);
    }
    
    public function saveNew() {
        
        $imagePath = $_FILES['image']['tmp_name']; 
        $imageName = $_FILES['image']['name'];
        
        $title = $_POST['title'];
        $resume = $_POST['resume'];
        $news = $_POST['news'];
        
        try{
             
        $uploadService = new \App\Services\UploadService();
        $newsRepository = new \App\Repositories\NewRepository(\Framework\DB\Connection::getConnection());
        
        $newsService = new \App\Services\NewsService($uploadService, $newsRepository);
        $newsService->create($imageName, $imagePath, $title, $resume, $news);
            echo 'News created';
        } catch (Exception $e) {
            echo 'Error on creating news: '.$e->getMessage();
        }
    }
    
    
    
}
