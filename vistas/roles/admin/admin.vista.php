<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $sesion?></title>
    </head>
    <body>
        <h1>Bienvenido <?php echo $sesion?></h1>
        <a href="?c=Usuarios&a=rolConsultar">Gestionar Roles</a>
        <br>
        <br>
        <a href="?c=Usuarios&a=usuarioConsultar">Gestionar Usuarios</a>
        <br>
        <br>
        <a href="?">Cerrar Sesion</a>
    </body>
</html>