<?php
session_start();
require_once("../db/conection.php");
$db = new Database();
$con = $db->conectar();

$sql = $con -> prepare ("SELECT * FROM permisos WHERE permisos.id_permiso = '".$_GET['id']."'");
$sql -> execute();
$usua = $sql -> fetch();
?>

<?php
if(isset($_POST["update"]))
{
    $fecha = $_POST['fecha'];
    $fecha_reingreso = $_POST['fecha_reingreso'];
    $id_us = $_POST['id_us'];

    $insertSQL = $con->prepare ("UPDATE permisos SET fecha ='$fecha', fecha_reingreso = '$fecha_reingreso', id_us = '$id_us' WHERE id_permiso = '".$_GET['id']."'");
    $insertSQL->execute();
    echo '<script>alert ("Actualización Exitosa");
    </script>';

    
}
?>

<!DOCTYPE html>
<html lang="en">
    <script>
        function centrar() {
            iz=(screen.width-document.body.clientwidth) / 2;
            de=(screen.height-document.body.clientHeight) / 2;
            moveTo(iz,de);
        }
    </script>    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Actualizar datos</title>
</head>

<body onload="centrar();">

        <table class="center">
            <form autocomplete="off" name="form_regis" method="POST">

            <tr>
                    <td>ID usuario</td>
                    <td><input name ="id_permiso" value="<?php echo $usua['id_permiso']?>" readonly></td>
                </tr>

                <tr>
                    <td>Nombres</td>
                    <td><input type="datetime-local" name ="fecha" value="<?php echo $usua['fecha']?>"></td>
                </tr>

                <tr>
                    <td>Apellidos</td>
                    <td><input type="datetime-local" name ="fecha_reingreso" value="<?php echo $usua['fecha_reingreso']?>" ></td>
                </tr>

                <tr>
                    <td>Correo</td>
                    <td><input  name ="id_us" value="<?php echo $usua['id_us']?>" ></td>
                </tr>

                </tr>
            
        
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr> 
                <tr>
                    <td><input type="submit" name="update" value="Actualizar"></td>
            </tr>
            </form>
            </table>

            </body>
            </html>