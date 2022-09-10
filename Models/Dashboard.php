<?php

require_once "Connection.php";

class Dashboard{
    static public function mdlGetDatosDashboard(){
        $stmt = Connection::conectar()->prepare('call prc_ObtenerDatosDashboard()');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    static public function mdlProductosMasVendidos(){
        $stmt = Connection::conectar()->prepare('call prc_ListarProductosMasVendidos');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


} 