<?php
//Me uno a la sesion
session_start();
//vacio el array de la session
$_SESSION= array();
//destruyo la session
session_destroy();

//lo redirecciono a la página anterior
$ir=$_SERVER['HTTP_REFERER'];
header("location:$ir"); 