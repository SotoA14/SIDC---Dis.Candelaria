<?php
 include('../Conexión/conectar.php');
 include("../Modelo/CategoriaModelo.php");
?>
<?php
$obj = new categoria();
if($_POST){
    $obj->id_categoria = $_POST['id_categoria'];
    $obj->nombre = $_POST['nombre '];
    $obj->id_producto = $_POST['id_producto'];
}
?>
<?php
$llave = $_GET['key'];
//echo $llave;
$c = new Conexion();
$cone = $c->conectando();
$sql = "select * from categoria where id_categoria = '$llave'";
$resultado = mysqli_query($cone,$sql);
if ($arreglo = mysqli_fetch_row($resultado)){


    $obj->id_categoria = $arreglo[0];
    $obj->nombre = $arreglo[1];
    $obj->id_producto = $arreglo[2];
}else{
    $obj->id_categoria = null;
    $obj->nombre = null;
    $obj->id_producto = null;
}
?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="../Vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Vista/css1/font-awesome.min.css">
        <link rel="stylesheet" href="css/.css">
         	
        <title>Modulo categorias</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="factura" method="POST">
                <table border="1">
                        <tr>
                            <td colspan="2"><center>categorias</center></td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td><input readOnly size="10" type="text" name="id_categoria" id="id_categoria" value="<?php echo $obj->id_categoria?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input size="35" type="text" name="nombre" value="<?php echo $obj->nombre?>" placeholder="Ingrese cantidad"></td>

                        <tr>
                            <td>Nombre de producto</td>
                            <td>

                                     <?php   
                                            $c = new Conexion();
                                            $cone = $c->conectando();
                                            $p2 = "select nombre from producto where id_producto='$obj->id_producto'";
                                            $res2 = mysqli_query($cone,$p2);
                                            if ($arreglo2 = mysqli_fetch_row($res2)){
                                                echo $arreglo2[0];
                                            }else{
                                                $arreglo2[0]=null;
                                            }
                                            
                                    ?>

                            </td>
                        
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="elimina"> eliminar</button>
                                    <a href="consultarCategoria.php">
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