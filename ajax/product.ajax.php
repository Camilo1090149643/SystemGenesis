<?php

require_once "../vendor/autoload.php";
require_once "../Controllers/ProductController.php";
require_once "../Models/Product.php";

class ajaxProduct{
    public $fileProductos;
    public function ajaxCargaMasivaProductos(){
        $respuesta=ProductController::ctrCargaMasivaProductos($this->fileProductos);
        echo json_encode($respuesta);
    }
}

if(isset($_FILES)){
    $archivo_productos = new ajaxProduct();
    $archivo_productos-> fileProductos = $_FILES['fileProductos'];
    $archivo_productos-> ajaxCargaMasivaProductos();
} 