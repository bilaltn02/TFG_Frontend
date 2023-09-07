<?php
//include_once __DIR__ . '/models/HabitacionesModel.php';
//include_once __DIR__ . '/views/HabitacionesView.php';
//include_once __DIR__ . '/controllers/HabitacionesController.php';
           
include_once __DIR__ . '/services/FavoritosService.php';
include_once __DIR__ . '/views/FavoritosView.php';
include_once __DIR__ . '/controllers/FavoritosController.php';
         
include_once __DIR__ . '/services/ProductosService.php';
include_once __DIR__ . '/views/ProductosView.php';
include_once __DIR__ . '/models/ProductosModel.php';
include_once __DIR__ . '/controllers/ProductosController.php';
            
include_once __DIR__ . '/services/UsuariosService.php';
include_once __DIR__ . '/models/UsuariosModel.php';
include_once __DIR__ . '/views/UsuariosView.php';
include_once __DIR__ . '/controllers/UsuariosController.php';

define('ACCION_DEFECTO', 'usuarios');

// Define el controlador por defecto
define('CONTROLADOR_DEFECTO', 'Usuarios');

// Comprueba la acción a realizar, que llegará en la petición.
// Si no hay acción a realizar lanzará la acción por defecto, que es listar
// Y se carga la acción, llama a la función cargarAccion
function lanzarAccion($controllerObj){
    
    //method_exists() es una función predefinida de PHP que permite comprobar si un 
    //método existe en un objeto dado.
    if(isset($_GET["action"]) && method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    } 
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
        //O añadir una página indicando el error de la acción
        //die("Se ha cargado una acción errónea");
    }
}

// Lo que hace es ejecutar una función que va a existir en el controlador
// y que se llama como la acción. Recibe un objeto controlador.
function cargarAccion($controllerObj, $action){
    $accion=$action;
    $controllerObj->$accion();
}


// Carga el controlador especificado y devuelve una instancia del mismo
function cargarControlador($nombreControlador) {
    $controlador = $nombreControlador . 'Controller';
    if (class_exists($controlador)) {
        return new $controlador();
    } else {
        // Si el controlador no existe, se lanza una excepción
        //O añadir una página indicando el error del controlador
        die ("controlador no válido");
    }
}

// Carga el controlador y la acción correspondientes
if(isset($_GET["controller"])){
    $controllerObj=cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    lanzarAccion($controllerObj);
}

