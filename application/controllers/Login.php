<?php
 /**
  * File: Login.php
  *
  * PHP version 5
  *
  * @category File
  * @package  conecta2endiabetes
  * @author   Carlos Coronado <carlos.coronado@laviniainteractivac.com>
  * @date     26/08/15 12:22
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */

/**
 * Class Login
 * @category Class
 * @package  conecta2endiabetes
 * @author   Carlos Coronado <carlos.coronado@laviniainteractivac.com>
 * @date     26/08/15 12:22
 * @license  http://www.laviniainteractiva.com  PHP License
 * @link     http://www.laviniainteractiva.com
 */
class Login extends MY_Controller
{

    /**
     * Muestra la página de login
     */
    public function index()
    {
        if ($this->is_logged) {
            redirect(base_url());
        }

        $this->addJs("login.min.js");
        $this->display('login');
    }

    /**
     * Muestra la página de registro
     */
    public function registro()
    {

        if ($this->is_logged) {
            redirect(base_url());
        }

        $this->meta_title = 'Registro';
        $this->addJs("vendor/jquery.validate.min.js");
        $this->addJs("login.js");

        $this->display('registro');
    }

    /**
     * Cierra la sessión de la web
     */
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
