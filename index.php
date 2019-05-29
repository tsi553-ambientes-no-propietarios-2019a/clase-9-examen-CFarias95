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
    <title>Login</title>
</head>

<body>
    <center>
        <div>
            <h1>Bienvenido/a</h1>
            <br>
            <form action='PHP/login.php' method='POST'>
                <div>
                    <input type="text" name="usuario" placeholder="usuario" required>
                    <br><br>
                    <input type="password" name="contraseña" placeholder="contraseña" required>
                    <br><br>
                    <button type="submit">Ingresar</button>

                    <a href='PHP/registro.php'>Registrar</a>
                </div>
            </form>
        </div>
        <?php if (isset($error_message)) { ?>
            <div><strong><?php echo $error_message; ?></strong></div>
        <?php } ?>
    </center>
</body>

</html>