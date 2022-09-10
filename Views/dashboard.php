   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Panel de Inicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Pagina de Inicio</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        <!-- Creamos una fila -->
        <div class="row" >
          
          <div class="col-lg-2">
              <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h4 id="totalProductos"></h4>
                <p>Productos Registrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a style="cursor:pointer;" href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
             <!-- TARJETA DE TOTAL DE VENTAS MES -->
          <div class="col-lg-2">
              <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h4 id="totalVentas"></h4>
                <p>Total de Ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-cart"></i>
              </div>
              <a style="cursor:pointer;" href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- TARJETA DE TOTAL DE GANANCIAS -->
          <div class="col-lg-2">
              <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h4 id="totalGanancias"></h4>
                <p>Total de Ganacias</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-pie"></i>
              </div>
              <a style="cursor:pointer;" href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

           <!-- TARJETA DE TOTAL DE VENTAS DEL DIA -->
           <div class="col-lg-2">
              <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h4 id="totalVentasDia"></h4>
                <p>Ventas del Dia </p>
              </div>
              <div class="icon">
                <i class="ion ion-cash"></i>
              </div>
              <a style="cursor:pointer;" href="#" class="small-box-footer">Mas informacion<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            
         
        </div>
        
        <!-- Lista de Productos mas vendidos -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Los 10 Productos mas Vendidos</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                  </div> <!-- ./ end card-tools -->
                </div> <!-- ./ end card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="tbl_productos_mas_vendidos">
                    <thead>
                      <tr>
                        <th>Cod. Producto</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                      </tr>
                      <tbody>

                      </tbody>
                    </thead>
                  </table>
                </div>
              </div> <!-- ./ end card-body -->
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Productos con Bajo Inventario</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                  </div> <!-- ./ end card-tools -->
                </div> <!-- ./ end card-header -->
              <div class="card-body">
              <div class="table-responsive">
                  <table class="table" id="tbl_productos_poco_stock">
                    <thead>
                      <tr>
                        <th>Cod. Producto</th>
                        <th>Producto</th>
                        <th>Stock Actual</th>
                        <th>Min Stock registrdo</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div> <!-- ./ end card-body -->
            </div>

          </div>
        </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <script>
      /***********FUNCION PARA TARJETAS************* */
      $(document).ready(function(){
        $.ajax({
          url: "ajax/dashboard.ajax.php",
          method: 'POST',
          dataType: 'json',
          success:function(respuesta){
            console.log("respuesta", respuesta);
            
            $("#totalProductos").html(respuesta[0]['totalProductos']);
            $("#totalVentas").html('Q. ' + respuesta[0]['totalventas']);
            $("#totalGanancias").html(respuesta[0]['totalganancias']);
            $("#totalVentasDia").html('Q. ' + respuesta[0]['ventasdeldia']);
          }
        });
        /********FUNCION PARA LISTADOS de productos mas vendidos **********/
        $.ajax({
        url: "ajax/dashboard.ajax.php",
        type: "POST",
        data: {
          'accion': 1 
        },
        dataType: 'json',
        success:function(respuesta){
          console.log("respuesta",respuesta);
          
          for (let i = 0; i < respuesta.length; i++) {
            filas = '<tr>'+
                      '<td>'+ respuesta[i]['barcode'] +'</td>'+
                      '<td>'+ respuesta[i]['name'] +'</td>'+
                      '<td>'+ respuesta[i]['cantidad'] +'</td>'+
                      '<td> Q. '+ respuesta[i]['total_venta'] +'</td>'+
                 '</tr>' 
            $("#tbl_productos_mas_vendidos tbody").append(filas);
          }
          
        }
      });

      });
      
      

    </script>