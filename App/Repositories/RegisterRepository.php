<?php

namespace App\Repositories;
/**
 * Description of NewRepository
 *
 * @author andre
 */
class RegisterRepository {
    
    private $con;
    
    public function __construct(\mysqli $con) {
        $this->con = $con;
    }

        public function create($imageUri, $name, $email, $password, $birthDate) {
        $this->con->query("INSERT INTO users(name, email, password, profile_picture, created_at, birth_date) VALUES('".addslashes($name)."','".addslashes($email)."','". addslashes($password)."','".addslashes($imageUri)."','".date('Y-m-d H:i:s')."','".addslashes($birthDate)."')");
        if($this->con->error){
            throw  new \Exception($this->con->error);
        }
                                                               
    }
}
