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
    static public function crtProductosPocoStock(){
        $productosPocoStock = Dashboard::mdlProductosPocoStock();
        return $productosPocoStock;
    }
}