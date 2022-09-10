<?php

class DashboardController{
    static public function ctrGetDatosDashboard(){
        $datos = Dashboard::mdlGetDatosDashboard();
        return $datos;
    }
    static public function crtProductosMasVendidos(){
        $productosMasVendidos = Dashboard::mdlProductosMasVendidos();
        return $productosMasVendidos;
    }
}