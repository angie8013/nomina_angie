<?php
//conectar bd
require_once("db/conection.php");
$db = new Database();
$con = $db->conectar();
session_start();
?>
<?php
if((isset($_POST["MM_insert"]))&&($_POST["MM_insert"]=="regm")){
    
    $id_us = $_POST['id_us'];
    $nombre_us = $_POST['nombre_us'];
    $apellido_us = $_POST['apellido_us'];
    $correo_us = $_POST['correo_us'];
    $tel_us = $_POST['tel_us'];
    $pass = $_POST['pass'];
    $foto = $_POST['foto'];
    $id_puesto = $_POST['id_puesto'];
    $id_rol = $_POST['id_rol'];

    $sql=$con -> prepare ("SELECT*FROM usuarios where id_us = '$id_us' or correo_us = '$correo_us'");
    $sql -> execute();
    $fila = $sql -> fetchALL(PDO::FETCH_ASSOC);

    if ($id_us=="" || $nombre_us=="" || $apellido_us=="" || $correo_us=="" || $tel_us==""||  $pass=="" || $foto=="" || $id_puesto=="" || $id_rol=="")
    {
    echo '<script>alert("EXISTEN DATOS VACIOS"); </script>';
   
    }
    else if($fila){
    echo '<script>alert("Usuario o telefono ya registrado");</script>';
   
    }
    else {
    $insertSQL = $con->prepare ("INSERT INTO usuarios (id_us,nombre_us,apellido_us,correo_us,tel_us,pass,foto,id_puesto,id_rol) VALUES ('$id_us','$nombre_us', '$apellido_us','$correo_us','$tel_us','$pass','$foto','$id_puesto','$id_rol')");
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
            <label >Fecha de inicio</label>
            <input type="datetime-local" class="form-control" name="id_us" placeholder="Cedula del usuario">
          </div>
          <div class="form-group col-md-4">
            <label >Fecha de fin</label>
            <input type="datetime-local" class="form-control" name="nombre_us" placeholder="Nombre Completo">
          </div>
        
        <div class="form-group col-md-4">
          <label>Apellido</label>
          <input type="text" class="form-control" name="apellido_us" placeholder="Apellido completo">
        </div>
   
        <div class="form-group col-md-5">
          <label>Correo</label>
          <input type="text" class="form-control" name="correo_us" placeholder="Correo electronico">
        </div>

        <div class="form-group col-md-4">
            <label>Contraseña</label>
            <input type="password" class="form-control" name="pass">
          </div>
          
          <div class="form-group col-md-3">
            <label>Telefono</label>
            <input type="number" class="form-control" name="tel_us" placeholder="Numero de contacto">
          </div>
          
          <div class="form-group col-md-4">
            <label >Puesto</label>
            <select name="id_puesto" class="form-control">
                    <option value="">Seleccione Puesto</option>

                                                    <?php
                                                    $control = $con->prepare("SELECT * from puestos where ID >=0");
                                                    $control->execute();
                                                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value=" . $fila['ID'] . ">" . $fila['cargo'] . "</option>";
                                                    }

                                                    ?>
              </select>
          </div>
          <div class="form-group col-md-4">
            <label >Rol</label>
            <select name="id_rol" class="form-control">
                    <option value="">Seleccione Rol</option>

                                                    <?php
                                                    $control = $con->prepare("SELECT * from roles where ID >=0");
                                                    $control->execute();
                                                    while ($fila = $control->fetch(PDO::FETCH_ASSOC)) {
                                                        echo "<option value=" . $fila['ID'] . ">" . $fila['TP_user'] . "</option>";
                                                    }

                                                    ?>
              </select>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label">foto del usuario</label>
            <input class="form-control" type="file" name="foto">
          </div>    
        </div>

        </div>
                        <input class="btn btn-outline-primary" type="submit" name="validar" value="registrar">
                        <input type="hidden" name="MM_insert" value="regm">
      </form>
    </div>
</div>
</body>
</html> 