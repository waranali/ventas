<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'content/styles.php'; ?>
</head>

<body class="alt-menu sidebar-noneoverflow">
    <div id="load_screen">
        <div class="loader">
            <div class="loader-content">
                <div class="spinner-grow align-self-center"></div>
            </div>
        </div>
    </div>

    <!--  Incluimos el menu  -->
    <div class="header-container fixed-top">
        <?php include 'content/hearder.php' ?>
    </div>

    <!--  Todo EL CONTENIDO  -->
    <div class="main-container sidebar-closed sbar-open" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  Incluimos el navegador  -->
        <div class="sidebar-wrapper sidebar-theme">
            <?php include 'content/nav.php' ?>
        </div>

        <!--  MANEJAMOS EL CONTENIDO   -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <!-- titulo -->
                <div class="page-header">
                    <div class="page-title">
                        <h3>Ventas Pos</h3>
                    </div>
                </div>
                
                <!-- tabla -->
                <div class="row" id="cancel-row">
                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table class="multi-table table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Cliente</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio</th>
                                        <th>Fecha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->model->mostrar()as $key=>$venta):
                                        $client=$cliente->obtenerxId($venta->cliente_id);?>
                                        <tr>
                                            <td><?php echo $key+1?></td>
                                            <td><?php echo $client->nombre." ".$client->apellidos ?></td>
                                            <td><?php echo $producto->obtenerxId($venta->cliente_id)->nombre?></td>
                                            <td><?php echo $venta->cantidad?></td>
                                            <td><?php echo $venta->precio?></td>
                                            <td><?php echo $venta->fecha?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <!-- <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Salary</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot> -->
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--  Finalizamos el contenido -->
        


    </div>

    <!-- Inicializamos los script-->
    <?php include 'content/script.php' ?>
    <!-- finalizamos los script -->

</body>

</html>