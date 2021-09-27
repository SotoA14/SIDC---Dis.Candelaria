<?php
include("../Controlador/CategoriaControlador.php");
?>

<?php
$obj = new categoria();
if($_POST){
        $obj->id_categoria = $_POST['id_categoria'];
        $obj->nombre = $_POST['nombre'];
        $obj->id_producto = $_POST['id_producto'];

    if(isset($_POST['guarda'])){
            $obj->agregar();
    }

    if(isset($_POST['modifica'])){
            $obj->modificar();
    }
    
    if(isset($_POST['elimina'])){
            $obj->eliminar();
    }

}
?>