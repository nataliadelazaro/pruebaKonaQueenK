<?php
class ViewHelpers{

    //Helpers para la navegacion entre las vistas
    public static function url($controlador=CONTROLLER,$accion=ACTION){
        $urlString="index.php?controller=".$controlador."&action=".$accion;
        return $urlString;
    }
}