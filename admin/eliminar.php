<?php
    //Abro la conexión con la base de datos
    $enlace = mysqli_connect("localhost", "cursoaplicacionesweb", "cursoaplicacionesweb", "cursoaplicacionesweb");

    //Le piedo algo a la base de datos
    $peticion = "DELETE FROM usuarios WHERE identificador = ".$_GET['id']."";
    mysqli_query($enlace,$peticion);
    echo "Eliminando usuario, espere...";
    echo '<meta http-equiv="refresh" content="2; url=paneldecontrol.php">';
?>