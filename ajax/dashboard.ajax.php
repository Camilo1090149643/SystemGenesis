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
}

    

if(isset($_POST['accion']) && $_POST['accion'] == 1){ //ejecutar funcion de productos mas vendidos
    $productosMasVendidos = new AjaxDashboard();
    $productosMasVendidos-> getProductosMasVendidos();
}else{
    $datos = new AjaxDashboard();
    $datos -> getDatosDashboard();
}



