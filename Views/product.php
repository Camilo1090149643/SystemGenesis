   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listado de Productos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Listado de Productos</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Row para criterios de busquedas -->
       <div class="row">
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Criterios de Busqueda</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" id="btnlimpiarBusqueda">
                      <i class="fas fa-times"></i>
                  </button>
                </div> <!-- ./ end card-tools -->
              </div> <!-- ./ end card-header -->
            <div class="card-body">
            </div> <!-- ./ end card-body -->
          </div>
        </div>
       </div>
       <div class="row">
        <div class="col-md-12">
          <table id="tbl_productos" class="table table-striped w100 shadow">
            <thead>
              <tr>
                <th></th>
                <th>id</th>
                <th>codigo</th>
                <th>nombre</th>
                <th>categoria</th>
                <th>Precio de Compra</th>
                <th>Precio de Venta</th>
                <th>Stock</th>
                <th class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <Script>
      $(document).ready(function(){
        var table;

        table = $("#tbl_productos").DataTable({
          language:{
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

          }
        });
      })
    </Script>