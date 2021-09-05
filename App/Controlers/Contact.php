<?php


namespace App\Controlers;

/**
 * Description of Contact
 *
 * @author andre
 */
class Contact extends Abstracts\BaseControler {
    public function contact() {
        $data['page'] = 'contactView';
        $this->view('indexView', $data);
    }
}
