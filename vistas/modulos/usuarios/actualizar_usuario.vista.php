<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Usuario</title>
    </head>
    <body>
        <form action="" method="POST">
            <h1>Actualizar Usuario</h1>
            <div>
                <label for="">Rol</label>
                <input type="text" name="rol_codigo" value="<?php echo $usuarioId->getRolCodigo() ?>">
            </div>
            <div>
                <input type="hidden" name="usuario_codigo" value="<?php echo $usuarioId->getUsuarioCodigo() ?>">
            </div>
            <div>
                <label for="">Nombres</label>
                <input type="text" name="usuario_nombres" value="<?php echo $usuarioId->getUsuarioNombres() ?>">
            </div>
            <div>
                <label for="">Apellidos</label>
                <input type="text" name="usuario_apellidos" value="<?php echo $usuarioId->getUsuarioApellidos() ?>">
            </div>
            <div>
                <label for="">Identificacion</label>
                <input type="text" name="usuario_identificador" value="<?php echo $usuarioId->getUsuarioIdentificacion() ?>">
            </div>
            <div>
                <label for="">Correo</label>
                <input type="text" name="usuario_email" value="<?php echo $usuarioId->getUsuarioEmail() ?>">
            </div>
            <div>
                <label for="">Contraseña</label>
                <input type="text" name="usuario_pass" value="<?php echo $usuarioId->getUsuarioPass() ?>">
            </div>
            <div>
                <label for="">Estado</label>
                <input type="text" name="usuario_estado" value="<?php echo $usuarioId->getUsuarioEstado() ?>">
            </div>
            <div>
                <input type="submit" value="Actualizar">
            </div>
        </form>
        <br>
        <br>
        <a href="?c=Usuarios&a=main">Regresar</a>
    </body>
</html>