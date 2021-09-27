<?php
 include('../Conexión/conectar.php');
 include('../Modelo/TipDocModelo.php');
?>
<?php
$obj = new tipo_documento();
if($_POST){
    $obj->id_tipo_documento = $_POST['id_tipo_documento'];
    $obj->descripcion = $_POST['descripcion'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from tipo_documento where id_tipo_documento = '$llave'";
$resultado = mysqli_query($cone,$sql);
if($arreglo = mysqli_fetch_row($resultado)){
    $obj->id_tipo_documento = $arreglo[0];
    $obj->descripcion = $arreglo[1];
    
}
else{
    $obj->id_tipo_documento = null;
    $obj->descripcion = null;
}
   
?>


<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="../Vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="../ProyectoCandelaria/font-awesome.min.css">
         	
        <title>Tipo de documento</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="tipo_documento" method="POST">
                <table border="1">
                        <tr>
                            <td colspan="2"><center>Eliminar Tipo de documento</center></td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td><input readOnly size="10" type="text" name="id_tipo_documento" id="id_tipo_documento" value="<?php echo $obj->id_tipo_documento?>" placeholder="Ingrese Código"></td>
                        </tr>
                        <tr>
                            <td>descripcion</td>
                            <td><input  readOnly size="40" type="text" name="descripcion" id="descripcion" value="<?php echo $obj->descripcion?>" placeholder="tipo de documento"></td>
                        </tr>
                    
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="elimina"> Eliminar</button>
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
