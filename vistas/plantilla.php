<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <title>YPIX</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        <!--                    JQUERY                  -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        
        <!--                    DATATABLES                  -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.12.1/b-2.2.3/sl-1.4.0/datatables.min.css"/>
        <link rel="stylesheet" type="text/css" href="Editor-2.0.8/css/editor.dataTables.css">
        
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jqc-1.12.4/dt-1.12.1/b-2.2.3/sl-1.4.0/datatables.min.js"></script>
        <script type="text/javascript" src="Editor-2.0.8/js/dataTables.editor.js"></script>
    
    </head>

    <body>
        <div class="d-flex flex-column" style="height: 100vh;">
            <div class="d-flex justify-content-center bg-success p-2 text-dark bg-opacity-25">
                <H1>YPIX</H1>
            </div>
            <!--Container Main start-->
            <div class="m-auto d-flex flex-column"><!--MARGIN-->
                    <?php 
                        if(isset($_GET["pagina"])){
                            if($_GET["pagina"]=="crud" ||
                                $_GET["pagina"]=="error404"){
                            
                                include "paginas/".$_GET["pagina"].".php";

                            }

                            else{
                                if($_GET["pagina"]!="error"){
                                    echo '<script>

                                            window.location = "index.php?pagina=error404";
                                        
                                    </script>';
                                }
                                include "paginas/error404.php";
                            
                            }
                        }
                        else{
                            include "paginas/crud.php";
                        }
                        
                    ?>
            </div>
            <!--Container Main end-->
            <div class="bg-success bg-opacity-10 p-4 text-center">
                Sitio creado por Francisco Javier Vasquez Jr.
            </div> 
        </div>
    </body>
    <script type="text/javascript" src="js/crud.js"></script>
</html>