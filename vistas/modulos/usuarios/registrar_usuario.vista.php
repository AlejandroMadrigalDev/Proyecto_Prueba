<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registar Usuario</title>
</head>
<body>
    <h1>Registar Nuevo Usuario</h1>
    <br>
    <br>
    <div>
        <form action="" method="POST">
            <label for="">Rol</label>
            <input type="text" name="rol_codigo" placeholder="Rol Codigo">
            <br>
            <label for="">Codigo</label>
            <input type="text" name="usuario_codigo" placeholder="Codigo de usuario">
            <br>
            <label for="">Nombres</label>
            <input type="text" name="usuario_nombres" placeholder="Nombres">
            <br>
            <label for="">Apellidos</label>
            <input type="text" name="usuario_apellidos" placeholder="Apellidos">
            <br>
            <label for="">Identificacion</label>
            <input type="text" name="usuario_identificador" placeholder="Numero de identidad">
            <br>
            <label for="">Correo</label>
            <input type="email" name="usuario_email" placeholder="@ correo">
            <br>
            <label for="">Contraseña</label>
            <input type="password" name="usuario_pass" placeholder="Contraseña de 5 digitos">
            <br>
            <label for="">Estado</label>
            <input type="text" name="usuario_estado" placeholder="Estado del usuario">
            <div>
                <br>
                <input type="submit" value="Registrar">
            </div>
        </form>
        <br>
        <br>
        <a href="?">Volver al inicio</a>
    </div>
</body>
</html>