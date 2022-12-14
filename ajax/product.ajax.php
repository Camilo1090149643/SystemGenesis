<?php

require_once "../vendor/autoload.php";
require_once "../Controllers/ProductController.php";
require_once "../Models/Product.php";

class ajaxProduct{
    
    public $fileProductos;

    public $codigo_producto;
    public $id_categoria_producto;
    public $descripcion_producto;
    public $precio_compra_producto;
    public $precio_venta_producto;
    public $stock_producto;
    public $minimo_stock_producto;
    
    
    public function ajaxCargaMasivaProductos(){
        $respuesta=ProductController::ctrCargaMasivaProductos($this->fileProductos);
        echo json_encode($respuesta);
    }
    public function ajaxListarProductos(){
        $productos = ProductController::ctrListarProductos();
        echo json_encode($productos);
    }
    public function ajaxRegistrarProducto(){
        $producto = ProductController::ctrRegistrarProducto($this->codigo_producto, $this->$id_categoria_producto, $this->$descripcion_producto, $this->$precio_compra_producto,
        $this->$precio_venta_producto, $this->$stock_producto, $this->$minimo_stock_producto);
        echo json_encode($producto);
    }


}
if(isset($_POST['accion']) && $_POST['accion'] == 1){ //para listar productos
    $productos=new ajaxProduct();
    $productos -> ajaxListarProductos();

}else if(isset($_POST['accion']) && $_POST['accion'] == 2){// para registrar productos
    $registrarProducto = new ajaxProduct();
    $registrarProdutos -> codigo_producto = $_POST["codigo_producto"];
    $registrarProdutos -> id_categoria_producto = $_POST["id_categoria_producto"];
    $registrarProdutos -> descripcion_producto = $_POST["descripcion_producto"];
    $registrarProdutos -> precio_compra_producto = $_POST["precio_compra_producto"];
    $registrarProdutos -> precio_venta_producto = $_POST["precio_venta_producto"];
    $registrarProdutos -> stock_producto = $_POST["stock_producto"];
    $registrarProdutos -> minimo_stock_producto = $_POST["minimo_stock_producto"];
    $registrarProducto -> ajaxRegistrarProducto();

}else if(isset($_FILES)){
    $archivo_productos = new ajaxProduct();
    $archivo_productos-> fileProductos = $_FILES['fileProductos'];
    $archivo_productos-> ajaxCargaMasivaProductos();
} 