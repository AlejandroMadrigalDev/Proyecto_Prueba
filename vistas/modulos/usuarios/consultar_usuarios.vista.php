<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de control de usuarios</title>
    </head>
    <body>
        <h1>Usuarios</h1>
        <table>
            <thead>
                <tr>
                    <th>Rol Codigo</th>
                    <th>Codigo de usuario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Identificacion</th>
                    <th>Email</th>
                    <th>Constraseña</th>
                    <th>Estado</th>
                    <!-- <th>Acciones</th>                 -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarioCon as $usuario) : ?>
                    <tr>
                        <td><?php echo $usuario->getRolCodigo(); ?></td>
                        <td><?php echo $usuario->getUsuarioCodigo(); ?></td>
                        <td><?php echo $usuario->getUsuarioNombres(); ?></td>
                        <td><?php echo $usuario->getUsuarioApellidos(); ?></td>
                        <td><?php echo $usuario->getUsuarioIdentificacion(); ?></td>
                        <td><?php echo $usuario->getUsuarioEmail(); ?></td>
                        <td><?php echo $usuario->getUsuarioPass(); ?></td>
                        <td><?php echo $usuario->getUsuarioEstado(); ?></td>
                        <!-- <td>
                            <a href="?c=Usuarios&a=rolActualizar&idRol=<?php echo $rol->getRolCodigo(); ?>">Actualizar</a>
                        </td>
                        <td>
                            <a href="?c=Usuarios&a=rolEliminar&idRol=<?php echo $rol->getRolCodigo(); ?>">Eliminar </a>
                        </td> -->
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="?c=Usuarios&a=main">Regresar</a>
    </body>
</html>