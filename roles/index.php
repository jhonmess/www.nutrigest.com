<?php

include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/roles/listado_de_roles.php');


?>


 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Listado de Roles</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
      <div class="row">
        <div class="col-md-8">
        <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Roles registrados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="display: block;">
                
                <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                        <th><center>Nro</center> </th>
                        <th><center>Nombre del Rol</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </thead>
                  <body>
                        <?php 
                        $contador=0;
                        foreach($roles_datos as $roles_dato) {
                          $id_rol=$roles_dato['id_rol']; ?>
                        <tr>
                            <td><?php echo $contador= $contador+1;?></td>
                            <td><?php echo $roles_dato['rol'];?></td>
                            <td>
                              <center>
                              <div class="btn-group">

                              <button onclick="window.location.href='update.php?id=<?= $id_rol; ?>'" class="btn btn-success">
                                <i class="fa fa-pencil-alt"></i> Editar
                              </button>

                              </div>
                              </center>
                            </td>
                        </tr>

                        <?php
                        }
                        
                        ?>
                    </body>

                  <tfoot>
                  <tr>
                        <th><center>Nro</center> </th>
                        <th><center>Nombre del Rol</center></th>
                        <th><center>Acciones</center></th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              </div>
              <!-- /.card-body -->
            </div>
        </div>
      </div>


        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/parte2.php'); ?>


  <script>
  $(function () {
    $("#example1").DataTable({

/* cambio de idiomas de datatable */
"pageLength": 10,
          language: {
              "emptyTable": "No hay información",
              "decimal": "",
              "info": "Mostrando _START_ a _END_ de TOTAL Roles",
              "infoEmpty": "Mostrando 0 to 0 of 0 Roles",
              "infoFiltered": "(Filtrado de _MAX_ total Roles)",
              "infoPostFix": "",
              "thousands": ",",
              "lengthMenu": "Mostrar _MENU_ Roles",
              "loadingRecords": "Cargando...",
              "processing": "Procesando...",
              "search": "Buscador:",
              "zeroRecords": "Sin resultados encontrados",
              "paginate": {
                  "first": "Primero",
                  "last": "Ultimo",
                  "next": "Siguiente",
                  "previous": "Anterior"
              }
             },
      /* fin de idiomas */

      "responsive": true, "lengthChange": true, "autoWidth": false,
      /* Ajuste de botones */
      buttons: [{
                        extend: 'collection',
                        text: 'Reportes',
                        orientation: 'landscape',
                        buttons: [{
                            text: 'Copiar',
                            extend: 'copy'
                        }, {
                            extend: 'pdf',
                        }, {
                            extend: 'csv',
                        }, {
                            extend: 'excel',
                        }, {
                            text: 'Imprimir',
                            extend: 'print'
                        }
                        ]
                    },
                        {
                            extend: 'colvis',
                            text: 'Visor de columnas'
                        }
                    ],
                    /*Fin de ajuste de botones*/
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>
