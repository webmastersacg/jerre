<?php
error_reporting(E_PARSE | E_NOTICE | E_ERROR);#Ocultar errores no fatales

if(isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {

    $arch = $_FILES['archivo']['tmp_name'];
    $nomArch = $_FILES['archivo']['name'];
    
        $tipArch = $_FILES['archivo']['type'];
        $tamArch = $_FILES['archivo']['size'];
    
    if($tipArch != "text/plain" && $tamArch < 2000000){ //validar tipo y tamaño del archivo
        header("Location: index.php?error=invalido");
    }else{
        //Conectar a la Base de datos
        $host = "localhost";
        $host2 = "localhost:33065";
        $user = "root";
        $pass = "";
        $bd = "bd_jerre";
        
        
       $conex = new mysqli($host,$user,$pass,$bd);
        
        if($conex->connect_errno){
            $conex = new mysqli($host2,$user,$pass,$bd);
        }
        
        //Obtener Id de Carga
        $id = "SELECT id_carga FROM usuarios
            ORDER BY id_carga DESC LIMIT 1";
        
        $id = $conex->query($id);
        $res = mysqli_fetch_row($id);
        
        $idcarga = $res[0];
        $idcarga = $idcarga+1;
        
        
        $datos = file($arch);
        
        foreach ($datos as $dato_num => $dato){
        
            $datos = explode(",",$dato);
            
        
        $email = trim($datos[0]);
        $nombre = trim($datos[1]);
        $apellido = trim($datos[2]);
        $codigo = trim($datos[3]);
        $revisor = trim($datos[4]);
            
            if($codigo < 0 || $codigo > 3 || $codigo == "" || $revisor == ""){
                header("Location: index.php?error=codigo");
            }else{
               //Agregar registros
                
                $cons = "INSERT INTO usuarios(id_carga,email,nombre,apellido,codigo,id_revisor)
                VALUES ($idcarga,'$email','$nombre','$apellido','$codigo','$revisor')";
                
                $conex->query($cons);
            }
        }
        
        
        
    $users_act = "SELECT id_carga,email,usuarios.nombre as nombre,usuarios.apellido as apellido ,
    codigo,id_revisor, revisores.nombre as rnombre, revisores.apellido as rapellido
    FROM usuarios
    INNER JOIN revisores
    ON id = id_revisor
       WHERE codigo = 1 AND id_carga = $idcarga";
        
    $users_inact = "SELECT id_carga,email,usuarios.nombre as nombre,usuarios.apellido as apellido ,
    codigo,id_revisor, revisores.nombre as rnombre, revisores.apellido as rapellido
    FROM usuarios
    INNER JOIN revisores
    ON id = id_revisor
       WHERE codigo = 2 AND id_carga = $idcarga";
        
    $users_esp = "SELECT id_carga,email,usuarios.nombre as nombre,usuarios.apellido as apellido ,
    codigo,id_revisor, revisores.nombre as rnombre, revisores.apellido as rapellido
    FROM usuarios
    INNER JOIN revisores
    ON id = id_revisor
       WHERE codigo = 3 AND id_carga = $idcarga";
    }
        
}else{
        header("Location: index.php?error=invalido");
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Resultados de Carga- GEMA SAS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/4.4.1/sandstone/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <header class="p-2 bg-secondary mb-3">
        <div class="col text-primary">
            <h2 class="text-light">GEMA SAS</h2>
        </div>
    </header>
    <ol class="breadcrumb">
        <li class="breadcrumb-item text-capitalize text-primary"><a href="index.php"><span class="text-primary" style="font-size: 15px;"><strong>&lt;&lt;Volver</strong></span></a></li>
    </ol>
    <!-- Start: 2 Rows 1+3 Columns -->
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Area de Resultados</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h5>Usuarios activos</h5>


                    <div class="table-responsive table-bordered" id="tbl-activos">
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr class="table-success text-center">
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Revisor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    $uact = $conex->query($users_act);
                    
                    while($act = $uact->fetch_object()){
                    ?>
                                <tr>
                                    <td><?php echo $act->email; ?></td>
                                    <td><?php echo $act->nombre; ?></td>
                                    <td><?php echo $act->apellido; ?></td>
                                    <td><?php echo $act->rnombre." ".$act->rapellido; ?></td>
                                </tr>
                    <?php
                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Usuarios inactivos</h5>
                    <div class="table-responsive table-bordered" id="tbl-inactivos">
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr class="table-secondary text-center">
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Revisor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                    $uinact = $conex->query($users_inact);
                    
                    while($inact = $uinact->fetch_object()){
                    ?>
                                <tr>
                                    <td><?php echo $inact->email; ?></td>
                                    <td><?php echo $inact->nombre; ?></td>
                                    <td><?php echo $inact->apellido; ?></td>
                                    <td><?php echo $inact->rnombre." ".$inact->rapellido; ?></td>
                                </tr>
                    <?php
                    }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Usuarios en espera</h5>
                    <div class="table-responsive table-bordered" id="tbl-espera">
                        <table class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr class="table-warning text-center">
                                    <th>Email</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Revisor</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                    $uesp = $conex->query($users_esp);
                    
                    while($esp = $uesp->fetch_object()){
                    ?>
                                <tr>
                                    <td><?php echo $esp->email; ?></td>
                                    <td><?php echo $esp->nombre; ?></td>
                                    <td><?php echo $esp->apellido; ?></td>
                                    <td><?php echo $esp->rnombre." ".$esp->rapellido; ?></td>
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
    <!-- End: 2 Rows 1+3 Columns -->
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
