<?php

class ProductController{
    static public function ctrCargaMasivaProductos($fileProductos){
        $respuesta = Product::mdlCargaMasivaProductos($fileProductos);
        return $respuesta;
    }
}