<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de control</title>
    </head>
    <body>
        <h1>Roles</h1>
        <a href="?c=Usuarios&a=rolRegistrar">Registrar rol</a>
        <br>
        <br>
        <table>
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>                
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $rol) : ?>
                    <tr>
                        <td><?php echo $rol->getRolCodigo(); ?></td>
                        <td><?php echo $rol->getRolNombre(); ?></td>
                        <td>
                            <a href="?c=Usuarios&a=rolActualizar&idRol=<?php echo $rol->getRolCodigo(); ?>">Actualizar</a>
                        </td>
                        <td>
                            <a href="?c=Usuarios&a=rolEliminar&idRol=<?php echo $rol->getRolCodigo(); ?>">Eliminar </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>