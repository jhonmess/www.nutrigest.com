<?php
 $id_venta_get=$_GET['id_venta'];
include('../app/config.php');
include('../layout/sesion.php');

include('../layout/parte1.php');

include('../app/controllers/ventas/cargar_venta.php');
include('../app/controllers/clientes/cargar_cliente.php');

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Detalle de la Venta Nro <?= $nro_venta;?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            

                            <h3 class="card-title"><i class="fas fa-shopping-bag"></i> Venta Nro
                                <input type="text" style="text-align: center"
                                    value="<?php echo $nro_venta; ?>" disabled="">
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            

                            <div class="table responsive">
                                <table class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                        <th style="background-color: #e7e7e7; text-align: center">Nro</th>
                                        <th style="background-color: #e7e7e7; text-align: center">Producto</th>
                                        <th style="background-color: #e7e7e7; text-align: center">Descripcion</th>
                                        <th style="background-color: #e7e7e7; text-align: center">Cantidad</th>
                                        <th style="background-color: #e7e7e7; text-align: center">Precio unitario</th>
                                        <th style="background-color: #e7e7e7; text-align: center">Precio subtotal</th>
                                       

                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador_de_preventa = 0;
                                        $cantidad_total = 0;
                                        $precio_unitario_total = 0;
                                        $precio_total = 0;
                                        

                                        $sql_preventa = "SELECT *, pro.nombre AS nombre_producto, pro.descripcion AS descripcion,
                                                                pro.precio_venta AS precio_venta, pro.stock AS stock, 
                                                                pro.id_producto AS id_prducto
                                        
                                        FROM preventa AS prev 
                                        INNER JOIN almacen AS pro 
                                        ON  prev.id_producto = pro.id_producto
                                        WHERE nro_venta = :nro_venta ORDER BY id_preventa ASC";

                                        $query_preventa = $pdo->prepare($sql_preventa);
                                        $query_preventa->bindParam(':nro_venta', $nro_venta, PDO::PARAM_INT);
                                        $query_preventa->execute();
                                        $preventa_datos = $query_preventa->fetchAll(PDO::FETCH_ASSOC);

                                        foreach ($preventa_datos as $preventa_dato) {
                                            $id_preventa = $preventa_dato['id_preventa'];
                                            $contador_de_preventa = $contador_de_preventa + 1;
                                            $cantidad_total = $cantidad_total + $preventa_dato['cantidad'];
                                            $precio_unitario_total = $precio_unitario_total + $preventa_dato['precio_venta'];

                                            ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador_de_preventa; ?></center>
                                                    <input type="text"  value="<?php echo $preventa_dato['id_producto'];?>" id="id_producto<?php echo $contador_de_preventa;?>" hidden>
                                                </td>
                                                <td id=""><?php echo $preventa_dato['nombre_producto']; ?></td>
                                                <td id=""><?php echo $preventa_dato['descripcion']; ?></td>
                                                <td>
                                                    
                                                    <center><span id="cantidad_preventa<?php echo $contador_de_preventa;?>"><?php echo $preventa_dato['cantidad']; ?></span></center>
                                                    <input type="text" value="<?php echo $preventa_dato['stock'];?>" id="stock_de_inventario<?php echo $contador_de_preventa;?>" hidden>
                                                </td>
                                                <td>
                                                    <center><?php echo $preventa_dato['precio_venta']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <?php
                                                        $cantidad = floatval($preventa_dato['cantidad']);
                                                        $precio_venta = floatval($preventa_dato['precio_venta']);
                                                        echo $sub_total = $cantidad * $precio_venta;
                                                        $precio_total = $precio_total + $sub_total;
                                                        ?>
                                                    </center>
                                                </td>
                                                

                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        <tr>
                                            <th style="background-color: #e7e7e7; text-align: right" colspan="3">Total
                                            </th>
                                            <th style="background-color: #e7e7e7; text-align: center" colspan="">
                                                <center>
                                                    <?php echo $cantidad_total; ?>
                                                </center>
                                            </th>
                                            <th style="background-color: #e7e7e7; text-align: center" colspan="">
                                                <center>
                                                    <?php echo $precio_unitario_total; ?>
                                                </center>
                                            </th>
                                            <th style="background-color: #fff815; text-align: center" colspan="">
                                                <center>
                                                    <?php echo $precio_total;
                                                    ; ?>
                                                </center>
                                            </th>

                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </div>

                </div>

                <div id="respuesta_create"></div>

            </div>
            <!-- /.row -->


            <div class="row">
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente
                                <input type="text" style="text-align: center" value="1" disabled="">
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <?
                        foreach($clientes_datos as $clientes_dato){
                            $nombre_cliente=$clientes_dato['nombre_cliente'];
                            $nit_ci_cliente=$clientes_dato['nit_ci_cliente'];
                            $celular=$clientes_dato['celular'];
                            $email_cliente=$clientes_dato['email_cliente'];
                        }
                        ?>

                        <div class="card-body">
                             <div class="row">
                                <div class="col-md-3">
                                    <div class="form-grop">
                                        <input type="text" id="id_clientes" hidden>
                                        <label for="">Nombre del cliente</label>
                                        <input type="text" value="<?php echo $nombre_cliente;?>" class="form-control" id="nombre_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-grop">
                                        <label for="">Nit/ CI del cliente</label>
                                        <input type="text" value="<?php echo $nit_ci_cliente;?>" class="form-control" id="nit_ci_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-grop">
                                        <label for="">Celular del cliente</label>
                                        <input type="text" value="<?php echo $celular;?>" class="form-control" id="celular_cliente" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-grop">
                                        <label for="">Correo del cliente</label>
                                        <input type="text" value="<?php echo $email_cliente;?>" class="form-control" id="email_cliente" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6">

                                </div>
                             </div>

                        </div>

                    </div>
                    
                </div>

                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar Venta
                                
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="form-grop">
                                <label for="">Monto a cancelar</label>
                                <input type="text" class="form-control" id="total_a_cancelar" style="text-align: center;background-color: #fff819" 
                                value="<?php echo $precio_total;?>" disabled>
                            
                            </div>
                            

                            
                        </div>

                    </div>
                    
                </div>


                <div id="respuesta_create"></div>

            </div>


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
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
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
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- modal para agregar datos de los clientes -->
<div class="modal fade" id="modal-agregar_cliente">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #b6900c;color: white">
                                            <h4 class="modal-title">Nuevo cliente </h4>
                                            <div style="width: 10px" ></div>
                                            
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="../app/controllers/clientes/guardar_clientes.php" method="POST">
                                                <div class="form-group">
                                                    <label for="">Nombre del cliente</label>
                                                    <input type="text" class="form-control" name="nombre_cliente">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Nit/CI del Cliente</label>
                                                    <input type="text" class="form-control" name="nit_ci_cliente">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Celular del cliente</label>
                                                    <input type="text" class="form-control" name="celular">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Correo del cliente</label>
                                                    <input type="email" class="form-control" name="email_cliente">
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-success btn-block">Guardar</button>
                                                </div>
                                                <br>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->