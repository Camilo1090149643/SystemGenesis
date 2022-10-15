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


    static public function mdlRegistrarProducto($codigo_producto, $id_categoria, $descripcion_producto, $precio_compra_producto,
                                                    $precio_venta_producto, $stock_producto, $minimo_stock_producto){
        try{
                $stmt = Connection::conectar()->prepare("INSERT INTO products(name, barcode, costl, price, stock, alert, category_id, provider_id)
                                                            VALUES(:descripcion_producto, :codigo_producto, :precio_compra_producto, :precio_venta_producto, :stock_producto, :minimo_stock_producto, :id_categoria, :id_provider)");

                $id_provider=1;                

                $stmt->bindParam(":codigo_producto", $codigo_producto, PDO::PARAM_STR);                                            
                $stmt->bindParam(":descripcion_producto", $descripcion_producto, PDO::PARAM_STR);                                            
                $stmt->bindParam(":precio_compra_producto", $precio_compra_producto, PDO::PARAM_STR);                                            
                $stmt->bindParam(":precio_venta_producto", $precio_venta_producto, PDO::PARAM_STR);                                            
                $stmt->bindParam(":stock_producto", $stock_producto, PDO::PARAM_STR);                                            
                $stmt->bindParam(":minimo_stock_producto", $minimo_stock_producto, PDO::PARAM_STR);                                            
                $stmt->bindParam(":id_categoria", $id_categoria, PDO::PARAM_STR);
                $stmt->bindParam(":id_provider", $id_provider, PDO::PARAM_STR);
                
                if($stmt->execute()){
                    $resultado = "ok";
                }else{
                    $resultado = "error";
                }
            }catch(Exeption $e){
                $resultado='Exepcion capturada: ' . $e->getMessage(). "\n";
            }
        return $resultado;
        $stmt = null;
    }

}