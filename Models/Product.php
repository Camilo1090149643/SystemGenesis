<?php

require_once "connection.php";
use PhpOffice\PhpSpreadsheet\IOFactory;

class Product{
    static public function mdlCargaMasivaProductos($fileProductos){
        $nombreArchivo = $fileProductos['tmp_name'];
        $documento = IOFactory::load($nombreArchivo);

        $hojaCategorias = $documento->getSheet(1);
        $numeroFilasCategorias = $hojaCategorias->getHighestDataRow();

        //var_dump($numeroFilasCategorias);
        $categoriasRegistradas = 0;
        for ($i=2; $i <=$numeroFilasCategorias ; $i++) { 
            $categoria = $hojaCategorias->getCellByColumnAndRow(1,$i);
            $fecha_creacion = date("d-m-Y");
            
            if(!empty($categoria)){
                $stmt=Connection::conectar()->prepare("INSERT INTO categories(category_name, update_date) VALUES(:category_name, :update_date)");
                $stmt->bindParam(":category_name", $categoria,PDO::PARAM_STR);
                $stmt->bindParam(":update_date", $fecha_creacion,PDO::PARAM_STR);
                if($stmt->execute()){
                    $categoriasRegistradas=$categoriasRegistradas + 1;
                }else{
                    $categoriasRegistradas = 0;
                }
            }
            return $categoriasRegistradas;
        }


    }


}