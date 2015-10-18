<?php
 /**
  * File: Usuario.php
  *
  * PHP version 5
  *
  * @category File
  * @package  php-codeigniter-base
  * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
  * @date     16/09/15 17:15
  * @license  http://www.laviniainteractiva.com  PHP License
  * @link     http://www.laviniainteractiva.com
  */

/**
 * Class Usuario
 * @category Class
 * @package  php-codeigniter-base
 * @author   Carlos Coronado <carlos.coronado@laviniainteractiva.com>
 * @date     16/09/15 17:15
 * @license  http://www.laviniainteractiva.com  PHP License
 * @link     http://www.laviniainteractiva.com
 */
class Usuario extends CI_Model
{
    public $id;
    public $email;
    
    protected $fecha_registro;
    protected $num_login;
    protected static $table_name = 'usuario';


    public function __construct($id = 0)
    {
        $this->id = $id;
    }

    /**
     * Registra un usuario en la web
     * @return bool|array
     */
    public function registrar()
    {
        return true;
    }

    public function login()
    {
        $q = $this->db->get_where(self::$table_name, array('id'=>$this->id));
        $row = $q->row();

        if (isset($row->id)) {
            $this->db->where('id', $this->id);
            $this->db->update(
                self::$table_name,
                array(
                    'num_login' => $row->num_login+1
                )
            );
            return true;

        } else {
            $this->db->insert(
                self::$table_name,
                array(
                    'id' => $this->id,
                    'fecha_registro' => date('Y-m-d H:i:s'),
                    'email' => $this->email,
                    'num_login' => 1
                )
            );
        }
    }

    /**
     * Actualiza los datos del usuario
     */
    public function actualizar()
    {
        
    }



    /**
     * Obtiene la información del usuario
     */
    public function getInfo()
    {

    }
}
