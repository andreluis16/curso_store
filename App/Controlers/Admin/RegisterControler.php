<?php


namespace App\Controlers\Admin;
/**
 * Description of Registration
 *
 * @author andre
 */
class RegisterControler extends \App\Controlers\Abstracts\BaseControler {
    
    public function register(){
        $this->view('Admin/registerView');
    }
    
    public function saveRegister() {
        
       $imagePath = $_FILES['profile_picture']['tmp_name']; 
       $imageName = $_FILES['profile_picture']['name'];
    
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passowordConfirm = $_POST['password_confirm'];
        $birthDate = $_POST['birth_date'];
        

        
        
        try{
             
        $uploadService = new \App\Services\UploadService();
        $registerRepository = new \App\Repositories\RegisterRepository(\Framework\DB\Connection::getConnection());
        
        $registerService = new \App\Services\RegisterService($uploadService, $registerRepository);
        $registerService->create($imageName, $imagePath, $name, $email, $password, $passowordConfirm, $birthDate);
             $this->view('Admin/registerConfirmView');
             
        } catch (\Exception $e) {
            echo 'Error on creating users: '.$e->getMessage();
        }
    }
    
      
 
}
