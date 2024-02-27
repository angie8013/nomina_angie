<?php
//conectar bd
require_once("../db/conection.php");
$db = new Database();
$con = $db->conectar();
session_start();
?>
<?php
if((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="regm")){
    
    $fecha = $_POST['fecha'];
    $fecha_reingreso = $_POST['fecha_reingreso'];
    $id_us = $_POST['id_us'];


    $sql=$con -> prepare ("SELECT*FROM permisos where id_us = '$id_us'");
    $sql -> execute();
    $fila = $sql -> fetchALL(PDO::FETCH_ASSOC);

    if ($fecha=="" || $fecha_reingreso=="" || $id_us=="")
    {
    echo '<script>alert("EXISTEN DATOS VACIOS"); </script>';
   
    }
    else if($fila){
    echo '<script>alert("Usuario o telefono ya registrado");</script>';
   
    }
    else {
    $insertSQL = $con->prepare ("INSERT INTO permisos (fecha,fecha_reingreso,id_us) VALUES ('$fecha','$fecha_reingreso', '$id_us')");
    $insertSQL->execute();
    echo '<script>alert("Registro exitoso"); </script>';
  
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="background-color: aliceblue;">
  
    <div class="section text-center container-sm" style="background-color: white;">
        <h1 class="mb-4 pb-3">REGISTRO DE PERMISOS</h1> 
    <div class="card-body" >
    <form action="#" name="form" method="post">

        <div class="form-row">
        <div class="form-group col-md-4">
          <label>Cedula del usuario</label>
          <input type="text" class="form-control" name="id_us" placeholder="Ingrese la cedula del usuario">
        </div>
   
          <div class="form-group col-md-4">
            <label >Fecha de inicio</label>
            <input type="datetime-local" class="form-control" name="fecha">
          </div>
          <div class="form-group col-md-4">
            <label >Fecha de fin</label>
            <input type="datetime-local" class="form-control" name="fecha_reingreso">
          </div>    
      
        </div>
        <input class="btn btn-outline-primary" type="submit" name="validar" value="registrar">
                        <input type="hidden" name="MM_insert" value="regm">
        </div>

      </form>
    </div>
</div>
</body>
</html> 