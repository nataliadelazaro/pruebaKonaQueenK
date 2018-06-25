<?php

class BaseController
{

    //Clase que define los métodos de los controladores

    public function __construct()
    {

        if (!session_id()){
            @ session_start();
        }

        foreach (glob("model/*.php") as $file) {
            require_once $file;
        }

        foreach (glob("repositorio/*.php") as $file) {
            require_once $file;
        }
    }

    public function view($vista, $datos)
    {
        foreach ($datos as $id_assoc => $valor) {
            ${$id_assoc} = $valor;
        }

        require_once 'utils/ViewHelpers.php';
        $helper = new ViewHelpers();

        require_once 'view/' . $vista . 'View.php';
    }

    public function redirect ($controlador = CONTROLLER, $accion = ACTION)
    {
        header("Location:index.php?controller = " . $controlador . "&action = " . $accion);
    }
}
