<?php



namespace App\Controlers;

/**
 * Description of About
 *
 * @author andre
 */
class About extends Abstracts\BaseControler{
    public function about() {
        $data['page'] = 'aboutView';
        $this->view('indexView', $data);
    }
}
