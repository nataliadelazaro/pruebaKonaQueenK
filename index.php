<?php
//Configuración global
require_once 'config/configGlobal.php';

//Base para los controladores
require_once 'controller/BaseController.php';

//Funciones para el controlador frontal
require_once 'utils/FuncionesControllerHelper.php';

//Cargamos controladores y acciones
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLLER);
    lanzarAccion($controllerObj);
}
?>