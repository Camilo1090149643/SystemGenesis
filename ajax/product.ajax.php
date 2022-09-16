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
    public function ajaxListarProductos(){
        $productos = ProductController::ctrListarProductos();
        echo json_encode($productos);
    }


}
if(isset($_POST['accion']) && $_POST['accion'] == 1){
    $productos=new ajaxProduct();
    $productos -> ajaxListarProductos();
}else if(isset($_FILES)){
    $archivo_productos = new ajaxProduct();
    $archivo_productos-> fileProductos = $_FILES['fileProductos'];
    $archivo_productos-> ajaxCargaMasivaProductos();
} 