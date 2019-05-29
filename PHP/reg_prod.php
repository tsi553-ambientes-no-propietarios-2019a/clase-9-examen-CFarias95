<?php
if(isset($_POST['producto']) AND isset($_POST['precio'])){
$producto=$_POST['producto'];
$precio=$_POST['precio'];
$con = mysqli_connect("localhost", "root", "", "examen");
$sql="INSERT INTO productos(descrip, precio) VALUES('$producto', $precio)";
$res=mysqli_query($con,$sql);
if($res){
    header('Location: admin.php?error_message=Producto Registrado exitosamente');
}else{
    header('Location: admin.php?error_message=No se pudo registrar el producto');
}

}else{
    header('Location: ../index.php');
}