<?php
/**
 * Created by PhpStorm.
 * User: ccoronado
 * Date: 27/01/15
 * Time: 10:38
 */


class MY_Controller  extends CI_Controller
{

    protected $is_logged= false;
    protected $user_id =0;
    protected $name='';
    protected $redirect='';

    private $css_files = array();
    private $js_files = array();

    protected $meta_title;


    private $data = array(); //var for template

    //models generic
    public $db;

    public function __construct()
    {

        parent::__construct();

        date_default_timezone_set('Europe/Berlin');
        $this->name= get_class($this);
        $this->meta_title = ucfirst($this->name);

        $this->is_logged = $this->session->userdata('is_logged', false);

        $this->redirect = $this->input->get("redirect", false);
        if ($this->redirect && $this->name != 'Login') {
            redirect(base_url($this->redirect));
        }

        $this->addCss("vendor/bootstrap.min.css");
        $this->addCss("vendor/bootstrap-theme.min.css");
        $this->addCss("main.min.css");
        $this->addJs('vendor/jquery.min.js');
        $this->addJs('vendor/bootstrap.min.js');

    }

    /**
     * Función para añadir archivos css de cada controlador.
     * @param string $file nombre fichero css
     * @return true
     */
    protected function addCss($file)
    {
        $this->css_files[]= $file;
    }

    /**
     * Función para añadir archivos js de cada controlador.
     * @param string $file nombre fichero js
     * @return true
     */
    protected function addJs($file)
    {
        $this->js_files[]= $file;
    }

    /**
     * Funcion para mostrar las vistas incluyendo header y footer
     * @param string $view String Vista a mostrar
     * @param array  $data Datos para pasar a vistas
     * @return true
     */
    public function display($view, $data = null)
    {

        if (is_array($data)) {
            $this->data = array_merge($this->data, $data);
        }

        $this->data['css_files']    = $this->css_files;
        $this->data['js_files']     = $this->js_files;
        $this->data['is_logged']    = $this->is_logged;
        $this->data['user_id']      = $this->user_id;
        $this->data['redirect']     = $this->redirect;
        $this->data['current_menu'] = $this->name;
        $this->data['meta_title']   = $this->meta_title;

        if (get_parent_class($this) != 'MY_Controller') {
            $env = 'private';
        } else {
            $env = 'public';
        }

        $this->load->view("header", $this->data);
        $this->load->view($env . DIRECTORY_SEPARATOR . $view, $this->data);
        $this->load->view("footer", $this->data);
    }

    /**
     * Función para iniciar conexión a BBDD cuando es necesiario
     * @return true
     */
    protected function connectDB()
    {
        $this->load->database();
    }

    /**
     * Obtiene el usuario actual
     * @return Usuario
     */
    protected function getCurrentUser()
    {
        /*
        if (!isset($this->db)) {
            $this->connectDB();
        }*/

        $this->load->model("Usuario");
        return new Usuario($this->session->user_id);
    }

}

/**
 * Clase para tener contenido protegido por login
 * Class MY_Controller_Private
 */
class MY_Controller_Private extends MY_Controller
{

    /**
     * @var CI_Session_database_driver
     */
    public $db;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        parent::__construct();

        /** Comprobamos que tenga hecho el login */
        $url='entrar';
        $this->redirect = $this->input->server("REQUEST_URI");
        if (($this->redirect != '/') && ($this->redirect != '')) {
            $url .= '?redirect='.$this->redirect;
        }

        if ($this->is_logged == false) {
            redirect(base_url($url));
        }
    }
}
