<?php
 /**
  * File: Legal.php
  *
  * PHP version 5
  *
  * @category File
  * @package  php-codeigniter-base
  * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
  * @date     21/09/15 17:34
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */ 
/**
 * Class Legal 
 * @category Class
 * @package  php-codeigniter-base
 * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
 * @date     21/09/15 17:34
 * @license  http://www.laviniainteractiva.com  PHP License
 * @link     http://www.laviniainteractiva.com
 */
class Legal extends MY_Controller
{

    public function notaLegal()
    {
        $this->display("legal/nota_legal");
    }

    public function cookies()
    {
        $this->display("legal/cookies");
    }
}
