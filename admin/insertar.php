<?php
    //Abro la conexión con la base de datos
    $enlace = mysqli_connect("localhost", "cursoaplicacionesweb", "cursoaplicacionesweb", "cursoaplicacionesweb");

    //Le piedo algo a la base de datos
    $peticion="INSERT INTO usuarios VALUES (NULL,'".$_POST['usuario']."','".$_POST['password']."','".$_POST['nombre']."','".$_POST['apellidos']."','".$_POST['email']."')";
        $resultado = mysqli_query($enlace,$peticion);
        echo '<meta http-equiv="refresh" content="2; url=paneldecontrol.php ">';
?>