<?php

class ProductController{
    
    static public function ctrCargaMasivaProductos($fileProductos){
        $respuesta = Product::mdlCargaMasivaProductos($fileProductos);
        return $respuesta;
    }

    static public function ctrListarProductos(){
        $productos = Product::mdlListarProductos();
        return $productos;
    }
    static public function ctrRegistrarProducto($codigo_producto, $id_categoria, $descripcion_producto, $precio_compra_producto,
    $precio_venta_producto, $stock_producto, $minimo_stock_producto){
        $registroProducto=Product::mdlRegistratProducto($codigo_producto, $id_categoria, $descripcion_producto, $precio_compra_producto,
    $precio_venta_producto, $stock_producto, $minimo_stock_producto);
    return $registroProducto;
    }

}