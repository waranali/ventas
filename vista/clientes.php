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
                                        <th hidden></th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Ci</th>
                                        <th>Nit</th>
                                        <th>Celular</th>
                                        <th>Direccion</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($this->model->mostrar()as $key=>$cliente):?>
                                        <tr>
                                            <td><?php echo $key+1?></td>
                                            <td hidden><?php echo $cliente->id?></td>
                                            <td><?php echo $cliente->nombre?></td>
                                            <td><?php echo $cliente->apellidos?></td>
                                            <td><?php echo $cliente->ci?></td>
                                            <td><?php echo $cliente->nit?></td>
                                            <td><?php echo $cliente->celular?></td>
                                            <td><?php echo $cliente->direccion?></td>
                                            <td class="text-center"> 
                                            <a onclick="javascript:return confirm('ESTAS SEGURO DE ELIMINAR ESTE REGISTRO?');" href="index.php?controlador=cliente&action=quit&id=<?php echo $cliente->id;?>" class="btn btn-primary btn-sm">ELIMIAR</a>
                                                <button class="btn btn-primary btn-sm" onclick="capturar()">Editar</button>
                                                
                                            </td>
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
                        <form action="index.php?controlador=cliente&action=guardar" method="post">
                            <input type="text" id="id" name="id" hidden>
                            <div class="form-group mb-3">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Ci</label>
                                <input type="text" class="form-control" id="ci" name="ci" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Celular</label>
                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nit</label>
                                <input type="text" class="form-control" id="nit" name="nit" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Nombre de la categoria">
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
    <script>
        function capturar() {
            $("table tbody tr").click(function() {
                var id = $(this).find("td:eq(1)").text();
                var nombre = $(this).find("td:eq(2)").text();
                var codigo = $(this).find("td:eq(3)").text();
                var p_venta = $(this).find("td:eq(4)").text();
                var p_compra = $(this).find("td:eq(5)").text();
                var stock = $(this).find("td:eq(6)").text();
                var alerta = $(this).find("td:eq(7)").text();
                console.log(alerta);
                // $('#exampleModalLabel').text('Editar Servicio');
                $("#id").val(id);
                $("#nombre").val(nombre);
                $("#apellidos").val(codigo);
                $("#ci").val(p_venta);
                $("#celular").val(p_compra);
                $("#nit").val(stock);
                $("#direccion").val(alerta);
                $('#exampleModal').modal('show')
            });
        };

        function limpiar() {
            $("#id").val("");
            $("#nombre").val("");
            $("#apellidos").val("");
            $("#ci").val("");
            $("#celular").val("");
            $("#direccion").val("");
            $("#alerta").val("");
        }
  </script>
    <?php include 'content/script.php' ?>
    <!-- finalizamos los script -->

</body>

</html>