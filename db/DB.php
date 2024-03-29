<?php

class DB {

    private $pdo;

    public function __construct() {
        require $_SERVER['DOCUMENT_ROOT'].'/TFG_Frontend/config/Config.php';
        try {
            // Crea una instancia de PDO para conectarse a la base de datos
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $usuario, $pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
        } catch (Exception $ex) {
            header("Location: errorBD.php");
        }
    }

    // Obtiene una instancia de PDO
    public function getPDO() {
        return $this->pdo;
    }

}
