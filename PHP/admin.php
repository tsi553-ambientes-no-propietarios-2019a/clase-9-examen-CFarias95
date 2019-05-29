<?php
session_start();
if ($_SESSION['rol'] == "ADMIN" and isset($_SESSION['user'])) {
    $con = mysqli_connect("localhost", "root", "", "examen");
    $usuario = $_SESSION['user'];
    mysqli_query($con, "SET CHARACTER SET utf8");
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Portal</title>
    </head>

    <body>
        <center>
            <div>
                <h1>Bienvenido/a</h1>
                <br>
                <label>Registra tus productos</label>
                <form action='reg_prod.php' method='POST'>
                    <div>
                        <input type="text" name="producto" placeholder="Producto" required>
                        <br><br>
                        <input type="password" name="precio" placeholder="Precio" required>
                        <br><br>
                        <button type="submit">Guardar</button>
                    
                    </div>
                </form>
                <?php if (isset($error_message)) { ?>
                    <div><strong><?php echo $error_message; ?></strong></div>
                <?php } ?>
            </div>
            <div>
                <hr>
                <label>Productos registrados</label>
                <br>
                <table border="1">
                    <thead>
                        <th>Producto</th>
                        <th>Precio</th>
                    </thead>
                    <?php
                    
                    $sql = "SELECT descrip, precio FROM productos ";
                    $res = mysqli_query($con, $sql);
                    while ($row = mysqli_fetch_array($res)) {
                        if ($row) {
                            ?>
                            <tr>
                                <td> <?php echo $row['descrip']; ?></td>
                                <td> <?php echo $row['precio']; ?></td>
                            </tr>
                        <?php
                    }
                }

                ?>
                </table>
            </div>
            <div>
                <hr>
                <label>Lista de Pedidos</label>
                <br>
                <table border="1">
                    <thead>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Total a Pagar</th>
                    </thead>
                    <?php
                    $sql1 = "SELECT producto, cantidad, pagar, usuario FROM pedidos";
                    $res1 = mysqli_query($con, $sql1);
                    while ($row1 = mysqli_fetch_array($res1)) {
                        if ($row1) {
                            ?>
                            <tr>
                                <td> <?php echo $row1['usuario']; ?></td>
                                <td> <?php echo $row1['producto']; ?></td>
                                <td> <?php echo $row1['cantidad']; ?></td>
                                <td> <?php echo $row1['pagar']; ?></td>
                            </tr>
                        <?php
                    }
                }

                ?>
                </table>
            </div>

        </center>
    </body>

    </html>


<?php

}
?>