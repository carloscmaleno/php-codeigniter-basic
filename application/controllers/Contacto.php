<?php
 /**
  * File: Contacto.php
  *
  * PHP version 5
  *
  * @category File
  * @package  php-codeigniter-base
  * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
  * @date     26/08/15 14:02
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */
/**
 * Class Contacto
 * @category Class
 * @package  php-codeigniter-base
 * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
 * @date     26/08/15 14:02
 * @license  http://www.laviniainteractiva.com  PHP License
 * @link     http://www.laviniainteractiva.com
 */
class Contacto extends MY_Controller
{

    public function index()
    {
        $this->addCss("vendor/jquery.realperson.css");
        $this->addJs("vendor/jquery.plugin.js");
        $this->addJs("vendor/jquery.realperson.min.js");
        $this->display('contacto');
    }
}
