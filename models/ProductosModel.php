<?php

require_once __DIR__ .'./../db/DB.php';

class ProductosModel {
    private $bd;
    private $pdo;

    public function __construct() {
        $this->bd =new DB();
        $this->pdo = $this->bd->getPDO();
    }
    
    public function productos($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE productos.categoriumIdCategoria  = '".$id."'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function productos2($precio) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE productos.precio  < '".$precio."'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

