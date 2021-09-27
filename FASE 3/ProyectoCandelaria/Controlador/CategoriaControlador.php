<?php
class categoria{
                public $id_categoria;
                public $nombre;
                public $id_producto;


                function agregar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select * from categoria where nombre = '$this->nombre'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if(mysqli_fetch_row($resultado)){

                                        echo"<script> alert('La categoria ya existe en el sistema');</script>";

                                    }else{
                                        $insertar ="insert into categoria values('$this->id_categoria','$this->nombre','$this->id_producto')";
                                        mysqli_query($cone,$insertar);
                                        echo"<script> alert('La categoria fue creada en el sistema');</script>";

                                    }

                }
                function modificar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $sql = "select * from categoria where id_categoria = '$this->id_categoria'";
                                    $resultado = mysqli_query($cone,$sql);
                                    if(!mysqli_fetch_row($resultado)){

                                        echo"<script> alert('La categoria ya existe en el sistema');</script>";
                                    
                                    }else{
                                        $update = "update categoria set id_categoria = '$this->id_categoria',
                                                                        nombre = '$this->nombre',
                                                                        id_producto = '$this->id_producto'
                                                                        where id_categoria = '$this->id_categoria';
                                                                        ";
                                        echo $update;
                                        mysqli_query($cone,$update);
                                        echo"<script> alert('La categoria fue modificada en el sistema');</script>";
                                    }

                }
                function eliminar(){
                                    $c = new Conexion();
                                    $cone = $c->conectando();
                                    $delete = "delete from categoria where id_categoria ='$this->id_categoria'; ";
                                    if(mysqli_query($cone,$delete)){
                                            echo"<script> alert('La categoria fue eliminada del sistema');</script>";
                                    }else{
                                        echo"<script> alert('La categoria no se puede eliminar porque tiene registros relacionados en el sistema');</script>";
                                    }       

                }

}
?>