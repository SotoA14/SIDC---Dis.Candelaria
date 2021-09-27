<?php 
include ('../Conexión/conectar.php');
include ("../Modelo/CategoriaModelo.php");
?> 

<?php
$obj = new categoria();
if($_POST){
    $obj->id_categoria = $_POST['id_categoria'];
    $obj->nombre = $_POST['nombre'];
    $obj->id_producto = $_POST['id_producto'];

}


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
         	
        <title>Modulo Cliente</title>
    </head>
    <br>
    <br>
    <body>
        <center>
            <form action="" name="categoria" method="POST">
                <table border="1">
                        <tr>
                            <td colspan="2"><center>Tipo de documento</center></td>
                        </tr>
                        <tr>
                            <td>id Categoria</td>
                            <td><input size="10" type="text" name="id_categoria" id="id_categoria" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>nombre</td>
                            <td><input size="10" type="text" name="nombre" id="nombre" placeholder="Código es Automatico"></td>
                        </tr>
                        <tr>
                            <td>Producto</td>
                            <td>
                            <select name="id_producto" id="$obj->id_producto">
                                    <option>[Seleccione el tipo de documento]</option>
                                    <option>
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
                            </option>  
                                </select>
                            </td>
                        </tr>
        
                        <tr>
                            <td colspan="2">
                                <center>
                                    <button type="submit" name="guarda">Guardar</button>
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