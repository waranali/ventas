<?php session_start();?>
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
                <!-- <div class="page-header">
                    <div class="page-title">
                        <h3>Categorias</h3>
                        <div class="">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Añadir</button>
                        </div>
                    </div>
                </div> -->
                <!-- contenido de ventas -->
                <div class="row layout-top-spacing">
                    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-one">
                            <?php foreach($producto->mostrar() as $key=>$pro):
                                if ($pro->stock <= $pro->alerta) { ?>
                                    <div class="alert alert-icon-left alert-light-primary mb-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg  data-dismiss="alert"> ... </svg></button>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-octagon"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                    <strong>Cuidado !</strong> Solo queda <?php echo $pro->stock ?> Unidades de <?php echo $pro->nombre ?> .</strong>
                                </div>
                            <?php   }    
                             endforeach; ?>
                            <div class="widget-heading">
                                <h5 class="">Productos</h5>
                            </div>
                            
                            <div class="widget-content ">
                                <div class="container">
                                    <div class="row text-center">
                                        <?php foreach($producto->mostrar()as $key=>$producto):
                                            if ($producto->stock!=0) { ?>
                                            <div class="col-3" style="border-top-width: 6px;padding-top: 7px;">
                                                <div class="card component-card_1 ">
                                                    <div class="card-body">
                                                        <h5 class="card-title"><?php echo $producto->nombre;?></h5>
                                                        <p class="card-text "><?php echo $producto->p_venta;?> bs</p>
                                                        <?php if (isset($_SESSION['products']) && isset($_SESSION['products'][$producto->id])) {?>
                                                            <?php if ($producto->stock>$_SESSION['products'][$producto->id]) { ?>
                                                                <a href='index.php?controlador=ventas&action=carrito&id=<?php echo $producto->id;?>' class="btn btn-outline-primary btn-rounded mb-2">agregar</a>
                                                            <?php }?>
                                                        <?php }else{?>
                                                            <a href='index.php?controlador=ventas&action=carrito&id=<?php echo $producto->id;?>' class="btn btn-outline-primary btn-rounded mb-2">agregar</a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-two">
                            <div class="widget-heading">
                                <h5 class="">Ventas de Productos</h5>
                            </div>
                            <div class="widget-content">
                                <div class="container">
                                    <div class="row">
                                        <form action="index.php?controlador=ventas&action=guardar" method="post">
                                            <div class="col-12">
                                                <label for="cliente">Cliente</label>
                                                <select class="form-control tagging" id="cliente" name="cliente" require>
                                                    <option value="">Selecionar Cliente</option>
                                                    <?php foreach($cliente->mostrar()as $key=>$cliente):?>
                                                        <option value="<?php echo $cliente->id ?>"><?php echo $cliente->nombre.' '.$cliente->apellidos ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="col-12">
                                                <label for="">Lista productos</label>
                                                <?php $total=0; 
                                                if(isset($_SESSION['products'])){ ?>
                                                    <?php $ids = implode( ', ', array_keys($_SESSION['products']));
                                                    $prod = new Producto();  
                                                    foreach($prod->mostrarIds($ids) as $key=>$producto):
                                                        $cantidad=$_SESSION['products'][$producto->id];
                                                        $total+=$producto->p_venta*$cantidad;
                                                    ?>
                                                        <div class="row" style="padding-top: 7px;">
                                                            <div class="col-3">
                                                                <img src="./imagen/90x90.jpg" alt="">
                                                            </div>
                                                            <div class="col-6">
                                                                <p style="margin-bottom: 0px;"><?php echo $producto->nombre ?></p>
                                                                <p style="margin-bottom: 0px;"><?php echo $producto->p_venta ?> bs</p>
                                                                <input type="text"  value="<?php echo $cantidad  ?>" class="form-control" disabled>
                                                                <?php if ($cantidad>1) { ?>
                                                                    <a href='index.php?controlador=ventas&action=menoscarrito&id=<?php echo $producto->id;?>' class='btn btn-success mb-12'>-</a>
                                                                <?php }else{?>
                                                                    <a href='index.php?controlador=ventas&action=eliminarcarrito&id=<?php echo $producto->id;?>' class='btn btn-success mb-12'>
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                                                    </a>
                                                                <?php } ?>                                                    
                                                                
                                                            </div>   
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php }else{
                                                    echo '<h6 class="text-center">No hay datos</h6>';
                                                } ?>    
                                            <div>
                                                <label for="">Total</label>
                                                <input type="text"  value="<?php echo number_format($total,2)  ?>" class="form-control" > 
                                            </div>
                                            </div>
                                            <div class="col-12 text-center">
                                                <hr>
                                                <button type="submit" class="btn btn-success mb-12"> Vender</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--  Finalizamos el contenido -->



    </div>

    <!-- Inicializamos los script-->
    <?php include 'content/script.php' ?>
    <script>
        $(".tagging").select2({
            tags: true
        });
    </script>
    <?php if(isset($_REQUEST['error'])){?>
    <script>
        swal("Error!", "Verifique los Datos", "error");
    </script>
    <?php }?>
    <!-- finalizamos los script -->

</body>

</html>