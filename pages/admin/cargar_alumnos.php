
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estiloalumnos.css">
    <title>Ingresar Alumnos</title>

</head>
<body>
<div class="containerfluid">
    <!--<div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1>Sistema de votaciones</h1>
        </div>    
    </div>
    -->
    <img class="imagen" src="../../img/banderaentera.png">
            
            <div class="titulopagina">
                <h3>CARGAR ALUMNO</h3>
                <h3> SISTEMA DE VOTACIONES 2021</h3>
            </div>
            <img class="logocol" src="../../img/escudo.png" alt="NUSLA">
    <hr>
</div>

<div class="containerF">
  <form action="cargar_alumnos.php" role="form" method="post">
  <div class="form-group">
    <label class="labelF for="Usuario">Cedula  de Alumno</label>
    <input type="number" name="cedula" class="form-control" id="usuario"
           placeholder="cedula">
    <label class="labelF for="Usuario">Nombre de Alumno </label>
    <input type="text" name="nombre" class="form-control" id="usuario"
           placeholder="Nombre">
    <label class="labelF"  for="Usuario">Curso   del Alumno</label>
    <input type="text" name="curso" class="form-control" id="usuario"
           placeholder="curso">
  </div>
   <input type ="submit" class="btn btn-primary" name="boton" Value="ingresar">
   <input type ="submit" class="btn btn-danger" name="boton" Value="cancelar">

  </form>
</div>
<br>
</body>
<footer> 
    
    <p><strong>Copyright &copy; 2021</strong></p>
    <p><strong>Diseñado por : Diana Marcela Hidalgo & Sonia Carolina Erazo</p>
</footer>
</html>
<?php
 require_once('../../database/conection.php');//incrustar o vincular un archico php 
 session_start();//inicio secion
if(isset($_POST["boton"])){
$boton=$_POST["boton"];
  switch ($boton) {
        case 'ingresar':
          echo "hola si acceder";
          if (isset($_POST["nombre"], $_POST["cedula"], $_POST["curso"]) and $_POST["nombre"] !="" and $_POST["cedula"]!="" and $_POST["curso"]!="" ){
            echo "varibles no estan vacias";
            $nombre = $_POST["nombre"];
            $cedula = $_POST["cedula"];
            $curso = $_POST["curso"];
            echo $nombre;
            echo $cedula;
            $sql = "INSERT INTO `alumnos`(`cedula_alumno`, `nombre`, `carrera`)  VALUES ('$cedula','$nombre','$curso')";
            mysqli_query($conn,$sql);
            echo "<script>alert('Datos Ingresados Corectamente ');window.location='../admin/cargar_alumnos.php';</script>";  

          }else{
            echo "varibles  vacias";
            echo "<script>alert('Porfavor ingrese datos ');window.location='../admin/cargar_alumnos.php';</script>";  

          }
            
        break;
        case 'cancelar':
          echo "hola si cancerlar";
          echo "<script>window.location='../admin/menuadmin.php';</script>";  
        break;

    }


  }

?>

 