<?php

require_once "../Controllers/DashboardController.php";
require_once "../Models/Dashboard.php";

class AjaxDashboard{
    public function getDatosDashboard(){
        $datos = DashboardController::ctrGetDatosDashboard();
        echo json_encode($datos);
    }
    public function getProductosMasVendidos(){
        $productosMasVendidos=DashboardController::crtProductosMasVendidos();
        echo json_encode($productosMasVendidos);
    }
    public function getProductosPocoStock(){
        $productosPocoStock=DashboardController::crtProductosPocoStock();
        echo json_encode($productosPocoStock);
    }
}

    

if(isset($_POST['accion']) && $_POST['accion'] == 1){ //ejecutar funcion de productos mas vendidos
    $productosMasVendidos = new AjaxDashboard();
    $productosMasVendidos-> getProductosMasVendidos();
}else if(isset($_POST['accion']) && $_POST['accion'] == 2){ //ejecutar funcion de productos poca cantidad
    $productosPocoStock = new AjaxDashboard();
    $productosPocoStock-> getProductosPocoStock();
}else{
    $datos = new AjaxDashboard();
    $datos -> getDatosDashboard();
}



