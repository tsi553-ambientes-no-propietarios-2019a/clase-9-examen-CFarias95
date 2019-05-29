<?php
if ($_GET) {
    if (isset($_GET['error_message'])) {
        $error_message = $_GET['error_message'];
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
</head>

<body>
    <center>
        <div>
            <h1>Registrar un nuevo USUARIO</h1>
            <br>
            <form action='registrar_usuario.php' method='POST'>
                <div>
                    <input type="text" name="nombre" placeholder="Nombre" required>
                    <br><br>
                    <input type="text" name="usuario" placeholder="usuario" required>
                    <br><br>
                    <input type="password" name="clave" placeholder="clave" required>
                    <br><br>
                    <input type="password" name="clave1" placeholder="confirmar clave" required>
                    <br><br>                    
                    <Label>ROL: </Label>
                    <select name="rol">
                        <option value="0">Seleccionar</option>
                        <option value="ADMIN">Administrador</option>
                        <option value="CLIENTE">Cliente</option>
                    </select>
                    <br><br>
                    <button type="submit">Registrar</button>
                </div>
            </form>
        </div>
        <?php if (isset($error_message)) { ?>
            <div><strong><?php echo $error_message; ?></strong></div>
        <?php } ?>
    </center>
</body>
</html>