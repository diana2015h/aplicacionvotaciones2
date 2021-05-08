
<?php
    session_start();
    $nomestudiante= $_SESSION["nombreest"];
    $cursoestudiante= $_SESSION["curso"];
    $cedulaAlumno=$_SESSION["cedulaAlumno"];

    require_once("../database/conection.php");

    $vacio=isset($_POST['variable']) ? $_POST['variable']: null;
    $acceso=isset($_POST['variable']) ? $_POST['variable']: null;


    if (empty($acceso)) {
        //echo "el Dato esta vacio";
    }
    if (isset($_POST["candidato"])) {
        echo"llego canditado";
        $codigofcandidato=$_POST["candidato"];
        $codigofcandidatoC=$_POST["candidatoC"];
        # code...
    }else{
        $codigofcandidato="";
    }

    if (isset ($_POST['boton'])) {
        $boton= $_POST['boton'];
        switch ($boton) {
            case 'votar':
                # code...
                $sql="UPDATE alumnos SET voto='1', cod_candidato='$codigofcandidato' WHERE cedula_alumno=$cedulaAlumno";
                $resultado=mysqli_query($conn, $sql);
                $sql="UPDATE alumnos SET voto='1', cod_candidatoC='$codigofcandidatoC' WHERE cedula_alumno=$cedulaAlumno";
                $resultado=mysqli_query($conn, $sql);
                ?>
                <script> alert("Gracias por Votar")
                window.location="../index.php"
                </script>
                <?php
                break;
            
            case 'cancelar':
                # code...
                echo "<script>alert('Usted no ha Votado, vuelva luego');
                     window.location='../index.php';
                </script>";
                break;
        }

    }
   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/stilomenuestudinate.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Revalia&display=swap" rel="stylesheet">
    <title>Selecion de Candidatos</title>
</head>
<body>

<!--<header>
        <div class="container">
            <img class="imagen" src="../img/banderaentera.png">
            
            <div class="titulopagina">
                <h3>INSTITUCION EDUCATIVA MUNICIPAL EL ENCANO</h3>
                <h3> SISTEMA DE VOTACIONES 2021</h3>
            </div>
            <img class="logocol" src="../img/escudo.png" alt="NUSLA">
        </div> 
</header>

<section>
            <div class="subtitulopagina">
                    <h5>SELECCIONA CANDIDATO PARA PERSONERO 2021</h5>
            </div>

            <div class="containerV">
                <div class="candidatos">
                    <img class="logocantidato" src="../img/user.png" alt="NUSLA">
                    <p class="nomCandidato"> Candidato numero 1</p>
                </div>
                <div class="candidatos">
                    <img class="logocantidato" src="../img/user.png" alt="NUSLA">
                    <p class="nomCandidato"> Candidato numero 1</p>
                </div>
                <div class="candidatos">
                    <img class="logocantidato" src="../img/user.png" alt="NUSLA">
                    <p class="nomCandidato"> Candidato numero 1</p>
                </div>
                <div class="candidatos">
                    <img class="logocantidato" src="../img/user.png" alt="NUSLA">
                    <p class="nomCandidato"> Candidato numero 1</p>
                </div>
                <div class="candidatos">
                    <img class="logocantidato" src="../img/user.png" alt="NUSLA">
                    <p class="nomCandidato"> Candidato numero 1</p>
                </div>
            </div>


    
</section>
-->

<div class="containerfluid">
    <!--<div class="row">
        <div class="col-md-6 col-md-offset-3">
        <h1>Sistema de votaciones</h1>
        </div>    
    </div>
    -->
    <img class="imagen" src="../img/banderaentera.png">
            
            <div class="titulopagina">
                <h3>INSTITUCION EDUCATIVA MUNICIPAL EL ENCANO</h3>
                <h3> SISTEMA DE VOTACIONES 2021</h3>
            </div>
            <img class="logocol" src="../img/escudo.png" alt="NUSLA">
    <hr>
</div>


<div class="container">                           
    <div class="center-block col-md-12 col-xs-8">
        <?php   echo "bienvebido estudiante : ".$nomestudiante;?>

    </div>
    <form name="acceso" action="menuestudiante.php" role="form" method="POST">
        <div class="md-12">
            <fieldset>
                <legend><em><strong>Candidato a Personero</strong></em></legend>
                <?php 
                    $sql = "SELECT * FROM candidatos";
                    $resultado =mysqli_query($conn,$sql);
                    $num_reg = mysqli_num_rows($resultado);//se usa cuando usas select en las consultas por filas
                ?>
                <table border="1">
                    <tr>
                        <?php 
                            for ($i=0; $i < $num_reg; $i++) { 
                                $cadidato=mysqli_fetch_array($resultado);
                                $codcandidato =$cadidato["cod_candidato"];
                                $nomcandidato =$cadidato["nombre"];
                        ?>
                        <td bgcolor="#c3c3c3">
                                <img src="../img/candidatos/<?php echo$codcandidato.".png" ?>" alt="<?php echo $nomCandidato?>" width="80px" height="120px"/>
                                <input type="radio" name="candidato" value="<?php  echo $codcandidato?>"> <br>
                                <strong>(<?php echo "0".$codcandidato;?>) <?php echo $nomcandidato ?></strong>
                       
                        </td>

                        <?php
                            }
                        ?>
                    </tr>
                </table>

            </fieldset>
            <fieldset>
                <legend><em><strong>Candidato a Contralor</strong></em></legend>
                <?php 
                    $sql = "SELECT * FROM candidatosC";
                    $resultado =mysqli_query($conn,$sql);
                    $num_reg = mysqli_num_rows($resultado);//se usa cuando usas select en las consultas por filas
                ?>
                <table border="1">
                    <tr>
                        <?php 
                            for ($i=0; $i < $num_reg; $i++) { 
                                $cadidatoC=mysqli_fetch_array($resultado);
                                $codcandidatoC =$cadidatoC["cod_candidatoC"];
                                $nomcandidatoC =$cadidatoC["nombre"];
                        ?>
                        <td bgcolor="#c3c3c3">
                                <img src="../img/contralor/<?php echo$codcandidatoC.".jpg" ?>" alt="<?php echo $nomCandidatoC?>" width="80px" height="120px"/>
                                <input type="radio" name="candidatoC" value="<?php  echo $codcandidatoC?>"> <br>
                                <strong>(<?php echo "0".$codcandidatoC;?>) <?php echo $nomcandidatoC ?></strong>
                       
                        </td>

                        <?php
                            }
                        ?>
                    </tr>
                </table>

            </fieldset>
            <br><br>
            <input type="submit" class="btn btn-primary" name="boton" value="votar">
            <input type="submit" class="btn btn-danger" name="boton" value="cancelar">

        </div>
    </form>
</div>

       
</body>
<footer> 
    
    <p><strong>Copyright &copy; 2021</strong></p>
    <p><strong>Diseñado por : Diana Marcela Hidalgo & Sonia Carolina Erazo</p>
</footer>
</html>


<?php


   
?>