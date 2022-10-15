<?php

require_once "Connection.php";

class CategoriasModelo{
    static public function mdlListarCategorias(){
        $stmt = Connection::conectar()->prepare("SELECT id, category_name FROM categories c ORDER BY id ASC");
        $stmt -> execute();
        return $stmt->fetchAll(); 
    }
}