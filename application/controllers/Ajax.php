<?php
/**
 * Created by PhpStorm.
 * User: ccoronado
 * Date: 27/01/15
 * Time: 13:19
 */

class Ajax extends MY_Controller
{

    /**
     * Establece la cabecera de las respuestas
     */
    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
    }

    /**
     * Recupera todas las llamadas ajax
     */
    public function index()
    {
        $action = $this->input->post("action");

        if (method_exists($this, $action)) {
            $this->$action();
        } else {
            $this->output->set_status_header('404');
        }
    }

    /**
     * Hace el login mediante ajax
     * @return json
     */
    private function login()
    {
        $this->load->model("Usuario");
        $u = new Usuario();
        //$u->login();

        $this->session->set_userdata(array(
            'user_id'=> $u->id,
            'is_logged' => true,
        ));
        echo json_encode(array("response" => true));
    }

    /**
     * Llamada para hacer track de contenido consumido
     * @return json
     */
    private function track()
    {
        //setters
        echo json_encode(array("response" => true));
    }

    /**
     * Llamada para hacer el registro a través de un ajax
     * @return json
     */
    private function registro()
    {
        $this->load->model('Usuario');

        $usuario = new Usuario();

        //setters

        $result = $usuario->registrar();
        $this->login();
    }

    /**
     * Llamada para actualizar los datos de ususario
     * @return json
     */
    private function actualizarPerfil()
    {
        $u = $this->getCurrentUser();

        //setters

        echo json_encode($u->actualizar());
    }

    /**
     * Llamada para mandar un email de contacto
     * @return json
     */
    private function contacto()
    {

        //comprobamos que el captcha sea correcto
        if (rpHash($this->input->post("text")) != $this->input->post("hash")) {
            echo json_encode(array('result' => false));
            exit;
        }

        $this->load->library('email');
        //setters
        $this->email->send();

        echo json_encode(array('result' => true));
    }
}

