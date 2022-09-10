 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="views/assets/dist/img/icono-blanco.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ferreteria Genesis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     

 

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        
        </li>
          <li class="nav-item">
            <a style="cursor: pointer;" class="nav-link active" onclick="cargarvista('Views/dashboard.php','content-wrapper')">
            <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('Views/client.php','content-wrapper')">
          <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/category.php','content-wrapper')">
          <i class="nav-icon fas fa-sort-alpha-up"></i>
              <p>
                Categorias
              </p>
            </a>
          </li>
     
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" >
          <i class="nav-icon fas fa-luggage-cart"></i>
              <p>
                Productos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/product.php','content-wrapper')">
              <i class="nav-icon fas fa-list-ul"></i>
                  <p>Lista de Productos</p>
                </a>
              </li>
              <li class="nav-item">
              <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/bulk_load.php','content-wrapper')">
              <i class="nav-icon fas fa-upload"></i>
                  <p>Carga Masiva</p>
                </a>
              </li>
              <li class="nav-item">
              <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/report.php','content-wrapper')">
              <i class="nav-icon fas fa-clipboard-list"></i>
                  <p>Reportes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/sale.php','content-wrapper')">
          <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Ventas
              </p>
            </a>
          </li>
         
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/purchase.php','content-wrapper')">
          <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Compras
              </p>
            </a>
          </li>
          <li class="nav-item">
          <a style="cursor: pointer;" class="nav-link" onclick="cargarvista('views/setting.php','content-wrapper')">
          <i class="nav-icon fas fa-cogs"></i>
              <p>
                Configuracion
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    $(".nav-link").on('click',function(){
      $(".nav-link").removeClass('active')
      $(this).addClass('active')
    })
  </script>