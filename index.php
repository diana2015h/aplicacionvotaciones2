<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/stilopricipal.css">
    <title>Sistema de Votacioness  2022</title>
</head>
<body>
<?php
      
      require_once('database/conection.php');//incrustar o vincular un archico php 
        session_start();//inicio secion
        if(isset($_POST["tialumno"])){
            $estudiante=$_POST["tialumno"];
            
        }

        if(isset($_POST["boton"])){
            $boton=$_POST["boton"];
            switch($boton){
                case "Ingresar":
                    if(empty($estudiante)){
                        $vacio="si";//declaro y asigno si
                        echo ("hola mundo3");
                        break;
                    }
                
                $sql = "SELECT * FROM `alumnos` WHERE `cedula_alumno` = $estudiante";
                $resultado =mysqli_query($conn,$sql);
                $datos = mysqli_fetch_array($resultado); //array de un solo registro
                $cedAlumno =$datos['cedula_alumno'];
                $nomAlumno =$datos['nombre'];
                $votoAlumno=$datos['voto'];
                $carreraAlumno=$datos['carrera'];
                //echo $datos['nombre']."  ".$datos['id_alumnos'];
                if($estudiante == $cedAlumno){
                    $_SESSION["nombreest"]=$nomAlumno;
                    $_SESSION["curso"]=$carreraAlumno;
                    $_SESSION["cedulaAlumno"]=$cedAlumno;

                    if($votoAlumno==0){
                        echo "<script>  window.location='pages/menuestudiante.php'</script>";
                    }else{
                        $acceso="yavoto";
                    }
        
                }else{
                    $acceso="denegado";
                }

                break;
                    
               // case "cancelar";
               // break;
               // $carreraAlumno=$datos['carrera'];
               //echo $nomAlumno;

            }
        }             
?>
<header>
        <div class="containerPricipal" >
            <img class="imagen" src="img/banderaentera.png">
            <div class="titulopagina">
                <h1>SISTEMA DE VOTACIONES</h1>
                <h3>2021</h3>
            </div>
            <img class="logocol" src="img/escudo.png" alt="NUSLA">
        </div> 

</header>
<section>
    <div class="containerF">
        <form action="index.php" role="form" method="post">
            <div class="form-group">
                <label  class="labelF" for="tialumno">Escribe tu número de tarjeta de identidad:</label>
                <input type="number" name="tialumno" class="form-control" id="alumno"
                placeholder="Numero de Documento">
            </div>

            <input type ="submit" class="btn-primary" name="boton" Value="Ingresar">
            <input type ="submit" class="btn-danger" name="boton" Value="Cancelar">
    
        </form>
        <br>
        <div class="denegado">
                <?php
    
                if ($acceso=="denegado") {
                    echo "<h5 class='alerta'> El numero : ".$estudinate. "no se encuntra en el sistema </h5>";
                }else if ($acceso=="yavoto"){
                    echo "<h5 class='alerta'>Este estudinate ya realizo su Voto !Gracias¡...</h5>";

                }
                
                
                ?>
                
        </div>

</section>    
</body>
<footer> 
    
    <p><strong>Copyright &copy; 2021</strong></p>
    <p><strong>Diseñado por : Diana Marcela Hidalgo & Sonia Carolina Erazo</p>
</footer>
</html>