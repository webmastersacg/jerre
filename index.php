<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicio || Carga de Archivos - GEMA SAS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.4.1/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    
    <script type="text/javascript">
        
            
        function enviar(){
            form = $("#form-carga");
            cfile = form.find("#id-archivo");
            file = cfile.val();
            mens = form.find("#alerta");
            benviar = form.find("#btn-enviar");
            
            
            if(file.length < 4){
                cfile.addClass("is-invalid");
                mens.html("<span ><strong>Seleccione un archivo .txt</strong></span>");
            }else{
                cfile.removeClass("is-invalid");
                mens.html("<span >El archivo <strong>.txt</strong>&nbsp;no tiene el formato correcto. Por favor intentelo de nuevo</span>");
            }
        }
        
    
    </script>
</head>

<body>
    <header class="p-2 bg-secondary mb-3">
        <div class="col text-primary">
            <h2 class="text-light">GEMA SAS</h2>
        </div>
    </header>
    <!-- Start: 2 Rows 1+2 Columns -->
    <div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <h4>Análisis de datos</h4>
                    <p>Bienvenido a la sección de análisis de datos de archivos planos. A continuación podrá cargar su archivo <strong>.txt </strong>en el siguiente formulario para validar su información.</p>
                </div>
                <div class="col-md-6">
                    <form id="form-carga" class="form-inline border rounded shadow p-3" enctype="multipart/form-data"  method="post" action="resultados.php">
                        <fieldset>
                            <legend>Formulario de carga de información</legend>
                            <div class="form-group d-flex d-md-flex justify-content-center justify-content-md-center">
                                <div></div>
                                <div class="col-3 mb-2"><img src="assets/img/file-txt.png"></div>
                                <div class="col-9 custom-file"><input class="bg-secondary custom-file-input" type="file" id="id-archivo" name="archivo" required=""><label class="text-dark d-lg-flex justify-content-start custom-file-label <?php if($_GET['error'] == 'invalido' || $_GET['error'] == 'codigo'){ echo "is-invalid";} ?>" for="id-archivo">...examinar</label>
                                    <div id="alerta" class="invalid-feedback w-auto "><span class="<?php if($_GET['error'] == 'invalido'){ echo "d-none";} ?>">El archivo <strong>.txt</strong>&nbsp;no tiene el formato correcto. Por favor intentelo de nuevo</span>
                                    <span class="<?php if($_GET['error'] == 'invalido'){ echo "none";}else{ echo "d-none"; } ?>">El <strong>archivo cargado</strong>&nbsp;no es un archivo <strong>.txt</strong>. Inténtelo de nuevo.</span></div>
                            </div>
                </div>
                <button id="btn-enviar" class="btn btn-dark text-capitalize float-right mt-5" type="submit" onclick="enviar();">Enviar formulario</button></div>
                </fieldset>
                </form>
        </div>
    </div>
    </div>
    <!-- End: 2 Rows 1+2 Columns -->
    <!-- Start: Footer Basic -->
    <div class="footer-basic">
        <footer>
            <!-- Start: Social Icons -->
            <div class="social"><a href="https://www.linkedin.com/in/sergio-antonio-carabalí-gutiérrez-a5b0991b1/" target="_blank"><i class="icon ion-social-linkedin"></i></a><a href="https://www.facebook.com/saluzsoftware" target="_blank"><i class="icon ion-social-facebook"></i></a></div>
            <!-- End: Social Icons -->
            <!-- Start: Copyright -->
            <p class="text-primary copyright">Sergio A. Carabalí © 2020</p>
            <!-- End: Copyright -->
        </footer>
    </div>
    <!-- End: Footer Basic -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>