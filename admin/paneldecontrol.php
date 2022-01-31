<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Panel de control</title>
        <link rel="stylesheet" href="../estilo/estilo_panel.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/8ed440f220.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION['pasas']) || $_SESSION['pasas'] == false){
                die("Te has intentado colar dentro de el panel de control sin permiso");
            }
            echo "<header>Bienvenido, ".$_SESSION['nombre']." ".$_SESSION['apellidos']." - ";
            echo "<a href='logout.php'>Cerrar sesión</a></header>"
        ?>
        <h1>Gestión de usuarios</h1>
        <table cellpaddin=0 cellspacing=0>
            <tr>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
            </tr>
            <?php
                //Abro la conexión con la base de datos
                $enlace = mysqli_connect("localhost", "cursoaplicacionesweb", "cursoaplicacionesweb", "cursoaplicacionesweb");

                //Le piedo algo a la base de datos
                $peticion="SELECT * FROM usuarios";
                $resultado = mysqli_query($enlace,$peticion);

                //Devuelvo por pantalla lo que me de
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<tr>
                        <td>'.$fila['usuario'].'</td>
                        <td>'.$fila['password'].'</td>
                        <td>'.$fila['nombre'].'</td>
                        <td>'.$fila['apellidos'].'</td>
                        <td>'.$fila['correo'].'</td>
                        <td><a href=""><i class="fas fa-eye"></i></a></td>
                        <td><a href=""><i class="fas fa-redo-alt"></i></a></td>
                        <td><a href="eliminar.php?id='.$fila['identificador'].'"><i class="fas fa-trash-alt"></i></a></td>
                    </tr>';
                }
            ?>
            <tr>
                <form action="insertar.php" method="post">
                    <td><input type="text" name="usuario" placeholder="usuario"></td>
                    <td><input type="text" name="password" placeholder="password"></td>
                    <td><input type="text" name="nombre" placeholder="nombre"></td>
                    <td><input type="text" name="apellidos" placeholder="apellidos"></td>
                    <td><input type="text" name="email" placeholder="email"></td>
                    <td><input type="submit" value="Enviar"></td>
                </form>
            </tr>
        </table>
    </body>
</html>