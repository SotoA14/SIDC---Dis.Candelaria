<?php 
include ('../Conexión/conectar.php');
include ('../Modelo/TipDocModelo.php');
?> 

<?php
$obj = new tipo_documento();
if($_POST){
 $obj->id_tipo_documento = $_POST['id_tipo_documento'];
    $obj->descripcion = $_POST['descripcion'];
    
}
?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="../Vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Vista/fonts/font-awesome.min.css">
       
        <title>Tipo de documento</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="tipo_documento" method="POST">
                <table border="1">
                        <tr>
                            <td colspan="2"><center>Tipo de documento</center></td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td><input size="10" type="text" name="id_tipo_documento" id="id_tipo_documento" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Tipo documento</td>
                            <td><input size="40" type="text" name="descripcion" id="descripcion" placeholder="tipo de documento"></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="guarda">Guardar</button>
                                    <a href="consultarTipDoc.php">
                                             <button type="button" name="salir">Salir</button>
                                    </a>
                                </center>
                            </td>
                        </tr>
                </table>
            </form>
        </center>  
    </body> 
</html>