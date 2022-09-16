<?php

require_once "connection.php";
use PhpOffice\PhpSpreadsheet\IOFactory;

class Product{
    static public function mdlCargaMasivaProductos($fileProductos){
        $nombreArchivo = $fileProductos['tmp_name'];
        $documento = IOFactory::load($nombreArchivo);

        //$hojaCategorias = $documento->getSheet(1);
        $hojaCategorias = $documento->getSheetByName("Categorias");
        $numeroFilasCategorias = $hojaCategorias->getHighestDataRow();

        //vardump($numeroFilasCategorias);

        $categoriasRegistradas = 0;
        
        for ($i = 2; $i <=$numeroFilasCategorias ; $i++) { 
            
    
           // $categoria = $hojaCategorias->getCellByColumnAndRow(1,$i);
            $categoria = $hojaCategorias->getCell("A".$i);

            $fecha_creacion = date("d-m-y");
            
         
                $stmt=Connection::conectar()->prepare("INSERT INTO categoria(category_name, update_date) VALUES(:category_name, :update_date);");
                $stmt -> bindParam(":category_name", $categoria,PDO::PARAM_STR);
                $stmt -> bindParam(":update_date", $fecha_creacion,PDO::PARAM_STR);
                $stmt->execute();
                $categoriasRegistradas = $categoriasRegistradas + 1;
                
                
            
        }
        return $categoriasRegistradas;

    }

    static public function mdlListarProductos(){
        $stmt = Connection::conectar()->prepare('call prc_ListarProductos');
        $stmt->execute();

        return $stmt->fetchAll();
    }

}