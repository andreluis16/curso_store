<?php

namespace App\Services;
/**
 * Description of News
 *
 * @author andre
 */
class RegisterService {
    
private $uploadService;
private $registerRepository;

  
    public function __construct(UploadService $uploadService, \App\Repositories\RegisterRepository $registerRepository) {
        $this->uploadService = $uploadService;
        $this->registerRepository = $registerRepository;
    } 


    public function create($imageName, $imagePath, $name, $email, $password, $passwordConfirm, $birthDate) {
        
       
        
        if($password != $passwordConfirm){
            throw new \Exception('passwords do not match');
        }
        
        if(!$name){
            throw new \Exception('name is required');
        }
        
        if(!$email){
            throw new \Exception('email is required');
        }
        
        if(!$password){
            throw new \Exception('password is required');
        }
        
        if(!$birthDate){
            throw new \Exception('birth date is required');
        }
        
        if(strlen($name) < 3){
            throw new \Exception('The name field must have at least 3 characters');
        }
        
        if(strlen($password) < 8 || strlen($password) > 12){
            throw new \Exception('the password field must have a minimum of 8 characters and a maximum of 12');
        }
        
        if(ctype_lower($password) == true){
            throw new \Exception('the password field must have at least one capital letter');
        }
        $numberVerify = filter_var($password, FILTER_SANITIZE_NUMBER_INT);
        if($numberVerify == ''){
            throw new \Exception('the password field must have at least one number');
        }
       
        $data = new \DateTime($birthDate);
        $resultado = $data->diff( new \DateTime( date('Y-m-d') ) );
        if($resultado->format( '%Y' ) < 18){
            throw new \Exception('only for over 18s');
        }
        
        $imageUri = $this->uploadService->upload($imageName, $imagePath, \App\Config\Config::getFullUploadDir(), ['jpg', 'jpeg', 'png']);

        
        $this->registerRepository->create($imageUri, $name, $email, $password, $birthDate);
    }
    
    
    
}
