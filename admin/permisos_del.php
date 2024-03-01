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
if(isset($_POST["delete"]))
{
    $insertSQL = $con->prepare("DELETE FROM permisos WHERE id_permiso = '".$_GET['id']."'");
    $insertSQL->execute();
    echo '<script>alert ("Registro Eliminado Exitosamente");
    window.close("empleados_del.php");
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
    <link rel="stylesheet" href="../../css/estilo.css">

    <title>Actualizar datos</title>
</head>

<body onload="centrar();">

        <table class="center">
            <form autocomplete="off" name="form_regis" method="POST">

            <tr>
                    <td>ID usuario</td>
                    <td><input  name ="id_us" value="<?php echo $usua['id_us']?>" readonly></td>
                </tr>

                <tr>
                    <td>Fecha de salida</td>
                    <td><input type="datetime-local" name ="fecha" value="<?php echo $usua['fecha']?>"></td>
                </tr>

                <tr>
                    <td>Fecha de reingreso</td>
                    <td><input type="datetime-local" name ="fecha_reingreso" value="<?php echo $usua['fecha_reingreso']?>" ></td>
                </tr>



                </tr>
            
        
                </tr>

                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr> 
                <tr>
                    <td colspan="2">&nbsp;</td>
                </tr> 
                <tr>
                    <td><input type="submit" name="delete" value="Eliminar"></td>
            </tr>
            </form>
            </table>

            </body>
            </html>