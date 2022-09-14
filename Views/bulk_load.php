   <!-- Content Header (Page header) -->
   <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Carga masiva productos </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a>Inicio</li>
              <li class="breadcrumb-item active">Carga masiva productos </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
       <div class= "row">
        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Seleccionar Archivo de Carga masiva (Excel)</h3>
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
            <form method="POST" enctype="multipart/form-data" id="form_carga_productos">
            <div class="row">
                <div class="col-md-10">
                  <input type="file" name="fileProductos" id="fileProductos" class="form-control" accept=".xls, .xlsx">
                </div>
                <div class="col-md-2">
                  <input type="submit" value="Cargar Productos" class="btn btn-primary" id="btnCargar">
                </div>
              </div>
            </form>  
            
            </div> <!-- ./ end card-body -->
          </div>

        </div>
       </div>
       <div class="row mx-0">
        <div class="col-md-12 mx-0 text-center">
          <img src="views/assets/imagenes/loading.gif" id="img_cargar" style="display:none;">
        </div>
       </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <script>
      $(document).ready(function(){
        $("#form_carga_productos").on('submit',function(e){
          e.preventDefault();

          if($("#fileProductos").get(0).files.length == 0){
            Swal.fire({
              position:'center',
              icon:'warning',
              title: 'debe seleccionar un archivo (Excel).',
              showConfirmButton:false,
              timer: 2500,

            })
          }else{
            var extensiones =[".xls",".xlsx"];
            var input_file_productos= $("#fileProductos");
            var exp_reg = new RegExp("([a-zA-Z0-9\s_\\-.\:])+("+ extensiones.join('|') + ")$");
            
            if(!exp_reg.test(input_file_productos.val().toLowerCase())){
              Swal.fire({
              position:'center',
              icon:'warning',
              title: 'Debe seleccionar un archivo Extension .xls o .xlsx',
              showConfirmButton:false,
              timer: 2500,

            })
            return false;
            }
            var datos = new FormData($(form_carga_productos)[0]);
            $("#btnCargar").prop("disabled",true);
            $("#img_cargar").attr("style", "display:block");
            $("#img_cargar").attr("style", "height:200px");
            $("#img_cargar").attr("style", "width:200px");

            $.ajax({
              url: "ajax/product.ajax.php",
              type: "POST",
              data: datos,
              cache: false,
              contentType: false,
              processData: false,
              success: function(respuesta){
                console.log("respuesta",respuesta);

                if(respuesta>0){
                  Swal.fire({
                    position:'center',
                    icon:'success',
                    title: 'Se registraron '+ respuesta + 'categorias Correctamente',
                    showConfirmButton:false,
                    timer: 2500,

                })
                $("#btnCArgar").prop("disabled",false);
                $("#img_carga").attr("style","display:none");
                }
              }
            });
          }
        })
      })
    </script>