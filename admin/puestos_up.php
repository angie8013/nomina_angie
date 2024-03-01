<?php
session_start();
require_once("../db/conection.php");
$db = new Database();
$con = $db->conectar();

$sql = $con -> prepare ("SELECT * FROM puestos WHERE puestos.ID = '".$_GET['id']."'");
$sql -> execute();
$usua = $sql -> fetch();
?>

<?php
if(isset($_POST["update"]))
{
    $cargo = $_POST['cargo'];
    $salario = $_POST['salario'];

    $insertSQL = $con->prepare ("UPDATE puestos SET cargo ='$cargo', salario = '$salario' WHERE ID = '".$_GET['id']."'");
    $insertSQL->execute();
    echo '<script>alert ("Actualización Exitosa");
    window.close("permisos_up.php");
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
                    <td><input  name ="ID" value="<?php echo $usua['ID']?>" readonly></td>
                </tr>

                <tr>
                    <td>Fecha de salida</td>
                    <td><input type="text" name ="cargo" value="<?php echo $usua['cargo']?>"></td>
                </tr>

                <tr>
                    <td>Fecha de reingreso</td>
                    <td><input type="text" name ="salario" value="<?php echo $usua['salario']?>" ></td>
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