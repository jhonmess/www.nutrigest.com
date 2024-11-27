<?php

include('app/config.php');
include('layout/sesion.php');

include('layout/parte1.php');
include('app/controllers/usuarios/listado_de_usuarios.php');
include('app/controllers/roles/listado_de_roles.php');
include('app/controllers/categorias/listado_de_categorias.php');
include('app/controllers/almacen/listado_de_productos.php');
include('app/controllers/proveedores/listado_de_proveedores.php');
include('app/controllers/compras/listado_de_compras.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1 class="m-0">BIENVENIDO AL SISTEMA - <?php echo $rol_sesion; ?></h1>
        </div><!-- /.col -->

      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      Contenido del sistema
      <br> <br>

      <div class="row">

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <?php
              $contador_de_usuarios = 0;
              foreach ($usuarios_datos as $usuarios_dato) {
                $contador_de_usuarios = $contador_de_usuarios + 1;
              }
              ?>
              <h3><?php echo $contador_de_usuarios; ?></h3>

              <p>Usuarios Registrados</p>
            </div>
            <a href="<?php echo $URL; ?>/usuarios/create.php">
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
              Mas detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $contador_de_roles = 0;
              foreach ($roles_datos as $roles_dato) {
                $contador_de_roles = $contador_de_roles + 1;
              }
              ?>
              <h3><?php echo $contador_de_roles; ?></h3>

              <p>Roles Registrados</p>
            </div>
            <a href="<?php echo $URL; ?>/roles/create.php">
              <div class="icon">
                <i class="fas fa-address-card"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
              Mas detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $contador_de_categorias = 0;
              foreach ($categorias_datos as $categorias_dato) {
                $contador_de_categorias = $contador_de_categorias + 1;
              }
              ?>
              <h3><?php echo $contador_de_categorias; ?></h3>

              <p>Categorias Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/categorias">
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/categorias" class="small-box-footer">
              Mas detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-primary">
            <div class="inner">
              <?php
              $contador_de_productos = 0;
              foreach ($productos_datos as $productos_dato) {
                $contador_de_productos = $contador_de_productos + 1;
              }
              ?>
              <h3><?php echo $contador_de_productos; ?></h3>

              <p>Productos Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/almacen/create.php">
              <div class="icon">
                <i class="fas fa-list"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/almacen" class="small-box-footer">
              Mas detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-dark">
            <div class="inner">
              <?php
              $contador_de_proveedores = 0;
              foreach ($proveedores_datos as $proveedores_dato) {
                $contador_de_proveedores = $contador_de_proveedores + 1;
              }
              ?>
              <h3><?php echo $contador_de_proveedores; ?></h3>

              <p>Proveedores Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/proveedores">
              <div class="icon">
                <i class="fas fa-car"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/proveedores" class="small-box-footer">
              Mas detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>


        <div class="col-lg-3 col-6">
          <!-- small card -->
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $contador_de_compras = 0;
              foreach ($compras_datos as $compras_dato) {
                $contador_de_compras = $contador_de_compras + 1;
              }
              ?>
              <h3><?php echo $contador_de_compras; ?></h3>

              <p>Compras Registradas</p>
            </div>
            <a href="<?php echo $URL; ?>/compras/create.php">
              <div class="icon">
                <i class="fas fa-cart-plus"></i>
              </div>
            </a>
            <a href="<?php echo $URL; ?>/compras" class="small-box-footer">
              Mas detalles <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>





        <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Products</h3>
                <div class="card-tools">
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-download"></i>
                  </a>
                  <a href="#" class="btn btn-tool btn-sm">
                    <i class="fas fa-bars"></i>
                  </a>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Sales</th>
                    <th>More</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Some Product
                    </td>
                    <td>$13 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        12%
                      </small>
                      12,000 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Another Product
                    </td>
                    <td>$29 USD</td>
                    <td>
                      <small class="text-warning mr-1">
                        <i class="fas fa-arrow-down"></i>
                        0.5%
                      </small>
                      123,234 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Amazing Product
                    </td>
                    <td>$1,230 USD</td>
                    <td>
                      <small class="text-danger mr-1">
                        <i class="fas fa-arrow-down"></i>
                        3%
                      </small>
                      198 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">
                      Perfect Item
                      <span class="badge bg-danger">NEW</span>
                    </td>
                    <td>$199 USD</td>
                    <td>
                      <small class="text-success mr-1">
                        <i class="fas fa-arrow-up"></i>
                        63%
                      </small>
                      87 Sold
                    </td>
                    <td>
                      <a href="#" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>



      </div>


      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include('layout/parte2.php'); ?>