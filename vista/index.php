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
                        <h3>Categorias</h3>
                        <div class="">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir</button>
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
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Salary</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center dt-no-sorting">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>$320,800</td>
                                        <td>
                                            <div class="t-dot bg-primary" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="Normal"></div>
                                        </td>
                                        <td class="text-center"> <button class="btn btn-primary btn-sm">view</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Gavin Joyce</td>
                                        <td>Developer</td>
                                        <td>Edinburgh</td>
                                        <td>42</td>
                                        <td>$92,575</td>
                                        <td>
                                            <div class="t-dot bg-danger" data-toggle="tooltip" data-placement="top"
                                                title="" data-original-title="High"></div>
                                        </td>
                                        <td class="text-center"> <button class="btn btn-primary btn-sm">view</button>
                                        </td>
                                    </tr>
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
                        <h5 class="modal-title" id="exampleModalLabel">Registar Categoria</h5>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="sEmail" placeholder="Nombre de la categoria">
                            </div>
                            <div class="form-group mb-4">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control" id="sPassword" placeholder="Nombre de la categoria">
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