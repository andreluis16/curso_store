<?php

namespace App\Repositories;

/**
 * Description of BannerRepository
 *
 * @author andre
 */
class BannerRepository implements IBannerRepository {
  
    private $con;
    
    public function __construct($con) {
        $this->con = $con;
    }

    public function create(string $imageUri, string $link): bool {
        $image = addslashes($imageUri);
        $link = addslashes($link);
        $date = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO banner(image_uri, link, created_at) VALUES('{$image}', '{$link}', '{$date}')";
        $this->con->query($sql);
        
        if($this->con->error){
            throw new \Exception($this->con->error);       
        }
        return true;
    }

    public function listBanner(): array {
        $sql = "SELECT * FROM banner ORDER BY banner_id DESC";
        $result = $this->con->query($sql);
        $banners = [];
        if($this->con->error){
            throw new \Exception($this->con->error);
        }
        while($banner = $result->fetch_object()){
            $banners[] = $banner;
        }
        return $banners;
    }

    public function delete(int $id): bool {
        $sql = "DELETE FROM banner WHERE banner_id = ".$id;
        $this->con->query($sql);
        if($this->con->error){
            throw new \Exception($this->con->error);
        }
        return true;
    }

    public function edit(int $id, string $imageUri, string $link): bool {
        
        
        $imageUri = addslashes($imageUri);
        $link = addslashes($link);
        
        $sql = "UPDATE banner SET image_uri = '{$imageUri}', link = '{$link}' WHERE banner_id = ".$id;
        $this->con->query($sql);
        if($this->con->error){
            throw new \Exeption($this->con->error);
        }
        
        return true;
    }

    public function get(int $id): \stdClass {
        $sql = "SELECT * FROM banner WHERE banner_id = ".$id;
        $result = $this->con->query($sql);
        if($this->con->error){
            throw new \Exception($this->con->error);
        }
        
        return $result->fetch_object();
    }

}
