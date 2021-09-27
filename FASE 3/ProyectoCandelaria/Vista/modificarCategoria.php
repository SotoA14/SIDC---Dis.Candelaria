<?php
 include ('../Conexión/conectar.php');
 include ('../Modelo/CategoriaModelo.php');
?>
<?php
$obj = new categoria();
if($_POST){
    $obj->id_categoria = $_POST['id_categoria'];
    $obj->nombre = $_POST['nombre'];
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
$arreglo = mysqli_fetch_row($resultado);
    $obj->id_categoria = $arreglo[0];
    $obj->nombre = $arreglo[1];
    $obj->id_producto = $arreglo[2];
?>
<?php
$c = new Conexion();
$cone = $c->conectando();
$p = "select * from producto";
$res = mysqli_query($cone,$p);
$arreglo = mysqli_fetch_assoc($res);
?>

<!Doctype html> 
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="idth=device-width, initial-scale=1, shrink-to-fit=no"> 
        <link rel="stylesheet" href="../Vista/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Vista/css1/font-awesome.min.css">
        <link rel="stylesheet" href="css/.css">
         	
        <title>Modulo Categorias</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="producto" method="POST">
                <table border="1">
                        <tr>
                            <td colspan="2"><center>Categorias</center></td>
                        </tr>
                        <tr>
                            <td>id</td>
                            <td><input readOnly size="10" type="text" name="id_categoria" id="id_categoria" value="<?php echo $obj->id_categoria?>" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                        <tr>
                            <td>Nombre</td>
                            <td><input size="40" type="text" name="nombre" id="nombre" value="<?php echo $obj->nombre ?>" placeholder="Nombre"></td>
                        </tr>

                        
                        <tr>
                            <td>Nombre del producto</td>
                            <td> 
                                <select name="id_producto" id="$obj->id_producto">
                                    
                                     <?php   
                                            $c = new Conexion();
                                            $cone = $c->conectando();
                                            $p2 = "select id_producto, nombre from producto where id_producto='$obj->id_producto'";
                                            $res2 = mysqli_query($cone,$p2);
                                            $arreglo2 = mysqli_fetch_array($res2);
                                            echo $arreglo2[0];
                                            echo $arreglo2[1];
                                        

                                            
                                    ?>
                                  
                                    
                                        <?php
                                            do{
                                                $codigo = $arreglo['id_producto'];
                                                $nombre = $arreglo['nombre'];
                                                if($codigo == $obj->id_producto){
                                                    echo "<option value=$codigo=>$nombre";
                                                }else{
                                                    echo "<option value=$codigo>$nombre";
                                                }
                                            }while($arreglo = mysqli_fetch_assoc($res));

									        $row = mysqli_num_rows($res);
									        $rows=0;
									        if($rows>0)
									                {
										            mysqli_data_seek($arreglo ,0);
										            $arreglo = mysqli_fetch_assoc($res);
									                }


                                        ?>

                                        </select>   
                                  </td>
                                  </tr>
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="modifica"> Modificar</button>
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