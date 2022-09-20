
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

    <!-- Modal para registrar nuevo producto -->
    <div class="modal fade" id="mdlGestionarProducto" role="dialog">
      <div class="modal-dialog modal-md">
        <!-- Contenido Modal -->
        <div class="modal-content">
          <!-- Cabecera Modal -->
          <div class="modal-header bg-gray py-1 align-items-center ">
            <h5 class="modal-title" >Agregar Producto</h5>
            <button type="button" class="btn btn-outline-primary text-white border-0 fs-5" data-bs-dismiss="modal" id="btnCerrarModal">
              <i class="far fa-times-circle"></i>
            </button>
          </div>
          <!-- Cuerpo Modal -->
          <div class="modal-body">

            <!-- fila Modal -->
            <div class="row">

              <!-- Columna Codigo de Barras -->
              <div class="col-lg-6">
                <div class="form-group mb-2">
                <label class="" for="iptCodigoReg"><i class="fas fa-barcode fs-6"></i>
                <span class="small">Codigo de Producto</span><span class="text-danger">*</span>
                 </label> 
                 <input type="text" class="form-control form-control-sm" id="iptCodigoReg"
                 name="iptCodigoReg" placeholder="codigo de Producto" required>
                 <span id="validate_codigo" class="text-danger small fst-italic"
                 style="display:none">Debe ingresar el Codigo de Barras</span>
                </div>
              </div>

              <!-- Columna Categoria de Producto -->
              <div class="col-lg-6">
                <div class="form-group mb-2">
                <label class="" for="selCategoriaReg"><i class="fas fa-dumpster fs-6"></i>
                <span class="small">Categoria</span><span class="text-danger">*</span>
                 </label> 
                  <select class="form-select form-select-sm" arial-label=".form-select-sm example" 
                  id="selCategoriaReg">
                  </select>
                 <span id="validate_categoria" class="text-danger small fst-italic"
                 style="display:none">Debe Elegir una categoria</span>
                </div>
              </div>

              <!-- Columna Descripcion de Producto -->
              <div class="col-12">
                <div class="form-group mb-2">
                <label class="" for="iptDescripcionReg"><i class="fas fa-file-signature fs-6"></i>
                <span class="small">Descripcion</span><span class="text-danger">*</span>
                 </label> 
                  <input type="text" class="form-control form-control-sm"  
                  id="iptDescripcionReg" placeholder="Descripcion">
                 <span id="validate_descripcion" class="text-danger small fst-italic"
                 style="display:none">Debe Ingresar una descripcion del Producto</span>
                </div>
              </div>

               <!-- Columna de Costo de Producto -->
               <div class="col-lg-4">
                <div class="form-group mb-2">
                <label class="" for="iptPrecioCompraReg"><i class="fas fa-dollar-sign fs-6"></i>
                <span class="small">Costo</span><span class="text-danger">*</span>
                 </label> 
                  <input type="number" min="0" class="form-control form-control-sm"  
                  id="iptPrecioCompraReg" placeholder="Costo de Producto">
                 <span id="validate_precio_compra" class="text-danger small fst-italic"
                 style="display:none">Debe Ingresar el costo del Producto</span>
                </div>
              </div>
               <!-- Columna de Precio de Producto -->
               <div class="col-lg-4">
                <div class="form-group mb-2">
                <label class="" for="iptPrecioVentaReg"><i class="fas fa-dollar-sign fs-6"></i>
                <span class="small">Precio</span><span class="text-danger">*</span>
                 </label> 
                  <input type="number" min="0" class="form-control form-control-sm"  
                  id="iptPrecioVentaReg" placeholder="Precio de Producto">
                 <span id="validate_precio_venta" class="text-danger small fst-italic"
                 style="display:none">Debe Ingresar el Precio del Producto</span>
                </div>
              </div>
               <!-- Columna de Stock de Producto -->
               <div class="col-lg-6">
                <div class="form-group mb-2">
                <label class="" for="iptStockReg"><i class="fas fa-dollar-sign fs-6"></i>
                <span class="small">Stock</span><span class="text-danger">*</span>
                 </label> 
                  <input type="number" min="0" class="form-control form-control-sm"  
                  id="iptStockReg" placeholder="Stock">
                 <span id="validate_Stock" class="text-danger small fst-italic"
                 style="display:none">Debe Ingresar el Stock del Producto</span>
                </div>
              </div>
               <!-- Columna de Stock Minimo de Producto -->
               <div class="col-lg-6">
                <div class="form-group mb-2">
                <label class="" for="iptMinimoStockReg"><i class="fas fa-dollar-sign fs-6"></i>
                <span class="small">Stock Minimo</span><span class="text-danger">*</span>
                 </label> 
                  <input type="number" min="0" class="form-control form-control-sm"  
                  id="iptMinimoStockReg" placeholder="Stock Minimo">
                 <span id="validate_min_Stock" class="text-danger small fst-italic"
                 style="display:none">Debe Ingresar el Stock Minimo del Producto</span>
                </div>
              </div>
              <!-- Columna de Stock Minimo de Producto -->
              <button type="button" class="btn btn-danger mt-3 mx-2" style="width: 170px;"
              data-bs-dismiss="modal" id="btnCancelarRegistro">Cancelar</button>

              <button type="button" style="width:170px;" class="btn btn-primary mt-3 mx-2"
              id="btnGuardarProducto" onClick="formSubmitClick()">Guardar Producto</button>

            </div>
          </div>
        </div>
      </div>
    </div>



    <Script>
      $(document).ready(function(){
        var table;
        document.title = 'Genesis | Inventario de Productos';
        $.ajax({
          url: "ajax/product.ajax.php",
          type: "POST",
          data: {'accion' : 1},
          dataType: "json",
          success: function (respuesta) {
            console.log("respuesta",respuesta);
          }
        });

        table = $("#tbl_productos").DataTable({
          dom:'Bfrtip',
          buttons:[
            {
              text: 'Agregar Producto',
              className: 'addNewRecord',
              action: function(e,dt,node,config){
                    //aqui se llama el modal para agragar producto
                    $("#mdlGestionarProducto").modal('show');
              }
            },
            'excel', 'print', 'pageLength'
          ],
          pageLength:[5,10,25,50,100],
          pageLength:10,

          ajax:{
            url: "ajax/product.ajax.php",
            dataSrc: '',
            type: "POST",
            data: {'accion' : 1},
          },
          columnDefs:[
            {
            targets: 0,
            orderable:false,
            className: 'control'
            },
            {
              targets: 1,
              visible:false
            },
            {
              targets: 8,
              orderable:false,
              render: function(datqa, type, full, meta){
                return "<center>" + 
                "<span class= 'btnEditarProducto text-success px-1' style= 'cursor:pointer;'>" +
                "<i class = 'fas fa-pencil-alt fs-5'></i>"+
                "<span class= 'btnEliminarProducto text-danger px-3' style= 'cursor:pointer;'>" +
                "<i class = 'fas fa-trash fs-5'></i>"+
                "</center>"
              }
            }
        
        ],
          language:{
            url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

          }
        });

        $("#btnCancelarRegistro, #btnCerrarModal").on('click',function(){
          $("#iptCodigoReg").val("");
          $("#selCategoriaReg").val(0);
          $("#iptDescripcionReg").val("");
          $("#iptPrecioCompraReg").val("");
          $("#iptPrecioVentaReg").val("");
          $("#iptStockReg").val("");
          $("#iptMinimoStockReg").val("");
        })




      })
    </Script>