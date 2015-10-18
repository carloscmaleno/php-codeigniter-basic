<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller_Private
{

    /**
     * Index Page for this controller.
     * @return bool
     */
    public function index()
    {
        $user = $this->getCurrentUser();

        $this->meta_title = 'Inicio';

        $this->display('home');
    }


}
