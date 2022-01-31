<?php
    session_start();

    //Abro la conexión con la base de datos
    $enlace = mysqli_connect("localhost", "cursoaplicacionesweb", "cursoaplicacionesweb", "cursoaplicacionesweb");

    //Le piedo algo a la base de datos
    $peticion="SELECT * FROM usuarios WHERE usuario = '".$_POST['usuario']."' AND password = '".$_POST['contrasena']."' LIMIT 1";
        $resultado = mysqli_query($enlace,$peticion);
        $pasas = false;
        $_SESSION['pasas'] = false; 

        //Devuelvo por pantalla lo que me de
        if ($fila = $resultado->fetch_assoc()) {
            //echo $fila['nombre']." ".$fila['apellidos']."<br>";
            $pasas = true;
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['apellidos'] = $fila['apellidos'];
        }else{
            //echo "No hay ningun usuario que cumpla esas características";
            $pasas = false;
        }

    //Validamos 
    if($pasas){
        echo "Redireccionando al panel de control, espere por favor...";
        $_SESSION['pasas'] = true;
        echo '<meta http-equiv="refresh" content="2; url=paneldecontrol.php">';
    }else{
        echo "Lo siento, acceso denegado.";
        $_SESSION['pasas'] = false;
        echo '<meta http-equiv="refresh" content="2; url=index.html">';
    }

    //Cierro los recursos que haya abierto
    mysqli_close($enlace);
?>