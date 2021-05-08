<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 

require_once("../../database/conection.php");
$vacio = isset($_POST['variable'])? $_POST['variable']:null;
$acceso = isset($_POST['variable'])? $_POST['variable']:null;

session_start();
if(empty($acceso)){
    echo "el acceso no se pudo concretar";
}
if(isset($_POST['usuario'])){
    $verusuario = $_POST['usuario'];
}
if(isset($_POST['clave'])){
    $verclave = $_POST['clave'];
}
if(isset($_POST['acceder'])){
    if(empty($verusuario)&& empty($verclave)){
        $vacio=true;
    }
    else{
        $sql = "SELECT * FROM usuario WHERE usuario='$verusuario' and Clave='$verclave'";
        $resultado =mysqli_query($conn,$sql);
        $datos = mysqli_fetch_array($resultado); 
        $BDusario = $datos['usuario'];
        $BDclave=$datos['clave'];

        
        if (isset($BDusario) && isset($BDclave)) {
            $acceso = true;
            
        }
        else{
            $acceso=false;
        }
    }

}
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <h1 class="text-center">Sistema de Votación</h1>
    </div>
  </div>
 
  <hr>
</div>
<div class="container">
 <div class="center-block col-md-4 col-xs-8">
<form action="admin.php" role="form" method="post">
  <div class="form-group">
    <label for="Usuario">Usuario</label>
    <input type="text" name="usuario" class="form-control" id="usuario"
           placeholder="Usuario">
  </div>
  <div class="form-group">
    <label for="ejemplo_password_1">Contraseña</label>
    <input type="password" name="clave" class="form-control" id="ejemplo_password_1" 
           placeholder="Contraseña">
  </div>


   <input type ="submit" class="btn btn-primary" name="acceder" Value="Ingresar">
			
</form>
</div>
</div>
<div align=center>
        <?php 
        if ($vacio){
            echo"<h1>los campos estan vacios ... llenar usuario y contraseña</h1>";
        }
        if ($acceso) {
            echo  "<script>alert('Bienvenido al sistema');
            window.location='menuadmin.php';</script>
            ";
        }else{
            echo"<h1> acceso Denegado...usuario y clave erroneos... </h1>";
        }

        ?>
    </div>    
</body>
</html>

