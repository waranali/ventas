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
                        <h3><?php echo $nombrevista; ?></h3>
                        <div class="">
                            <button class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">Añadir</button>
                        </div>
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
                                        <th>Nombre</th>
                                        <th>codigo</th>
                                        <th>Precio de venta</th>
                                        <th>Precio de compra</th>
                                        <th>Stock</th>
                                        <th>Minimo requerido</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->model->mostrar()as $key=>$producto):?>
                                        <tr>
                                            <td><?php echo $key+1?></td>
                                            <td><?php echo $producto->nombre?></td>
                                            <td><?php echo $producto->codigo?></td>
                                            <td><?php echo $producto->p_venta?></td>
                                            <td><?php echo $producto->p_compra?></td>
                                            <td><?php echo $producto->stock?></td>
                                            <td><?php echo $producto->alerta?></td>
                                            <td class="text-center"> <button class="btn btn-primary btn-sm">view</button></td>
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registar <?php  echo $nombrevista ?></h5>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?controlador=producto&action=guardar" method="post">
                            <input type="text" id="id" name="id" hidden>
                            <div class="form-group mb-3">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Codigo</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Precio de venta</label>
                                <input type="text" class="form-control" id="p_venta" name="p_venta" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Precio de compra</label>
                                <input type="text" class="form-control" id="p_compra" name="p_compra" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" id="stock" name="stock" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Minimo requerido</label>
                                <input type="text" class="form-control" id="alerta" name="alerta" placeholder="Nombre de la categoria">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                    <!-- <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <!-- Inicializamos los script-->
    <?php include 'content/script.php' ?>
    <!-- finalizamos los script -->

</body>

</html>