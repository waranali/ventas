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
                
            </div>
        </div>
        <!--  Finalizamos el contenido -->
       


    </div>

    <!-- Inicializamos los script-->
    <?php include 'content/script.php' ?>
    <!-- finalizamos los script -->

</body>

</html>