<?php

require_once __DIR__ .'./../db/DB.php';

class UsuariosModel {
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd =new DB();
        $this->pdo = $this->bd->getPDO();
    }
    
    public function usuariosDB() {
        // Ejecuta una consulta para recuperar todas las tareas de la tabla "tareas"
        $stmt = $this->pdo->prepare("SELECT * FROM usuarios WHERE nombre is not null");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


