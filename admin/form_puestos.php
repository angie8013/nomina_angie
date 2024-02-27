<?php
//conectar bd
require_once("../db/conection.php");
$db = new Database();
$con = $db->conectar();
session_start();
?>
<?php
if((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="regm")){
    
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];


    $sql=$con -> prepare ("SELECT*FROM puestos where cargo = '$cargo'");
    $sql -> execute();
    $fila = $sql -> fetchALL(PDO::FETCH_ASSOC);

    if ($cargo=="" || $salario=="")
    {
    echo '<script>alert("EXISTEN DATOS VACIOS"); </script>';
   
    }
    else if($fila){
    echo '<script>alert("Usuario o telefono ya registrado");</script>';
   
    }
    else {
    $insertSQL = $con->prepare ("INSERT INTO puestos (cargo,salario) VALUES ('$cargo','$salario')");
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
        <h1 class="mb-4 pb-3">REGISTRO DE PUESTOS</h1> 
    <div class="card-body"   >
    <form action="#" name="form" method="post">

        <div class="form-row col-md-4 mx-auto">  
           
            <label >Cargo</label>
            <input type="text" class="form-control border border-dark mb-3" name="cargo" placeholder="">
          </div>
         <div class="form-row col-md-4 mx-auto">
            <label >Salario</label>
            <input type="number" class="form-control border border-dark" name="salario" placeholder="">
          </div>    
          <br>
          <input class="btn btn-outline-primary" type="submit" name="validar" value="registrar">
                        <input type="hidden" name="MM_insert" value="regm">
        </div>

        </div>

      </form>
    </div>
</div>
</body>
</html> 