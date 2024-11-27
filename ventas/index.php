<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/ventas/listado_de_ventas.php');

?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Ventas Realizadas</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ventas Registradas</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>Nro</center>
                                            </th>
                                            <th>
                                                <center>Nro de venta</center>
                                            </th>
                                            <th>
                                                <center>Productos</center>
                                            </th>
                                            <th>
                                                <center>Cliente</center>
                                            </th>
                                            <th>
                                                <center>Monto Total Pagado</center>
                                            </th>
                                            <th>
                                                <center>Acciones</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($ventas_datos as $ventas_dato) {
                                            $id_venta = $ventas_dato['id_venta'];
                                            $id_clientes = $ventas_dato['id_clientes'];
                                            $contador++;
                                            ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador; ?></center>
                                                </td>
                                                <td>
                                                    <center><?php echo $ventas_dato['nro_venta']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#Modal_productos<?php echo $id_venta; ?>">
                                                            <i class="fa fa-shopping-basket"></i> Productos
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="Modal_productos<?php echo $id_venta; ?>"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="backgroud-color: #08c2eC">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Productos de la Venta
                                                                            Nro.<?php echo $ventas_dato['nro_venta']; ?>
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table responsive">
                                                                            <table
                                                                                class="table table-bordered table-sm table-hover table-striped">
                                                                                <thead>
                                                                                    <th
                                                                                        style="background-color: #e7e7e7; text-align: center">
                                                                                        Nro</th>
                                                                                    <th
                                                                                        style="background-color: #e7e7e7; text-align: center">
                                                                                        Producto</th>
                                                                                    <th
                                                                                        style="background-color: #e7e7e7; text-align: center">
                                                                                        Descripcion</th>
                                                                                    <th
                                                                                        style="background-color: #e7e7e7; text-align: center">
                                                                                        Cantidad</th>
                                                                                    <th
                                                                                        style="background-color: #e7e7e7; text-align: center">
                                                                                        Precio unitario</th>
                                                                                    <th
                                                                                        style="background-color: #e7e7e7; text-align: center">
                                                                                        Precio subtotal</th>


                                                                                </thead>
                                                                                <tbody>
                                                                                    <?php
                                                                                    $contador_de_preventa = 0;
                                                                                    $cantidad_total = 0;
                                                                                    $precio_unitario_total = 0;
                                                                                    $precio_total = 0;
                                                                                    $nro_venta = $ventas_dato['nro_venta'];

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
                                                                                                <center>
                                                                                                    <?php echo $contador_de_preventa; ?>
                                                                                                </center>
                                                                                                <input type="text"
                                                                                                    value="<?php echo $preventa_dato['id_producto']; ?>"
                                                                                                    id="id_producto<?php echo $contador_de_preventa; ?>"
                                                                                                    hidden>
                                                                                            </td>
                                                                                            <td id="">
                                                                                                <?php echo $preventa_dato['nombre_producto']; ?>
                                                                                            </td>
                                                                                            <td id="">
                                                                                                <?php echo $preventa_dato['descripcion']; ?>
                                                                                            </td>
                                                                                            <td>

                                                                                                <center><span
                                                                                                        id="cantidad_preventa<?php echo $contador_de_preventa; ?>"><?php echo $preventa_dato['cantidad']; ?></span>
                                                                                                </center>
                                                                                                <input type="text"
                                                                                                    value="<?php echo $preventa_dato['stock']; ?>"
                                                                                                    id="stock_de_inventario<?php echo $contador_de_preventa; ?>"
                                                                                                    hidden>
                                                                                            </td>
                                                                                            <td>
                                                                                                <center>
                                                                                                    <?php echo $preventa_dato['precio_venta']; ?>
                                                                                                </center>
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
                                                                                        <th style="background-color: #e7e7e7; text-align: right"
                                                                                            colspan="3">Total
                                                                                        </th>
                                                                                        <th style="background-color: #e7e7e7; text-align: center"
                                                                                            colspan="">
                                                                                            <center>
                                                                                                <?php echo $cantidad_total; ?>
                                                                                            </center>
                                                                                        </th>
                                                                                        <th style="background-color: #e7e7e7; text-align: center"
                                                                                            colspan="">
                                                                                            <center>
                                                                                                <?php echo $precio_unitario_total; ?>
                                                                                            </center>
                                                                                        </th>
                                                                                        <th style="background-color: #fff815; text-align: center"
                                                                                            colspan="">
                                                                                            <center>
                                                                                                <?php echo $precio_total;
                                                                                                ; ?>
                                                                                            </center>
                                                                                        </th>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                        <?php
                                                                        ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                                            data-bs-target="#Modal_clientes<?php echo $id_venta; ?>">
                                                            <i class="fa fa-shopping-basket"></i>
                                                            <?php echo $ventas_dato['nombre_cliente']; ?>
                                                        </button>

                                                        <!-- modal para agregar datos de los clientes -->
                                                        <div class="modal fade" id="Modal_clientes<?php echo $id_venta; ?>">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"
                                                                        style="background-color: #b6900c;color: white">
                                                                        <h4 class="modal-title">Cliente </h4>
                                                                        <div style="width: 10px"></div>

                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <?php
                                                                    $sql_clientes = "SELECT * FROM clientes WHERE id_clientes='$id_clientes'"; 

                                                                    $query_clientes = $pdo->prepare($sql_clientes);
                                                                    $query_clientes->execute();
                                                                    $clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC); 
                                                                    foreach($clientes_datos as $clientes_dato){
                                                                        $nombre_cliente=$clientes_dato['nombre_cliente'];
                                                                        $nit_ci_cliente=$clientes_dato['nit_ci_cliente'];
                                                                        $celular=$clientes_dato['celular'];
                                                                        $email_cliente=$clientes_dato['email_cliente'];
                                                                        
                                                                    }
                                                                    ?>
                                                                    <div class="modal-body">
                                                                        
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del cliente</label>
                                                                                <input type="text" class="form-control" value="<?php echo $nombre_cliente;?>"
                                                                                    name="nombre_cliente" disabled>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Nit/CI del Cliente</label>
                                                                                <input type="text" class="form-control" value="<?php echo $nit_ci_cliente;?>"
                                                                                    name="nit_ci_cliente" disabled>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Celular del cliente</label>
                                                                                <input type="text" class="form-control" value="<?php echo $celular;?>"
                                                                                    name="celular" disabled>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Correo del cliente</label>
                                                                                <input type="email" class="form-control" value="<?php echo $email_cliente;?>"
                                                                                    name="email_cliente" disabled>
                                                                            
                                                                        
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </center>
                                                </td>
                                                <td>
                                                    <center><button class="btn btn-primary"
                                                            ><?php echo "Bs " . $ventas_dato['total_pagado']; ?></button>
                                                    </center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <a href="show.php?id_venta=<?php echo $id_venta;?>" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="delete.php?id_venta=<?php echo $id_venta;?>" class="btn btn-danger"><i class="fa fa-trash"></i>Borrar</a>
                                                        <a href="factura.php?id_venta=<?php echo $id_venta;?>" class="btn btn-success"><i class="fa fa-print"></i> Imprimir</a>
                                                    </center>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('../layout/mensajes.php'); ?>
<?php include('../layout/parte2.php'); ?>

<!-- Incluir jQuery y Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script> <!-- Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<!-- Bootstrap JS -->

<!-- Iniciar DataTable -->
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true
        });
    });
</script>