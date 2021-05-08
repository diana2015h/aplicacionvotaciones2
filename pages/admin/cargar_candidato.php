
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estiloalumnos.css">
    <title>Ingresar Candidatos</title>

</head>
<body>
<div class="containerfluid">
  
    <img class="imagen" src="../../img/banderaentera.png">
            
            <div class="titulopagina">
                <h3>CARGAR CANDIDATOS</h3>
                <h3> SISTEMA DE VOTACIONES 2021</h3>
            </div>
            <img class="logocol" src="../../img/escudo.png" alt="NUSLA">
    <hr>
</div>
  <div class="containerF">
    <form action="cargar_candidato.php" role="form" method="post">
      <div class="form-group">
        <label  class="labelF" for="Usuario">Cedula  del Candidato</label>
        <input type="number" name="cedula" class="form-control" id="usuario"
              placeholder="cedula">
        <label  class="labelF" for="Usuario">Nombre de Candidato </label>
        <input type="text" name="nombre" class="form-control" id="usuario"
              placeholder="Nombre">
        <label class="labelF" for="Usuario">codigo del Alumno</label>
        <input type="number" name="codigo" class="form-control" id="usuario"
              placeholder="codigo">
      </div>
      <input type ="submit" class="btn btn-primary" name="boton" Value="ingresar">
      <input type ="submit" class="btn btn-danger" name="boton" Value="cancelar">

    </form>
  </div>
  <br>
</body>
<footer class="FCANDIDATOS"> 
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
              echo "ingresar";
              if (isset($_POST["nombre"], $_POST["cedula"], $_POST["codigo"]) and $_POST["nombre"] !="" and $_POST["cedula"]!="" and $_POST["codigo"]!="" ){
               echo "variables llenas";
               $nombre = $_POST["nombre"];
               $cedula = $_POST["cedula"];
               $codigo = $_POST["codigo"];
               echo $nombre;
               echo $cedula;
               $sql = "INSERT INTO `candidatos`(`cedula_candidato`, `nombre`, `cod_candidato`) VALUES ('$cedula','$nombre','$codigo')";
               mysqli_query($conn,$sql);
               echo "<script>alert('Datos Ingresados Correctamente')</script>";
              }
          break;


          case 'cancelar':
            echo "hola si cancerlar";
            echo "<script>window.location='../admin/menuadmin.php';</script>";  
          break;

      }


    }

?>