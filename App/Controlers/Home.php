<?php

namespace App\Controlers;

class Home extends Abstracts\BaseControler{
    
    public function home(){
        \Framework\DB\Connection::getConnection(); 
        $data['page'] = 'homeView';
        $this->view('indexView', $data);
    } 
    
}